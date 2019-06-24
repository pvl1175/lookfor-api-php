<?php

namespace lookfor;

error_reporting(E_ALL);

define('PATH', dirname(__FILE__));

require_once PATH . '/thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = realpath(dirname(__FILE__).'/api');

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', PATH);
$loader->registerNamespace('lookfor9\api', PATH);
$loader->register();

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use lookfor9\api\ApiClient;

$socket = new TSocket('127.0.0.1', 9090);
$transport = new TBufferedTransport($socket, 1024, 1024);
$protocol = new TBinaryProtocol($transport);
$client = new ApiClient($protocol);

$transport->open();

print $client->Hello()."\r\n";
print $client->PhoneInfo("9196315221")."\r\n";

$transport->close();

?>
