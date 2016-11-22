<?php
// make sure to include zerion autoloader
require_once 'iform/zerion_autoload.php';

// the auto loader will fetch this classes
// all file loading will be taken care of for you
use Iform\Resources\IformResource;
use Iform\Creds\Config;

// find this credentials in the api apps section of iformbuilder admin tool
$config = array(
    'profile' => 'your profile id',
    'server' => 'your server name',
    'client' => 'your client key',
    'secret' => 'your secret key'
);

// pass config to api method
Config::api($config);

//user container to initialize resource
//connection and jwt authentication will be take care of through the iForm resource container!
$pages = IformResource::pages();

// Now your ready to interact with the api!
// Grab the first ten pages in your account
// return json by default
echo $pages->first(10)->fetchAll();
