<?php
    if(isset($_GET['view']))
    {
        switch($_GET['view'])
        {
            case "index":
                include ('view/index.php');
                break;

            case "login":
                include ('view/login.php');
                break;

        }
    }else{
        include ('view/error-no-redirect.php');
    }