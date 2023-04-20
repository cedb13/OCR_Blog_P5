# OCR_Blog_P5
Creation of a Model-View-Controller blog as part of the Application Developer training - PHP / Symfony OpenClassRooms
## Environment
Server software => Apache 2.4.52 Database management system => Mysql 8.0.31 Interface database management => Phpmyadmin 5.1 Main code language code => PHP 8.1.2
### Install project
clone the repository : https://github.com/cedb13/OCR_Blog_P5.git
or go to https://github.com/cedb13/OCR_Blog_P5
### CODACY
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/07d19140a08048aa98978c0bd1c81a5b)](https://app.codacy.com/gh/cedb13/OCR_Blog_P5/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)

## Architecture and functionalities
- At the root we have:
### htaccess file
### README file
### API folder 
**MailJet** library for sending mail, in our case to receive the contact form.
=> For the proper functioning of this API:
https://documentation.mailjet.com/hc/fr/articles/360042908593-Guide-de-d%C3%A9marrage/?utm_source=triggered-email&utm_medium=emailing&utm_campaign=welcome-email-mkg
- Register on https://www.mailjet.com/
- Get the API key and the secret key : https://app.mailjet.com/account/apikeys
- Insert the keys in the file /App/Lib/SendService.php line 23 (replace the keys) :
```$mj = new \Mailjet\Client('API key','secret key',true,['version' => 'v3.1']); ```
- Replace on line 28 and line 33 by your email
### App folder
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
### public folder
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

