<?php
$filename = "Mon_fichier"; //un nom de fichier random, "lien biscornue"
$text = "Mon code ou ce que je veux ...";//page html avec un tableau de la liste des étudiants selectionnés.
 
$open = fopen($filename.".html", "w"); /*plusieurs mode d'ouverture(W write, R read) */
 
fwrite($open, $text);
fclose($open);
?>