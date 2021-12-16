<?php 

namespace App\Helper;

function generateSignature($enterprise, $user, $config){
  $layout = require __DIR__ . '/../views/signature.php';
  $data_layout = array(
    '%enterprise_name' => $enterprise['name'], 
    '%enterprise_adress' => $enterprise['adress'], 
    '%enterprise_phone' => $enterprise['phone'], 
    '%enterprise_mail' => $enterprise['mail'], 
    '%enterprise_website' => $enterprise['web_site'], 
    '%enterprise_logourl' => $enterprise['logo_url'], 
    '%enterprise_slogan' => $enterprise['slogan'], 
    '%enterprise_websitename' => $enterprise['websitename'], 
    '%user_name' => $user['name'], 
    '%user_mail' => $user['email'], 
    '%user_phone' => $user['phone'], 
    '%user_role' => $user['role'], 
  );
  return str_replace(
    array_keys($data_layout), 
    array_values($data_layout), 
    $layout
  );
}

?>