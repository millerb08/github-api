<?php

require_once __DIR__."/../vendor/autoload.php";
session_start();

$appUrl = "http://port-80-62jrha6r5o.treehouse-app.com";

$clientId = "29d242184ded2d941fb9";
$clientSecret="ab86a367b717d01076b39cd37488a6ced2e3433e";

$config = new Milo\Github\OAuth\Configuration($clientId, $clientSecret, ["user", "repo"]);
$storage = new Milo\Github\Storages\SessionStorage;
$login = new Milo\Github\OAuth\Login($config, $storage);
$api = new Milo\Github\Api;

if($login->hasToken()){
  $token = $login->getToken();
  $api->setToken($token);
}else{
  if(isset($_GET["redirect"])){
    $login->obtainToken($_GET["code"],$_GET["state"]);
    header("Location: ".filter_input(INPUT_GET, "redirect"));
    exit;
  }else{
    $login->askPermissions("$appUrl/inc/authenticate.php?redirect=".$_SERVER["REQUEST_URI"]);
  }
}