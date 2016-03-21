
<?php
$filename = 'upload/Chea.Hugo.pdf';

if (file_exists($filename)) {
    echo "Le fichier $filename existe.";
} else {
    echo "Le fichier $filename n'existe pas.";
}
?>
