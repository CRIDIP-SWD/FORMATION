<?php
    if(isset($_GET['view']))
    {
        switch($_GET['view'])
        {
            case "index":
                include ('view/index.php');
                break;

            case "formation-client":
                include ('view/formation-client.php');
                break;

            case "espace-client":
                include ('view/espace-client.php');
                break;
        }
    }else{
        include ('view/error-no-redirect.php');
    }