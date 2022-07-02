<?php
/**
 * Created by PhpStorm.
 * User: Właściciel
 * Date: 2020-02-19
 * Time: 11:12
 */

$route = new Route();
new Database("127.0.0.1", "root", "", "7.92");
$route->addGLobalTwig(array('index.php','aboutus','register',  'statclub','statdistance','stataxe',
'logout', 'stat','statlevel', 'statmaglevel', 'index', 'signin', 'statshielding', 'statsword', 'statfist', 'statfishing', 'statfrags', 'statshielding'));



$route->set('index.php', function (){
    $con = new ViewController(new Database());
    $con->displayPosts("index");
});
$route->set('index', function (){
    $con = new ViewController(new Database());
    $con->displayPosts("index");
});

$route->set('signin', function (){
    $database = new Database();
    $player = $database->query('SELECT * from `players` where name = ?', 'Jozek')->fetchArray();
    //https://otland.net/threads/outfit-images-12-85-for-website.279322/
    $outfit = 'https://outfit-images.ots.me/1285_walk_animation/animoutfit.php' . '?id=' . $player['looktype'] .  '&addons=' . $player['lookaddons'] . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'];
    Controller::crateView('Login\loginpage', [
        'outfit' => $outfit,
    
    ]);

});
$route->set('aboutus', function (){
    Controller::crateView('map');
});
$route->set('register', function (){
   Controller::crateView('Registration\registration', [
    ]);

});
$route->set('registry', function (){
	$register = new RegistrationController(new Database());
	$register->displayPosts('Registration\registry');
    //Controller::crateView('map');
});
$route->set('login', function (){
   // $login = new LoginController(new Database());
   // $login->login('Login\index');
    $viewController = new ViewController(new Database());
    $viewController->displayAccountPage("Login\index");
});
$route->set('logout', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
    //lekko poprawić logout .. żeby jakoś to ładniej było albo coś..
     LoginController::logout("index");
     $viewController = new ViewController(new Database());
     $viewController->displayPosts("index");
 });
 $route->set('statmaglevel', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\MagLevel');
 });
 $route->set('statlevel', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Level');
 });
 $route->set('statfist', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Fist');
 });
 $route->set('statfishing', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Fishing');
 });
 $route->set('stataxe', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Axe');
 });
 $route->set('statsword', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Sword');
 });
 $route->set('statfrags', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Frags');
 });
 $route->set('statshielding', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Shielding');
 });
 $route->set('statdistance', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Distance');
 });
 $route->set('statclub', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Club');
 });
 $route->set('stat', function (){
    // $login = new LoginController(new Database());
    // $login->login('Login\index');
     $stat = new StatisticsController(new Database());
     $stat->displayLevel('Stat\Level');
 });
//Route::addGLobalTwig(array('index.php','aboutus'));
//Route::set('index.php', function() {
//    Index::crateView('Index');
//});

//Route::set('aboutus', function() {
    //AboutUs::crateView('AboutUs');
    //  $controller = new Controller(new Database());
  //  Controller::show();
    // Controller::show();
 //   Controller::crateView('map');

//});