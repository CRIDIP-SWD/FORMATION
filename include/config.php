<?php
//DEFINE STORK
DEFINE("NOM_LOGICIEL", "FORMATION - CLH");
DEFINE("VERSION_LOGICIEL", "0.1.0");
DEFINE("BUILD_LOGICIEL", "1236");

//DEFINE LINK
DEFINE("ROOT", "http://vps221243.ovh.net/formation/");
DEFINE("ASSETS", "assets/");
    DEFINE("CSS", "css/");
    DEFINE("IMG", "img/");
    DEFINE("JS", "js/");
    DEFINE("PLUGINS", "plugins/");
DEFINE("CONTROL", "control/");

//DATE
$date_jour = date("d-m-Y");
$date_jour_strt = strtotime(date("d-m-Y 00:00"));

$date_jour_heure = date("d-m-Y H:i");
$date_jour_heure_strt = strtotime(date("d-m-Y H:i"));

$heure_jour = date("H:i");

$jour_num = date("N");
$mois_num = date("n");

$jour = date("d");
$semaine = date("W");
$mois = date("m");
$years = date("Y");
$heure = date("H");
$minutes = date("i");
class date_format{
    public function jour_semaine($jour)
    {
        switch($jour)
        {
            case 1: echo "Lundi"; break;
            case 2: echo "Mardi"; break;
            case 3: echo "Mercredi"; break;
            case 4: echo "Jeudi"; break;
            case 5: echo "vendredi"; break;
            case 6: echo "Samedi"; break;
            case 7: echo "Dimanche"; break;
        }
    }

    public function mois($mois)
    {
        switch($mois)
        {
            case 1: echo "Janvier"; break;
            case 2: echo "Février"; break;
            case 3: echo "Mars"; break;
            case 4: echo "Avril"; break;
            case 5: echo "Mai"; break;
            case 6: echo "Juin"; break;
            case 7: echo "Juillet"; break;
            case 8: echo "Aout"; break;
            case 9: echo "Septembre"; break;
            case 10: echo "Octobre"; break;
            case 11: echo "Novembre"; break;
            case 12: echo "Décembre"; break;
        }
    }



}
$date_class = new date_format();
//FONCTION CONFIG
function nom_sector($sector)
{
    return $sector;
}

function nom_page($page)
{
    return $page;
}

//Connexion à la base de donnée

class database{
    public $host = "localhost";
    public $user = "root";
    public $pass = "1992maxime";
    public $base = "formation";

    public function __construct()
    {
        $connect = mysql_connect($this->host, $this->user,$this->pass)or die(header("Location: ../index.php?view=error&code=53112244BDD"));
        $database = mysql_select_db($this->base)or die(header("Location: ../index.php?view=error&code=5419412244BDD"));

    }


}

$database_class = new database();
