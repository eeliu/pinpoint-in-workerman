<?php
namespace app;
use http\Exception\BadConversionException;
use Workerman\Worker;
use Workerman\MySQL\Connection;

class HttpServer
{
    protected $http_worker;

    public function __construct()
    {
        $this->http_worker = new Worker('http://0.0.0.0:2345');
    }

    public function test()
    {
        throw new \Exception("67890o");
    }

    public function call_test()
    {
        try{
            $this->test();
        }catch (\Exception $e)
        {
            echo "catch $e";
        }

    }



    public function init()
    {
        $this->http_worker->count = 1;
        $this->http_worker->onMessage = function ($connection, $request) {
            //$request->get();
            //$request->post();
            //$request->header();
            //$request->cookie();
            //$requset->session();
            //$request->uri();
            //$request->path();
            //$request->method();
        
            // Send data to client
            $string ="23423";

//            for($i=0;$i<20;$i++){
//                $string.=$string;
//            }
            $user = new User();
            $user->output();
            $user->callManyTimes();
            $connection->close($string);
        };
        
        $this->http_worker->onConnect = function($connection)
        {
//            echo "<" . $connection->getRemoteIp();
        };

        $this->http_worker->onClose = function($connection)
        {
//            echo ">";
        };

        $this->http_worker->onWorkerStart = function ($worker)
        {
            global $Userdb;
            $Userdb = new Connection("dev-mysql","3306","root","root","testEs");
        };

    }

    public function run()
    {
        Worker::runAll();
    }

}
