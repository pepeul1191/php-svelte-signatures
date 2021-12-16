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
  $randito = App\Helper\random(20);
  $path = Flight::get('public_tmp') . $randito;
  mkdir($path, 0755);
  $i = 1;
  // htmls files
  foreach ($users as &$user) {
    $signature = App\Helper\generateSignature($enterprise, $user, Flight::get('config'));
    $myFile = $path . '/' . $i . '. ' . $user['name'] .'.html';
    file_put_contents($myFile, "\xEF\xBB\xBF".  $signature); 
    $i++;
  }
  // zip
  $zipper = new \Chumper\Zipper\Zipper;
  $files = glob($path . '/*');
  $zipPath = Flight::get('public_tmp'). $randito . '.zip';
  $zipper->make($zipPath);
  $zipper->add($files);
  $zipper->close();
  // return zip
  $attachmentLocation = $zipPath;
  if (file_exists($attachmentLocation)) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
    header('Cache-Control: public'); // needed for internet explorer
    header('Content-Type: application/zip');
    header('Content-Transfer-Encoding: Binary');
    header('Content-Length:'.filesize($attachmentLocation));
    header('Content-Disposition: attachment; filename=file.zip');
    header('randito: ' . $randito);
    readfile($attachmentLocation);
    die();        
  } else {
    Flight::response()->status(500);
    die("Error: File not found.");
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
