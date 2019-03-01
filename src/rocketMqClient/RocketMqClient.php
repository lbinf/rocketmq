<?php
namespace RocketMqClient;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use Thrift\Exception\TTransportException;
use Services\RocketMqProducer\RocketMqProducerClient;
use Services\RocketMqProducer\CommonMessage;
use Services\RocketMqProducer\DelayMessage;
use Services\RocketMqProducer\OrderMessage;

class RocketMqClient
{

    private $socket = null;
    private $transport = null;
    private $protocol = null;
    private $client = null;
    private $host = null;
    private $port = null;
    private $rocketMq_client_hosts = [];

    /**
     * construct
     */
    function __construct($rocketMq_client_hosts = null)
    {
        if($rocketMq_client_hosts){
            $this->rocketMq_client_hosts = $rocketMq_client_hosts;
        }
        $this->init();
        $this->connect();
    }

    /**
     * init
     */
    private function init()
    {
        $this->getServe();
    }

    /**
     * 获取服务
     */
    private function getServe(){
        $rocketMq_client_hosts = $this->rocketMq_client_hosts;
        $host_index = array_rand( $rocketMq_client_hosts );
        $this->host = $rocketMq_client_hosts[ $host_index ]['host'];
        $this->port = $rocketMq_client_hosts[ $host_index ]['port'];
        if(!$this->host || !$this->port){
            throw new \Exception( '没有找到ip和端口号' );
        }
    }

    /**
     * 建立连接
     */
    private function connect()
    {
        $this->socket    = new TSocket( $this->host, $this->port );
        $this->transport = new TBufferedTransport( $this->socket, 1024, 1024 ); //传输层协议
        $this->protocol  = new TBinaryProtocol( $this->transport ); //数据层协议
        $this->client    = new RocketMqProducerClient( $this->protocol );
    }

    /**
     * sendMsg
     * 发送普通消息:
     * @param string      $topic
     * @param string      $tags
     * @param string      $msg
     * @param string|null $key
     * @return array
     * @throws TException
     * @throws TTransportException
     */
    public function sendMsg( string $topic, string $tags, string $msg, string $key = null )
    {
        try {
            $this->transport->open();
            $msg = new CommonMessage( ['topic' => $topic, 'tags' => $tags, 'msg' => $msg] );
            if ($key)
                $msg->key = $key;
            $result = $this->client->sendMsg( $msg );
            $this->transport->close();
            return [
                'code'   => $result->code,
                'msg'    => $result->msg,
                'msg_id' => $result->result,
            ];
        } catch (TTransportException $e) { // 连接异常
            throw new TTransportException( $e->getMessage() );
        } catch (TException $e) {
            throw new TException( $e->getMessage() );
        } catch (\Exception $e) {
            throw new \Exception( $e->getMessage() );
        }
    }

    /**
     * sendDelayMsg
     * 发送延时消息:
     * @param string      $topic
     * @param string      $tags
     * @param string      $msg
     * @param int         $seconds
     * @param string|null $key
     * @return array
     * @throws TException
     * @throws TTransportException
     */
    public function sendDelayMsg( string $topic, string $tags, string $msg, int $seconds, string $key = null )
    {
        try {
            $this->transport->open();
            $msg = new DelayMessage( ['topic' => $topic, 'tags' => $tags, 'msg' => $msg, 'seconds' => $seconds] );
            if ($key)
                $msg->key = $key;
            $result = $this->client->sendDelayMsg( $msg );
            $this->transport->close();
            return [
                'code'   => $result->code,
                'msg'    => $result->msg,
                'msg_id' => $result->result,
            ];
        } catch (TTransportException $e) { // 连接异常
            throw new TTransportException( $e->getMessage() );
        } catch (TException $e) {
            throw new TException( $e->getMessage() );
        } catch (\Exception $e) {
            throw new \Exception( $e->getMessage() );
        }
    }

    /**
     * sendOrderMsg
     * 发送顺序消息:
     * @param string      $topic
     * @param string      $tags
     * @param string      $msg
     * @param string      $key
     * @param string|null $shardingKey
     * @return array
     * @throws TException
     * @throws TTransportException
     */
    public function sendOrderMsg( string $topic, string $tags, string $msg, string $key, string $shardingKey = null )
    {
        try {
            $this->transport->open();
            $msg = new OrderMessage( ['topic' => $topic, 'tags' => $tags, 'msg' => $msg, 'key' => $key] );
            if ($shardingKey)
                $msg->shardingKey = $shardingKey;
            $result = $this->client->OrderMessage( $msg );
            $this->transport->close();
            return [
                'code'   => $result->code,
                'msg'    => $result->msg,
                'msg_id' => $result->result,
            ];
        } catch (TTransportException $e) { // 连接异常
            throw new TTransportException( $e->getMessage() );
        } catch (TException $e) {
            throw new TException( $e->getMessage() );
        } catch (\Exception $e) {
            throw new \Exception( $e->getMessage() );
        }
    }
}