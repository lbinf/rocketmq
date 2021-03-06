<?php
namespace Services\RocketMqProducer;
/**
 * Autogenerated by Thrift Compiler (0.11.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


interface RocketMqProducerIf {
  /**
   * @param \Services\RocketMqProducer\CommonMessage $message
   * @return \Services\RocketMqProducer\Result
   */
  public function sendMsg(\Services\RocketMqProducer\CommonMessage $message);
  /**
   * @param \Services\RocketMqProducer\DelayMessage $delayMessage
   * @return \Services\RocketMqProducer\Result
   */
  public function sendDelayMsg(\Services\RocketMqProducer\DelayMessage $delayMessage);
  /**
   * @param \Services\RocketMqProducer\OrderMessage $orderMessage
   * @return \Services\RocketMqProducer\Result
   */
  public function sendOrderMsg(\Services\RocketMqProducer\OrderMessage $orderMessage);
}


class RocketMqProducerClient implements \Services\RocketMqProducer\RocketMqProducerIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function sendMsg(\Services\RocketMqProducer\CommonMessage $message)
  {
    $this->send_sendMsg($message);
    return $this->recv_sendMsg();
  }

  public function send_sendMsg(\Services\RocketMqProducer\CommonMessage $message)
  {
    $args = new \Services\RocketMqProducer\RocketMqProducer_sendMsg_args();
    $args->message = $message;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'sendMsg', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('sendMsg', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_sendMsg()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\Services\RocketMqProducer\RocketMqProducer_sendMsg_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \Services\RocketMqProducer\RocketMqProducer_sendMsg_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("sendMsg failed: unknown result");
  }

  public function sendDelayMsg(\Services\RocketMqProducer\DelayMessage $delayMessage)
  {
    $this->send_sendDelayMsg($delayMessage);
    return $this->recv_sendDelayMsg();
  }

  public function send_sendDelayMsg(\Services\RocketMqProducer\DelayMessage $delayMessage)
  {
    $args = new \Services\RocketMqProducer\RocketMqProducer_sendDelayMsg_args();
    $args->delayMessage = $delayMessage;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'sendDelayMsg', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('sendDelayMsg', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_sendDelayMsg()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\Services\RocketMqProducer\RocketMqProducer_sendDelayMsg_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \Services\RocketMqProducer\RocketMqProducer_sendDelayMsg_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("sendDelayMsg failed: unknown result");
  }

  public function sendOrderMsg(\Services\RocketMqProducer\OrderMessage $orderMessage)
  {
    $this->send_sendOrderMsg($orderMessage);
    return $this->recv_sendOrderMsg();
  }

  public function send_sendOrderMsg(\Services\RocketMqProducer\OrderMessage $orderMessage)
  {
    $args = new \Services\RocketMqProducer\RocketMqProducer_sendOrderMsg_args();
    $args->orderMessage = $orderMessage;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'sendOrderMsg', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('sendOrderMsg', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_sendOrderMsg()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\Services\RocketMqProducer\RocketMqProducer_sendOrderMsg_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \Services\RocketMqProducer\RocketMqProducer_sendOrderMsg_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("sendOrderMsg failed: unknown result");
  }

}


// HELPER FUNCTIONS AND STRUCTURES

class RocketMqProducer_sendMsg_args {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'message',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Services\RocketMqProducer\CommonMessage',
      ),
    );

  /**
   * @var \Services\RocketMqProducer\CommonMessage
   */
  public $message = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['message'])) {
        $this->message = $vals['message'];
      }
    }
  }

  public function getName() {
    return 'RocketMqProducer_sendMsg_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->message = new \Services\RocketMqProducer\CommonMessage();
            $xfer += $this->message->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RocketMqProducer_sendMsg_args');
    if ($this->message !== null) {
      if (!is_object($this->message)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('message', TType::STRUCT, 1);
      $xfer += $this->message->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class RocketMqProducer_sendMsg_result {
  static $isValidate = false;

  static $_TSPEC = array(
    0 => array(
      'var' => 'success',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Services\RocketMqProducer\Result',
      ),
    );

  /**
   * @var \Services\RocketMqProducer\Result
   */
  public $success = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
    }
  }

  public function getName() {
    return 'RocketMqProducer_sendMsg_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \Services\RocketMqProducer\Result();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RocketMqProducer_sendMsg_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class RocketMqProducer_sendDelayMsg_args {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'delayMessage',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Services\RocketMqProducer\DelayMessage',
      ),
    );

  /**
   * @var \Services\RocketMqProducer\DelayMessage
   */
  public $delayMessage = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['delayMessage'])) {
        $this->delayMessage = $vals['delayMessage'];
      }
    }
  }

  public function getName() {
    return 'RocketMqProducer_sendDelayMsg_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->delayMessage = new \Services\RocketMqProducer\DelayMessage();
            $xfer += $this->delayMessage->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RocketMqProducer_sendDelayMsg_args');
    if ($this->delayMessage !== null) {
      if (!is_object($this->delayMessage)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('delayMessage', TType::STRUCT, 1);
      $xfer += $this->delayMessage->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class RocketMqProducer_sendDelayMsg_result {
  static $isValidate = false;

  static $_TSPEC = array(
    0 => array(
      'var' => 'success',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Services\RocketMqProducer\Result',
      ),
    );

  /**
   * @var \Services\RocketMqProducer\Result
   */
  public $success = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
    }
  }

  public function getName() {
    return 'RocketMqProducer_sendDelayMsg_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \Services\RocketMqProducer\Result();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RocketMqProducer_sendDelayMsg_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class RocketMqProducer_sendOrderMsg_args {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'orderMessage',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Services\RocketMqProducer\OrderMessage',
      ),
    );

  /**
   * @var \Services\RocketMqProducer\OrderMessage
   */
  public $orderMessage = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['orderMessage'])) {
        $this->orderMessage = $vals['orderMessage'];
      }
    }
  }

  public function getName() {
    return 'RocketMqProducer_sendOrderMsg_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->orderMessage = new \Services\RocketMqProducer\OrderMessage();
            $xfer += $this->orderMessage->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RocketMqProducer_sendOrderMsg_args');
    if ($this->orderMessage !== null) {
      if (!is_object($this->orderMessage)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('orderMessage', TType::STRUCT, 1);
      $xfer += $this->orderMessage->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class RocketMqProducer_sendOrderMsg_result {
  static $isValidate = false;

  static $_TSPEC = array(
    0 => array(
      'var' => 'success',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Services\RocketMqProducer\Result',
      ),
    );

  /**
   * @var \Services\RocketMqProducer\Result
   */
  public $success = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
    }
  }

  public function getName() {
    return 'RocketMqProducer_sendOrderMsg_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \Services\RocketMqProducer\Result();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RocketMqProducer_sendOrderMsg_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


