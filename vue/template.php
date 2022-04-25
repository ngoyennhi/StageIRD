<?php
$loc = filter_input(INPUT_GET,'loc');
$path = '';
switch ($loc) {
    // TP upload file
    case 'formUpload':
        $path = 'vue/formUpload.php';
        break;
    case 'formTrans':
        $path = 'vue/formTrans.php';
        break;
    default:
        $path = 'vue/home.php';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML2XMLISO</title>
</head>
<body>
    <?php include($path);?>
    <a href="index.php?loc=formUpload">Upload file to créer des métadonnées XML ISO 19115</a>
    <a href="index.php?loc=formTrans">Download file des métadonnées XML ISO 19115</a>
</body>
</html>