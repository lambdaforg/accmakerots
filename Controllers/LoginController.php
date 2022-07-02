<?php
/**
 * Created by PhpStorm.
 * User: Właściciel
 * Date: 2020-02-28
 * Time: 16:57
 */


class LoginController extends Controller
{

    public function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public static function login($viewname){
        
        $temp = "test";
        $session = new SessionManager(1);
        if($session->has('token'))
        {
            $temp =  "jestest zalogowany" . $session->get('token');
            self::debug_to_console($session->get('token'));

            return true;
        }
        if(isset($_POST['account']) && isset($_POST['password']))
        {
            $temp = "createing session";
            $user = User::returnUserID($_POST['account'], $_POST['password']);
            self::debug_to_console($user);
            if($user !== null && $user['name'] == $_POST['account']){
            $session->set('token', $user['name']);
                return true;    
            }

            return false;
        }
      

        return false;
    }
    public static function logout($viewname = "index"){
            $session = new SessionManager(1);
            if($session->has('token'))
            {
                $session->remove('token');
            }
    }



}