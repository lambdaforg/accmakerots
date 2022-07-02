<?php
/**
 * Created by PhpStorm.
 * User: Właściciel
 * Date: 2020-02-19
 * Time: 11:52
 */
class Controller
{
        protected $database;
        public function __construct(Database $database){
            $this->database = $database;
        }


    public static function crateView($viewName, $args = []){
    //require_once './Views/'.$viewName.'.php';

    View::renderTemplate($viewName.'.html', $args);
}
    public function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public function getSession(){
        $session = Session::getInstance();
        $session->startSession();
        return $session;
    }
}