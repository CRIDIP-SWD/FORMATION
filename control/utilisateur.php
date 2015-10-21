<?php
include "autre.php";
use \autre;
/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 21/10/2015
 * Time: 10:44
 */
class utilisateur
{
    public function client($idclient)
    {
        $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
        $client = mysql_fetch_array($sql_client);
        return $client;
    }
    public function info_user($login)
    {
        $sql_user = mysql_query("SELECT * FROM utilisateur WHERE login = '$login'")or die(mysql_error());
        $user = mysql_fetch_array($sql_user);
        if($user['type'] == 1){
            $user = $this->client($user['idclient']);
            return $user;
        }else{
            return $user;
        }

    }
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
            header("Location: ../index.php?view=index");
            exit();
        }
        elseif($verif_account[0] == 0)
        {
            header("Location: ../index.php?view=login&error=no_compte");
        }
        else
        {
            header("Location: ../index.php?view=login&error=bdd");
        }
    }
    else
    {
        header("Location: ../index.php?view=login&error=champs");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'reinit-pass')
{
    include "../include/config.php";
    if(isset($_POST['login']) && !empty($_POST['login']))
    {
        $login = $_POST['login'];
        $sql_verif_user = mysql_query("SELECT count(*) FROM utilisateur WHERE login = '$login'");
        $verif_user = mysql_fetch_array($sql_verif_user);

        if($verif_user[0] == 1)
        {
            $sql_user = mysql_query("SELECT * FROM utilisateur WHERE login = '$login'")or die(mysql_error());
            $user = mysql_fetch_array($sql_user);
            $email = $user['email'];
            $autre = new autre();
            $new_pass = $autre->gen_password(5);
            echo $new_pass;

        }
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnect')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login&warn=deconnect");
    exit();
}