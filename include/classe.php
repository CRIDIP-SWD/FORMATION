<?php
require_once "control/autre.php";
$autre = new autre();

require_once "control/utilisateur.php";
$user = new utilisateur();
$info_user = $user->info_user($login);




