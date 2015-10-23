<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 23/10/2015
 * Time: 13:41
 */
class client
{
    public function generate_password($nb, $chaine = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890')
    {
        $nb_lettre = strlen($chaine) - 1;
        $generation = "";
        for($i=0; $i < $nb; $i++)
        {
            $pos = mt_rand(0, $nb_lettre);
            $car = $chaine[$pos];
            $generation .= $car;
        }
        return $generation;
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-client-control')
{
    include "../include/config.php";
    $nom_societe = $_POST['nom_societe'];
    $adresse = htmlentities(addslashes($_POST['adresse']));
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];

    $sql_add_client = mysql_query("INSERT INTO `client`(`idclient`, `nom_societe`, `adresse`, `code_postal`, `ville`, `telephone`)
                                    VALUES (NULL,'$nom_societe','$adresse','$code_postal','$ville','$telephone')")or die(mysql_error());
    $sql_client = mysql_query("SELECT * FROM client WHERE nom_societe = '$nom_societe' AND telephone = '$telephone'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);
    $idclient = $client['idclient'];

    if($sql_add_client === TRUE)
    {
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_societe&success=add-client");
    }else{
        header("Location: ../index.php?view=client&error=add-client");
    }


}