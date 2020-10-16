<?php
/**
 * Created by PhpStorm.
 * User: eeliu
 * Date: 10/14/20
 * Time: 4:25 PM
 */

namespace app;

use Workerman\Http\Client;

class User
{
    private $client;
    private $option;
    function __construct()
    {
        $this->client = new Client();

        $this->option = [
            'method'  => 'GET',
            'version' => '1.0',
            'headers' => ['Connection' => 'close']
        ];
    }

    public function output()
    {
        global $Userdb;
        $all_user = $Userdb->query("select * from testEs.siam_users");
        json_encode($all_user);
    }

    public  function callManyTimes()
    {
        for($i=0;$i<10;$i++)
        {
            $this->doNothing(2341234);
        }
    }

    public function doNothing($i)
    {

    }

    public function callRemote($connection)
    {
//
//            'success' => function ($response)  {
//
////                $this->client->request('https://notfound.com/', $option);
//
//            },
//            'error'   => function ($exception) use ($connection) {
//                $connection->close("error");
//            }
//        ];

        $this->option['error']  = function ($exception) use ($connection) {
            $connection->close("error");
        };

        $this->option['success'] = function ($response)  {

            $this->client->request('https://notfound.com/', $this->option);

        };

        $this->client->request('https://example.com/', $this->option);


    }
}