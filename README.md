# iFormBuilder api Version 6 (v60)

PHP library to interact with iFormBuilder api v60 resources
* Start interacting with api quickly (includes generating access tokens)
* Provides familiar ORM layer for mapping iFormBuidler resources
* Utilize v60 features

## Getting Started

Pass config array to api method.  Must set credentials before trying to instantiate resource class.

```php
use Iform\Creds\Config;

// find this credentials in the api apps section of iformbuilder admin tool
$config = array(
    'profile' => 'your profile id',
    'server' => 'your server name',
    'client' => 'your client key',
    'secret' => 'your secret key'
);

Config::api($config);

```

## Usage

Use zerion_autoload.php. If using composer, include composer autoload.php

```php
require_once 'zerion_autoload.php';
```
## Loading resources via container

```php
use Iform\Resources\IformResource;

$pageResource = IformResource::page();
$optionListResource = IformResource::optionList();
$profileResource = IformResource::profile();
$userResource = IformResource::user();
```
Following will require a parent identifier

```php
use Iform\Resources\IformResource;

$pageId = 123123;
$recordResource = IformResource::record($pageId);
$elementsResource = IformResource::elements($pageId);

$optionListId = 12312345;
$optionsResource = IformResource::options($optionListId);
```

##Interacting with API
single resource methods
```php
use Iform\Resources\IformResource;
$pageResource = IformResource::pages()

//single page
$pageId = 123123;
$page = $pageResource->fetch($pageId);

//update
$values = ['name' => 'new_test'];
$pageResource->update($pageId, $values);

//delete
$pageResource->delete($pageId);

//create page
$values = ['name' => 'test', 'label' => 'This is a test'];
$nid = $pageResource->create($values);

//all methods consist for attributes
$values = [
        "language_code"=> "es",
        "label"=> "inspección de la construcción"
];

$pageResource->localizations($pageId)->create($values);
```
collection methods
```php
//collection of all pages in profile
$pageResource->fetchAll();

//filter pages by type
$pageResource->where('data_type(="7")')->fetchAll();

//return first 25 pages 
$pageResource->first(25)->fetchAll();

//require all fields
$pageResource->withAllFields()->fetchAll();

//fetch all email alerts for page
$pageId = 123123;
$pageResource->alerts($pageId)->fetchAll();

//fetch all callbacks for page
$pageId = 123123;
$pageResource->http($pageId)->fetchAll();

//fetch all localizations for page
$pageId = 123123;
$pageResource->localizations($pageId)->fetchAll();

//fetch assignments for page
$pageId = 123123;
$pageResource->assignments($pageId)->fetchAll();

```

Full client example:
```php

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


```
---

