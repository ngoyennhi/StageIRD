<!-- recuperer les infos saisies sur la formulaire Upload -->
<?php
// Delete all XMl files in folder data before import 
array_map('unlink', glob('../data/*.xml'));

$arrSaisi = filter_input(INPUT_POST,'saisie',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
//var_dump($arrSaisi);
// Inialisation de la variable de message
$message = '';
// Traitement du formulaire
// if boutton OK appliqué, on commence le traitement
if (isset($arrSaisi['ok'])) {
    // Recupere les infos sur le fichier
    // $informations = $_FILES['fichier'];
    $informations = $_FILES['files'];
   //var_dump( $informations);
    for ($i=0; $i < sizeof($informations)-1 ; $i++) 
   {
            // En extraire:
            // son nom
            $nom = $informations['name'][$i];
            // son type MIME
            $type_mime = $informations['type'][$i];
            // sa taille.
            $taille = $informations['size'][$i];
            //l'emplacement du fchier temporaire.
            $fichier_temporaire = $informations['tmp_name'][$i];
            // le code d’erreur.
            $code_erreur = $informations['error'][$i];
            
            //controles et traitement
            switch ($code_erreur) {
                case UPLOAD_ERR_OK:
                    // Fichier bien reçu
                    // Déterminer sa destination finale.
                    $destination = '../data/'.$nom;
                    // Copier le fichier temporaire (tester le résultat)
                    if (copy($fichier_temporaire, $destination)) {
                        // Copie OK => mettre un message de confrmation.
                        $message = 'Transfert terminé - Fichier = '.$nom.'<br>'; 
                        $message .= 'Taille = '.$taille.'octets - '.'<br>';
                        $message .= 'Type MIME = '.$type_mime.'<br>';
                    } 
                    break;
                case UPLOAD_ERR_NO_FILE:
                    // Pas de fchier saisi.
                    $message = 'Pas de fichier saisi.';
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    // Taille fchier > upload_max_flesize.
                    $message = 'Fichier '.$nom.' non transféré ';
                    $message .= '(taille > upload_max_flesize).';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    // Taille fchier > MAX_FILE_SIZE.
                    $message = 'Fichier '.$nom.' non transféré ';
                    $message .= '(taille > MAX_FILE_SIZE).';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    // Fichier partiellement transféré.
                    $message = 'Fichier '.$nom.' non transféré ';
                    $message .= '(problème lors du tranfert).';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    // Pas de répertoire temporaire.
                    $message = 'Fichier '.$nom.' non transféré ';
                    $message .= '(pas de répertoire temporaire).';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    // Erreur lors de l'écriture du fchier sur disque.
                    $message = 'Fichier '.$nom.' non transféré ';
                    $message .= "(erreur lors de l\'écriture du fchier sur disque).";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    // Transfert stoppé par l'extension.
                    $message = 'Fichier '.$nom.' non transféré ';
                    $message .= "(transfert stoppé par l\'extension).";
                    break;
                default:
                    // Erreur non prévue !
                    $message ='Fichier non transféré';
                    $message .= "(erreur inconnue : $code_erreur ).";
                    break;  
        };
        echo $message;
   } 
}
?>
<!--Rediriger sur la page précédente -->
<!-- <meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" /> -->
<!-- Rediriger sur la page précédente -->
<meta http-equiv="refresh" content="1; url=../index.php?loc=formDownload" />