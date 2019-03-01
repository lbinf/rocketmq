<?php
namespace WorkermanThrift;

use Workerman\Worker;

/**
 * 
 *  ThriftWorker
 * 
 * @author walkor <worker-man@qq.com>
 */
class ThriftWorker extends Worker 
{
    /**
     * Thrift processor
     * @var object 
     */
    protected $processor = null;
    
    /**
     * 使用的协议,默认TBinaryProtocol,可更改
     * @var string
     */
    public $thriftProtocol = 'TBinaryProtocol';
    
    /**
     * 使用的传输类,默认是TBufferedTransport，可更改
     * @var string
     */
    public $thriftTransport = 'TBufferedTransport';

    public $processor_class = null;

    public $handler_class = null;


    /**
     * construct
     */
    public function __construct($socket_name)
    {
        parent::__construct($socket_name);
        $this->onWorkerStart = array($this, 'onStart');
        $this->onConnect = array($this, 'onConnect');
    }
    
    /**
     * 进程启动时做的一些初始化工作
     * @see Man\Core.SocketWorker::onStart()
     * @return void
     */
    public function onStart()
    {
        // 检查类是否设置
        if(!$this->processor_class)
        {
            throw new \Exception('ThriftWorker->processor_class not set');
        }

        // 检查类是否设置
        if(!$this->handler_class)
        {
            throw new \Exception('ThriftWorker->handler_class not set');
        }

        // 检查类是否存在
        $processor_class = $this->processor_class;
        if(!class_exists($processor_class))
        {
            ThriftWorker::log("Class $processor_class not found" );
            return;
        }
        
        // 检查类是否存在
        $handler_class = $this->handler_class;
        if(!class_exists($handler_class))
        {
            ThriftWorker::log("Class $handler_class not found" );
            return;
        }

        $handler = new $handler_class();

        $this->processor = new $processor_class($handler);
    }
    
    /**
     * 处理受到的数据
     * @param TcpConnection $connection
     * @return void
     */
    public function onConnect($connection)
    {
        $socket = $connection->getSocket();
        $t_socket = new \Thrift\Transport\TSocket($connection->getRemoteIp(), $connection->getRemotePort());
        $t_socket->setHandle($socket);
        $transport_name = '\\Thrift\\Transport\\'.$this->thriftTransport;
        $transport = new $transport_name($t_socket);
        $protocol_name = '\\Thrift\\Protocol\\' . $this->thriftProtocol;
        $protocol = new $protocol_name($transport);
        // 执行处理
        try{
            // 先初始化一个
            $protocol->fname = 'none';
            // 业务处理
            $this->processor->process($protocol, $protocol);
        }
        catch(\Exception $e)
        {
            ThriftWorker::log('CODE:' . $e->getCode() . ' MESSAGE:' . $e->getMessage()."\n".$e->getTraceAsString()."\nCLIENT_IP:".$connection->getRemoteIp()."\n");
            $connection->send($e->getMessage());
        }
        
    }
    
}
