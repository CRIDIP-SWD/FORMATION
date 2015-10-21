<?php
class autre{
    public function gen_password($nb, $chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789")
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