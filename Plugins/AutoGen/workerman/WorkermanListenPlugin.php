<?php
/**
 * Created by PhpStorm.
 * User: eeliu
 * Date: 10/14/20
 * Time: 2:28 PM
 */

namespace Plugins\AutoGen\workerman;
$id = 0;

class WorkermanListenPlugin
{
    protected $worker_self;
    protected $origin_onMessage;
    protected $origin_onConnect;
    protected $origin_onClose;
    public function __construct($apId,$who,&...$args)
    {
        assert($who instanceof \Workerman\Worker);
        $this->worker_self = $who;
    }

    public function onBefore()
    {

    }

//    /**
//     * @hook: Workerman\Worker::listen
//     */

    // @hook: Workerman\Worker::listen
    public function onEnd(&$ret){
        $this->origin_onMessage =  $this->worker_self->onMessage;
        $this->origin_onConnect =  $this->worker_self->onConnect;
        $this->origin_onClose  =   $this->worker_self->onClose;
        $this->worker_self->onMessage = function ($connection, $request) {
            global $id;
            $id = $connection->_pinpoint_node_id_;
            if(!empty($this->origin_onMessage))
            {
                ($this->origin_onMessage)($connection,$request);
            }
        };

        $this->worker_self->onConnect = function($connection) {
            $connection->_pinpoint_node_id_ = rand(0,111111111);
            global $id;
            $id = $connection->_pinpoint_node_id_;
            $this->startRequest($connection,$connection);
            if(!empty($this->origin_onConnect))
            {
                ($this->origin_onConnect)($connection);
            }
        };

        $this->worker_self->onClose = function($connection)
        {
            // request end
            if(!empty($this->origin_onClose))
            {
                ($this->origin_onClose)($connection);
            }
            $this->endRequest($connection);
        };


    }

    public function onException($e)
    {

    }


    public function startRequest(&$connection,&$request)
    {
        echo "startRequest ".$connection->_pinpoint_node_id_."\n";
    }

    public function endRequest(&$connection)
    {
        echo "end ".$connection->_pinpoint_node_id_."\n";
    }

}