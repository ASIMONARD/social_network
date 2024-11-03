<?php

//Foction de valisation du formuaire

function test_input ($data) {
    $data = trim($data);                //Supprime les espace avant et après la valeur
    $data = stripslashes($data);        //Supprime les backslashes
    $data = htmlspecialchars($data);    //Converti les caractères spéciux en entités HTML
    return $data;
}
?>