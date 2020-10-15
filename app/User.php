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
}