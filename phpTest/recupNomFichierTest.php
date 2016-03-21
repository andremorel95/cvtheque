<?php 

$nom = "Chea";

$prenom = "Hugo";


$emplacement = '/upload/' . $nom . '.' . $prenom . '.pdf';

$test = basename ( $emplacement, ".pdf" );
$pieces = explode(".", $test);
echo $pieces[0] . '<br>'; // piece1
echo $pieces[1]; // piece2

echo '<br><br><br><br>';


$dir = "upload";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}

sort($files);

print_r($files);
echo '<br>';
rsort($files);

print_r($files);
echo '<br>';
echo '<br><br>';



echo '<a href="upload/' . $nom . '.' . $prenom . '.pdf"><p>Lien</p></a>';
?>


