<?php
/**
 * Created by PhpStorm.
 * User: eeliu
 * Date: 10/15/20
 * Time: 5:57 PM
 */

namespace Plugins\AutoGen\app;


use Plugins\AutoGen\workerman\Candy;

/**
 * Class UserPlugin
 * @hook: app\User::doNothing
 */
class UserPlugin extends Candy
{

    function onBefore()
    {

    }

    function onException($e)
    {

    }

    function onEnd(&$ret)
    {

        parent::onEnd($ret);
    }
}