<?php
      switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
        case '/home.php':                   // URL (without file name) to a default screen
            require 'home.php';
            break; 
        case '/queue.php':     // if you plan to also allow a URL with the file name 
            require 'queue.php';
            break;              
        case '/eventcreation.php':
            require 'eventcreation.php';
            break;
        case '/settings.php':
            require 'settings.php';
            break;
        case '/login.php':
            require 'login.php';
            break;        
        case '/signup.php':
            require 'signup.php';
            break;
        case '/submit.php':
            require 'submit.php';
            break;
        case '/signin.php':
            require 'signin.php';
            break;
        case '/changee.php':
            require 'changee.php';
            break;
        case '/changep.php':
            require 'changep.php';
            break;
        case '/connect-db.php':
            require 'connect-db.php';
            break;

        default:
            http_response_code(404);
            exit('Not Found');
      }  
      ?>