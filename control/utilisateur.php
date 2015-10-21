<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 21/10/2015
 * Time: 10:44
 */
class utilisateur
{

}
if(isset($_POST['action']) && $_POST['action'] == 'Connexion')
{
    include "../include/config.php";
    if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sha_pass = sha1($password);


        $sql_verif_account = mysql_query("SELECT COUNT(*) FROM utilisateur WHERE login = '$login' AND password = '$sha_pass'")or die(mysql_error());
        $verif_account = mysql_fetch_array($sql_verif_account);

        if($verif_account[0] == 1)
        {
            session_start();
            $_SESSION['login'] = $login;
            header("Location: index.php?view=index");
            exit();
        }
        elseif($verif_account[0] == 0)
        {
            header("Location: index.php?view=login&error=no_compte");
        }
        else
        {
            header("Location: index.php?view=login&error=bdd");
        }
    }
    else
    {
        header("Location: index.php?view=login&error=champs");
    }
}