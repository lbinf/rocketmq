<?php
require(__DIR__ . '/vendor/autoload.php');

//这是服务器地址监听的端口，可以配置多个，每个配置启动一个进程处理消息
$config = [
    [
        'host'=>'192.168.11.202',
        'port'=>'9090'
    ]
];
$client = new \RocketMqClient\RocketMqClient($config);

try {
    $res = $client->sendMsg('test_topic','TagA','this is test msg');
    //简单的测试是否连通
    var_dump($res);
    echo PHP_EOL;
}  catch (\Exception $e) {
    echo $e->getMessage();
}