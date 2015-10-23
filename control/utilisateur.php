<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 21/10/2015
 * Time: 10:44
 */
class utilisateur
{
    public function client($idcontact)
    {
        $sql_client = mysql_query("SELECT * FROM contact, client WHERE contact.idclient = client.idclient AND contact.idcontact = '$idcontact'")or die(mysql_error());
        $client = mysql_fetch_array($sql_client);
        return $client;
    }
    public function info_user($login)
    {
        $sql_user = mysql_query("SELECT * FROM utilisateur WHERE login = '$login'")or die(mysql_error());
        $user = mysql_fetch_array($sql_user);
        return $user;

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
    include "autre.php";
    $autre = new autre();
    if(isset($_POST['login']) && !empty($_POST['login']))
    {
        $login = $_POST['login'];
        $sql_verif_user = mysql_query("SELECT count(*) FROM utilisateur WHERE login = '$login'");
        $verif_user = mysql_fetch_array($sql_verif_user);

        if($verif_user[0] == 1)
        {
            $sql_user = mysql_query("SELECT * FROM utilisateur WHERE login = '$login'")or die(mysql_error());
            $user = mysql_fetch_array($sql_user);
            $email = $user['adresse_mail'];
            $autre = new autre();
            $new_pass = $autre->gen_password(5);

            //Insertion dans la base de donnée du nouveau Mot de passe
            $pass_crypt = sha1($new_pass);
            $sql_up_user = mysql_query("UPDATE utilisateur SET password = '$pass_crypt' WHERE login = '$login' AND adresse_mail = '$email'")or die(mysql_error());

            //Envoie du Mail
            $to = $email .',';
            $to .= 'mmockelyn@cridip.com';

            $sujet = "<".NOM_LOGICIEL."> Réinitialisation de votre mot de passe";

            ob_start();
            ?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" href="<?= ROOT,ASSETS,CSS; ?>email.css">
            </head>
            <body>
            <table class="body">
                <tr>
                    <td class="center" align="center" valign="top">
                        <center>

                            <table class="row header">
                                <tr>
                                    <td class="center" align="center">
                                        <center>

                                            <table class="container">
                                                <tr>
                                                    <td class="wrapper last">

                                                        <table class="twelve columns">
                                                            <tr>
                                                                <td class="six sub-columns">
                                                                    <span style="width: 200px;height: 50px; font-weight: bold; font-size: 29px;"><?= NOM_LOGICIEL; ?></span>
                                                                </td>
                                                                <td class="six sub-columns last" style="text-align:right; vertical-align:middle;">
                                                                    <span class="template-label">Réinitialisation de votre mot de passe</span>
                                                                </td>
                                                                <td class="expander"></td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </table>

                                        </center>
                                    </td>
                                </tr>
                            </table>

                            <table class="container">
                                <tr>
                                    <td>

                                        <table class="row">
                                            <tr>
                                                <td class="wrapper last">

                                                    <table class="twelve columns">
                                                        <tr>
                                                            <td>
                                                                <h1>BONJOUR</h1>
                                                                <p>
                                                                    Vous avez demander la réinitialisation de votre mot de passe sur notre portail de formation.<br>
                                                                    Veuillez prendre note de votre nouveau mot de passe provisoire: <strong><?= $new_pass; ?></strong>
                                                                </p>
                                                                <p>
                                                                    Nous vous conseillons de modifier votre mot de passe une fois connecter à l'interface.<br>
                                                                    Pour y parvenir allez dans la section:<br>
                                                                    <strong>Vos informations</strong> -> <strong>Onglet "Mot de Passe"</strong>
                                                                </p>
                                                                <p>Nous vous remercions pour la confiance que vous accordez à <?= NOM_LOGICIEL; ?> et restons à votre disposition.</p>
                                                                <p>Cordialement,</p>
                                                                <p>
                                                                    Support Technique<br>
                                                                    <?= NOM_LOGICIEL; ?>
                                                                </p>
                                                            </td>
                                                            <td class="expander"></td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>

                                        <table class="row footer">
                                            <tr>
                                                <td class="wrapper last">

                                                    <table class="six columns">
                                                        <tr>
                                                            <td class="last right-text-pad">
                                                                <h5>CLH FORMATION:</h5>
                                                                <p>Téléphone: 06 50 37 24 51</p>
                                                                <p>Email: <a href="mailto:ph.bertrand61@gmail.com">ph.bertrand61@gmail.com</a></p>
                                                            </td>
                                                            <td class="expander"></td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>

                                        <!-- container end below -->
                                    </td>
                                </tr>
                            </table>

                        </center>
                    </td>
                </tr>
            </table>
            </body>
            </html>
            <?php
            $message = ob_get_contents();

            $headers = "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";
            $headers .= "To: no-reply <no-reply@clh>"."\r\n";

            $mail = mail($to, $sujet, $message, $headers);
            if($mail === TRUE AND $sql_up_user === TRUE)
            {
                header("Location: ../index.php?view=login&success=reinit-pass");
            }else{
                header("Location: ../index.php?view=login&error=reinit-pass");
            }
        }elseif($verif_user[0] == 0){
            header("Location: ../index.php?view=login&error=no_compte");
        }else{
            header("Location: ../index.php?view=login&error=bdd");
        }
    }else{
        header("Location: ../index.php?view=login&error=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnect')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login");
    exit();
}