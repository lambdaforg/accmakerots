<?php
/**
 * Created by PhpStorm.
 * User: Właściciel
 * Date: 2020-02-28
 * Time: 14:22
 */
class User
{

    private $errors = "";
    //wszystko do poprawy, narazie byle jak xDp
    public function __construct($username, $password, $email)
    {
        $database = new Database();
        if (!$this->checkExists($database,$username)) {

           
           // $email = $this->escapeString($email);
           // $password = $this->escapeString($password);
           // $login = $this->escapeString($username);
            $database->query("INSERT INTO `accounts`(accno, password, email) VALUES(?, ?, ?)" , $username, $password, $email);
            $this->errors = "";

        } else{
            $this->errors = "Takie konto już istnieje";
      }
    }

    public static function checkExists($db,$username){

            if($db->query("SELECT * FROM `accounts` WHERE accno=  ?", $username)->numRows() > 0 ){
                return true;
            }

            return false;
    }
    public static function returnUserID($username, $password){
            $database = new Database();   

           if(self::checkExists($database, $username)){
                //$username = self::escapeString($username);
                //$password = self::escapeString($password);
                // poprawic wszystkie zapytania do bazy danych !
               // return Database::$_instance->query("SELECT id, accno AS name FROM `accounts` WHERE accno = $username AND password = $password");
                return $database->query("SELECT id, accno AS name FROM `accounts` WHERE accno = ? AND password = ?", $username, $password)->fetchArray();
            }

            return null;
    }
    public static function isLogIn(){
                // poprawić, sprawdzić po tym jak istnieje token czy zawiera id konta
        $session = new SessionManager(1);
        if($session->has('token'))
        {
            return true;
        }
        return false;
    }
    private static function escapeString($string){
        $database = new Database();

        return $database->quote($string);
    }
    public function getErrorHandling(){
            return $this->errors;
    }
}