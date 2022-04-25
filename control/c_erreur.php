<?php
// utiliser ces 3 lignes pour afficher les eurreurs 
$errors = error_get_last();
echo "COPY ERROR: ".$errors['type'];
echo "<br />\n".$errors['message'];