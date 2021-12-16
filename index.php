<?php

require 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

Flight::before('start', function(&$params, &$output){
  App\Helper\filter($_ENV['ENV']);
});
Flight::set('flight.views.path', 'app/views');
Flight::set('public_tmp', 'public/tmp/');
Flight::set('env', $_ENV);
Flight::set('config', App\Config\Constants[$_ENV['ENV']]);

$home = function(){
  $locals = array(
    'title' => 'Bienvenido',
  );
  Flight::render('home.php', $locals);
};

Flight::route('GET /', $home);

Flight::route('POST /signature/generate', function(){
  $request = Flight::request();
  $payload = json_decode($request->getBody(), true);
  $enterprise = $payload['enterprise'];
  $tmp = explode('//', $enterprise['web_site']);
  $enterprise['websitename'] = (array_pop($tmp));
  $users = $payload['users'];
  $path = Flight::get('public_tmp') . App\Helper\random(20);
  mkdir($path, 0755);
  $i = 1;
  foreach ($users as &$user) {
    $signature = App\Helper\generateSignature($enterprise, $user, Flight::get('config'));
    $myFile = $path . '/' . $i . '. ' . $user['name'] .'.html';
    file_put_contents($myFile, "\xEF\xBB\xBF".  $signature); 
    $i++;
  }
});

Flight::map('notFound', function(){
  $locals = array(
    'title' => 'Recurso no encontrado',
  );
  Flight::response()->status(404);
  $request = Flight::request();
  if($request->method == 'GET'){
    $extensions = ['css', 'js', 'png', 'ttf'];
    $explodedURL = explode('.', $request->url);
    if(!in_array(end($explodedURL), $extensions)){
      Flight::render('404.php', $locals);
    }
  }else{
    echo 'Recurso no encontrado';
  }
});

Flight::start();

?>
