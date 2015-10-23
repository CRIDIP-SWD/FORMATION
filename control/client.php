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
if(isset($_POST['action']) && $_POST['action'] == 'edit-client-control'){
    include "../include/config.php";
    $idclient = $_POST['idclient'];
    $nom_societe = $_POST['nom_societe'];
    $adresse = htmlentities(addslashes($_POST['adresse']));
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];

    $sql_up_client = mysql_query("UPDATE client SET nom_societe = '$nom_societe', adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', telephone = '$telephone' WHERE idclient = '$idclient'")or die(mysql_error());


    if($sql_up_client === TRUE)
    {
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_societe&success=edit-client");
    }else{
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_societe&error=edit-client");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'supp-client-control')
{
    include "../include/config.php";
    $idclient = $_GET['idclient'];
    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);
    $idclient = $client['idclient'];
    $nom_societe = $client['nom_societe'];
    $sql_contact = mysql_query("SELECT idcontact FROM contact WHERE idclient = '$idclient'")or die(mysql_error());
    $contact = mysql_fetch_array($sql_contact);

    foreach ($contact as $valeur) {
        mysql_query("DELETE FROM utilisateur WHERE idcontact = '$valeur'")or die(mysql_error());
    }


    $sql_del_contact = mysql_query("DELETE FROM contact WHERE idclient = '$idclient'")or die(mysql_error());
    $sql_del_client = mysql_query("DELETE FROM client WHERE idclient = '$idclient'")or die(mysql_error());


    if($sql_del_client === TRUE AND $sql_del_contact === TRUE)
    {
        header("Location: ../index.php?view=client&post=$nom_societe&success=supp-client");
    }else{
        header("Location: ../index.php?view=client&error=supp-client");
    }
}