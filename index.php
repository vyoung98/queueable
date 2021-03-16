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
        default:
            http_response_code(404);
            exit('Not Found');
      }  
      ?>