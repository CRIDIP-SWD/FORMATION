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

            case "client":
                include "view/client.php";
                break;

            case "demande":
                include "view/demande.php";
                break;

            case "calendar":
                include "view/calendar.php";
                break;

            case "info":
                include "view/info.php";
                break;

            case "formation":
                include "view/formation.php";
                break;

        }
    }else{
        include ('view/error-no-redirect.php');
    }