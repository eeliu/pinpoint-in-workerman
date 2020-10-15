<?php
/**
 * Created by PhpStorm.
 * User: eeliu
 * Date: 10/14/20
 * Time: 4:25 PM
 */

namespace app;


class User
{
    public function output()
    {
        global $id;
        echo $id."\n";
    }
}