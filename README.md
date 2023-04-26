# Table of contents
- _OCR_Blog_P5_   
I. **Environement**  
II. **Install project**   
    a. Conditions and important information for the installation  
    b. How to retrieve the project  
    c. Install Database  
    d. Create an user admin  
    e. CODACY  
    f. MailJet  
III. **Architecture and functionalities**  
- _MailJet README DOCUMENTATION_   
--------------------------------------------------------------------------
# OCR_Blog_P5  
Creation of a Model-View-Controller blog as part of the Application Developer training - PHP / Symfony OpenClassRooms
## I- Environment  
Server software => Apache 2.4.52   
Database management system => Mysql 8.0.31  
Interface database management => Phpmyadmin 5.1  
Main code language code => PHP 8.1.2
------------------------------------------------------------------
## II- Install project
### a- Conditions and important information for the installation :
- Install the project at the **Root**: 
**Be careful** during the installation to keep the name OCR_BLOG_P5 of the project

- Advice before continue the local installation:
 before /OCR_BLOG_P5 folder -> add an info.php file containing the following code
```
<?php
 
phpinfo();
 
?>
```
This will allow you to check your php configuration.

- Our project uses bootstrap, for js and css, a part is local and another one is online that's why it's important that you are connected to internet.
### b- How to retrieve the project :
- Clone the repository : https://github.com/cedb13/OCR_Blog_P5.git  
At the root, (for example : www folder), add the github repository cloning with the command line : ```git clone https://github.com/cedb13/OCR_Blog_P5.git ```  
If you need help you can consult: https://docs.github.com/fr/repositories/creating-and-managing-repositories/cloning-a-repository
### c- Install Database :
1- create a mysql database and insert blog_pro_p5.sql  
2- In the public folder, you will find config.php :  
-> replace with the configuration elements of your database in this file
```
define('DB_NAME', 'expleName'); // the name of the database
define('DB_USER', 'expleUser') ; // the user name of the MySQL database
define('DB_PASS', 'explePass') ; // the password of the MySQL database
define('DB_HOST', 'expleHost') ; // the host of your project
```
change the information by your own.

**Warning**: in the file blog_pro_p5.sql we have line 5 
```
-- Host: localhost:3306
```
Check your host and change the port if necessary.

### d- Create an user admin :
In the public folder, you will find config.php : take or change the REGISTER_KEY and go in the blog by your browser at the "NOUS REJOINDRE" page for can register, enter your key and your information, click on "ENREGISTRER".  
After if you want, you can go in your interface Mysql for give you allright.

### e- CODACY
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/07d19140a08048aa98978c0bd1c81a5b)](https://app.codacy.com/gh/cedb13/OCR_Blog_P5/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)

### f- MailJet : library for sending mail, in our case to receive the contact form.
=> For the proper functioning of this API:
https://documentation.mailjet.com/hc/fr/articles/360042908593-Guide-de-d%C3%A9marrage/?utm_source=triggered-email&utm_medium=emailing&utm_campaign=welcome-email-mkg
- Register on https://www.mailjet.com/
- Get the API key and the secret key : https://app.mailjet.com/account/apikeys
- Insert the keys in the file /App/Lib/SendService.php line 23 (replace the keys) :
```$mj = new \Mailjet\Client('API key','secret key',true,['version' => 'v3.1']); ```
- Replace on line 28 and line 33 by your email
- At the end to this README you can find all README MailJet documentation
---------------------------------------
## III- Architecture and functionalities
- At the root we have:
### htaccess file
### README file
### diagrammes folder
### src/Mailjet folder
### test/Mailjet folder
### vendor
### .travis.yml file
### composer.json file
### composer.lock file
### LICENCE file
### phpunit.xml.dist file
### App folder
### public folder

---------------------------
### In App folder we find :
#### Controllers folder : Party controllers of our application
- Controller.php : Main/parent controller
- HommeController.php : Child controller that contains the logic to manage the interactions on the home page of our blog
- LoginController.php : Child controller that contains the logic to handle login and logout interactions of user-administrators.
- AdminController.php : Child controller that manages the administration page that allows users to update their personal information, access pages where they can edit, update, delete or create articles and validate or delete comments.
- PostController.php  : Child controller that manages the post list page and the single post pages allowing CRUD for articles and comments.  
-> Read  
=> The Post page single,   
=> The page that list the Posts,   
=> The comments associate to each post that validate  
-> Create Comment  
If user-admin is connected :  
-> Read all cooments  
-> Create, Update and Delete Posts and validate or delete Comments  
- RegisterController.php : Child controller that manages the register user as admin  
#### Models : I have divided this part of my framework into two folders
@ **Models folder** : It contains all the files to define the data structure, the elements that can be used when I create the objects needed for the business logic.  
=> Model.php : Parent model file that contains the essential methods for interacting with the database and the data structure.  
=> Post.php  : Child model that contains the methods for set and get all elements that will be used for construc and manage Post object   
=> Comment.php : Child model that contains the methods for set and get all elements that will be used for construc and manage Comment object  
=> User.php : Child model that contains the methods for set and get all elements that will be used for construc and manage User object  
@ **Lib folder** : Has all the files that contain the methods that allow you to act with the data structure and business logic.  
=> Database.php : Define database access.  
=> PostService.php  : Contains the methods for construc and manage Post object (create, read, update, delete)  
=> CommentService.php  : Contains the methods for construc and manage Comment object (create, validate, read, delete)  
=> UserService.php : Contains the methods for construc and manage User object (create, read, update, delete)  
=> SendService.php : Contains the method to send an email (for our form contact)  
#### Views folder : Contains templates folder
@ **templates folder** : We have all views files necessary to the display our blog  
=> default.php : display the header and footer our application (contain the mean navbar) for all pages  
=> home.php : displays content-layout for the home page  
=> posts.php : displays content-layout for the list posts page  
=> single.php : displays content-layout for all single post page  
=> admin.php : displays content-layout for the administration page  
=> register.php : displays content-layout for the register page  
=> relogin.php : displays content-layout for the relogin page when the user-admin is mistaken in his login information   
#### Autoloader file : 
=> Autoloader.php contains the autoload method which allows to look for the file associated to a class, and include it for us.  
It allows you to automatically make the require_once as soon as the namespaces are used.  

### In public folder we can find :
#### assets folder :  
=> img folder : contains all images that decorate our application  
=> media folder : contains media files. In our application we used just a pdf file for the CV  
=> favicon.icon : to represent our site in the browser tab  
#### css folder :  
=> style.css : file that use for design and decorate the the appearance our blog  
#### js folder :  
=> script.js : file that use for help to manage the front  
=> jquery.js : file jQuery is a free JavaScript library to facilitate the writing of client-side scripts in the HTML code of web pages.  
#### index.php : is an importante file for our application, it's a dispatcher, it's the front controller  
#### notFound.php : file dedicated to the 404 error  
----------------------------------------------------------------------------------------------------------
# README MailJet documentation  


[doc]: http://dev.mailjet.com/guides/?php#
[api_credential]: https://app.mailjet.com/account/api_keys
[mailjet]: http://www.mailjet.com

![alt text](http://cdn.appstorm.net/web.appstorm.net/files/2012/02/mailjet_logo_200x200.png "Mailjet")

[![Codacy Badge](https://api.codacy.com/project/badge/grade/3fa729f3750849ce8e0471b0487439cb)](https://www.codacy.com/app/gbadi/mailjet-apiv3-php)
[![Build Status](https://travis-ci.org/mailjet/mailjet-apiv3-php.svg?branch=master)](https://travis-ci.org/mailjet/mailjet-apiv3-php)
![MIT License](https://img.shields.io/badge/license-MIT-007EC7.svg?style=flat-square)
![Current Version](https://img.shields.io/badge/version-1.1.8-green.svg)

[Mailjet][mailjet] API Client.

Check out all the resources and all the PHP code examples on the official documentation: [Maijlet Documentation][doc]

## Requirements

`PHP >= 7.2`

## Installation

``` bash
composer require mailjet/mailjet-apiv3-php
```
Without composer:

Clone or Download [this repository](https://github.com/mailjet/mailjet-apiv3-php-no-composer) that already contains all the dependencies and the `vendor/autoload.php` file. If you encounter any issue, please post it here and not on the mirror repository.

### Authentication

The Mailjet Email API uses your API and Secret keys for authentication. [Grab][api_credential] and save your Mailjet API credentials.

```bash
export MJ_APIKEY_PUBLIC='your API key'
export MJ_APIKEY_PRIVATE='your API secret'
```

> Note: For the SMS API the authorization is based on a Bearer token. See information about it in the [SMS API](#sms-api) section of the readme.

Initialize your [Mailjet][mailjet] Client:

```php
use \Mailjet\Resources;

// getenv will allow us to get the MJ_APIKEY_PUBLIC/PRIVATE variables we created before:

$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

$mj = new \Mailjet\Client($apikey, $apisecret);

// or, without using environment variables:

$apikey = 'your API key';
$apisecret = 'your API secret';

$mj = new \Mailjet\Client($apikey, $apisecret);
```

### Make your first call

Here's an example on how to send an email:

```php
<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;

// Use your saved credentials, specify that you are using Send API v3.1

$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);

// Define your request body

$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "$SENDER_EMAIL",
                'Name' => "Me"
            ],
            'To' => [
                [
                    'Email' => "$RECIPIENT_EMAIL",
                    'Name' => "You"
                ]
            ],
            'Subject' => "My first Mailjet Email!",
            'TextPart' => "Greetings from Mailjet!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
            <br />May the delivery force be with you!"
        ]
    ]
];

// All resources are located in the Resources class

$response = $mj->post(Resources::$Email, ['body' => $body]);

// Read the response

$response->success() && var_dump($response->getData());
?>
```

## Client / Call Configuration Specifics

To instantiate the library you can use the following constructor:  

`new \Mailjet\Client($MJ_APIKEY_PUBLIC, $MJ_APIKEY_PRIVATE,$CALL,$OPTIONS);`

 - `$MJ_APIKEY_PUBLIC` : public Mailjet API key
 - `$MJ_APIKEY_PRIVATE` : private Mailjet API key
 - `$CALL` : boolean to enable the API call to Mailjet API server (should be `true` to run the API call)
 - `$OPTIONS` : associative PHP array describing the connection options (see Options bellow for full list)

### Options

#### API Versioning

The Mailjet API is spread among three distinct versions:

- `v3` - The Email API
- `v3.1` - Email Send API v3.1, which is the latest version of our Send API
- `v4` - SMS API

Since most Email API endpoints are located under `v3`, it is set as the default one and does not need to be specified when making your request. For the others you need to specify the version using `version`. For example, if using Send API `v3.1`:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
```

For additional information refer to our [API Reference](https://dev.preprod.mailjet.com/reference/overview/versioning/).

#### Base URL

The default base domain name for the Mailjet API is api.mailjet.com. You can modify this base URL by setting a value for `url` in your call:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'),
                          getenv('MJ_APIKEY_PRIVATE'), true,
                          ['url' => "api.us.mailjet.com"]
                        );
```

If your account has been moved to Mailjet's US architecture, the URL value you need to set is `api.us.mailjet.com`.

### Disable API call

By default the API call parameter is always enabled. However, you may want to disable it during testing to prevent unnecessary calls to the Mailjet API. This is done by setting the third parameter to `false`:

```php
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'), false);
```

## List of resources

You can find the list of all available resources for this library in [/src/Mailjet/Resources.php](https://github.com/mailjet/mailjet-apiv3-php/blob/master/src/Mailjet/Resources.php). The file lists the names of the PHP resources and the corresponding names in the [API reference][ref].

## Request Examples

### POST Request

Use the `post` method of the Mailjet CLient (i.e. `$mj->post($resource, $params)`)

`$params` will be a PHP associative array with the following keys :

 - `body`: associative PHP array defining the object to create. The properties correspond to the property of the JSON Payload)
 - `id` : ID you want to apply a POST request to (used in case of action on a resource)

#### Simple POST request

```php
<?php
/*
Create a new contact:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$body = [
    'Email' => "email@example.com"
];
$response = $mj->post(Resources::$Contact, ['body' => $body]);
$response->success() && var_dump($response->getData());?>
```

#### Using actions

```php
<?php
/*
Manage the subscription status of a contact to multiple lists
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$body = [
    'ContactsLists' => [
        [
            'ListID' => "$ListID_1",
            'Action' => "addnoforce"
        ],
        [
            'ListID' => "$ListID_2",
            'Action' => "addforce"
        ]
    ]
];
$response = $mj->post(Resources::$ContactManagecontactslists, ['id' => $id, 'body' => $body]);
$response->success() && var_dump($response->getData());
?>
```

### GET Request

Use the `get` method of the Mailjet CLient (i.e. `$mj->get($ressource, $params)`)

`$param` will be a PHP associative array with the following keys :

 - `id` : Unique ID of the element you want to get (optional)
 - `filters`: associative array listing the query parameters you want to apply to your get (optional)

#### Retrieve all objects

```php
<?php
/*
Retrieve all contacts:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$response = $mj->get(Resources::$Contact);
$response->success() && var_dump($response->getData());
?>
```

#### Use filtering

```php
<?php
/*
Retrieve all contacts that are not in the campaign exclusion list :
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$filters = [
  'IsExcludedFromCampaigns' => 'false'
];
$response = $mj->get(Resources::$Contact, ['filters' => $filters]);
$response->success() && var_dump($response->getData());
?>
```

#### Use paging and sorting

```php
<?php
/*
Retrieve a specific contact ID :
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$filters = [
    'Limit'=>40,  // default is 10, max is 1000
    'Offset'=>20,
    'Sort'=>'ArrivedAt DESC',
    'Contact'=>$contact->ID,
    'showSubject'=>true
];
$response = $mj->get(Resources::$Message, ['filters'=>$filters]);
$response->success() && var_dump($response->getData());
?>
```

#### Retrieve a single object

```php
<?php
/*
Retrieve a specific contact ID :
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$response = $mj->get(Resources::$Contact, ['id' => $id]);
$response->success() && var_dump($response->getData());
?>
```

### PUT Request

Use the `put` method of the Mailjet CLient (i.e. `$mj->put($ressource, $params)`)

`$param` will be a PHP associative array with the following keys :

 - `id` : Unique ID of the element you want to modify
 - `body`: associative array representing the object property to update

A `PUT` request in the Mailjet API will work as a `PATCH` request - the update will affect only the specified properties. The other properties of an existing resource will neither be modified, nor deleted. It also means that all non-mandatory properties can be omitted from your payload.

Here's an example of a PUT request:

```php
<?php
/*
Update the contact properties for a contact:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$body = [
    'first_name' => "John",
    'last_name' => "Smith"
];
$response = $mj->put(Resources::$ContactData, ['id' => $id, 'body' => $body]);
$response->success() && var_dump($response->getData());
?>
```

### DELETE Request

Use the `delete` method of the Mailjet CLient (i.e. `$mj->delete($ressource, $params)`)

Upon a successful `DELETE` request the response will not include a response body, but only a `204 No Content` response code.

Here's an example of a `DELETE` request:

```php
<?php
/*
Delete an email template:
*/
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
$response = $mj->delete(Resources::$Template, ['id' => $id]);
$response->success() && var_dump($response->getData());
?>
```

### Response

The `get`, `post`, `put` and `delete` method will return a `Response` object with the following available methods:

 - `success()` : returns a boolean indicating if the API call was successful
 - `getStatus()` : http status code (ie: 200,400 ...)
 - `getData()` : content of the property `data` of the JSON response payload if exist or the full JSON payload returned by the API call. This will be PHP associative array.   
 - `getCount()` : number of elements returned in the response
 - `getReasonPhrase()` : http response message phrases ("OK", "Bad Request" ...)

### API resources helpers

All API resources are listed in the `Resources` object. It will make it easy to find the resources and actions aliases.

```
$response = $mj->delete(Resources::$Template, ['id' => $id]);
$response = $mj->put(Resources::$ContactData, ['id' => $id, 'body' => $body]);
$response = $mj->post(Resources::$ContactManagecontactslists, ['id' => $id, 'body' => $body]);
```

## SMS API

### Token Authentication

Authentication for the SMS API endpoints is done using a bearer token. The bearer token is generated in the [SMS section](https://app.mailjet.com/sms) of your Mailjet account.

To create a new instance of the Mailjet client with token authentication, the token should be provided as the first parameter, and the second must be NULL:

```php
$mj = new \Mailjet\Client(getenv('MJ_APITOKEN'),
                          NULL, true,
                          ['url' => "api.mailjet.com", 'version' => 'v4', 'call' => false]
                        );
```

### Example Request

Here's an example SMS API request:

```php
//Send an SMS
$mj = new \Mailjet\Client(getenv('MJ_APITOKEN'),
                          NULL, true,
                          ['url' => "api.mailjet.com", 'version' => 'v4', 'call' => false]
                        );
$body = [
    'Text' => "Have a nice SMS flight with Mailjet !",
    'To' => "+336000000000",
    'From' => "MJ Pilot",
];
$response = $mj->post(Resources::$SmsSend, ['body' => $body]);
$response->success() && var_dump($response->getData());
```

## Contribute

Mailjet loves developers. You can be part of this project!

This wrapper is a great introduction to the open source world, check out the code!

Feel free to ask anything, and contribute:

- Fork the project.
- Create a new branch.
- Implement your feature or bug fix.
- Add documentation to it.
- Commit, push, open a pull request and voila.

If you have suggestions on how to improve the guides, please submit an issue in our [Official API Documentation repo](https://github.com/mailjet/api-documentation).

