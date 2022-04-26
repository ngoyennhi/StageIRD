<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
 <title>Download XML ISO 19115</title>
 <style>
 table { border-collapse: collapse; }
 table, td, th { border: 1px solid black; }
 td, th { padding: 4px; }
 </style>
 </head>
 <body>
 <table>
 <tr><th>Files XML ISO 19115</th></tr>
 <?php
 include 'control/c_formDownload.php';
 $files = glob("/Applications/MAMP/htdocs/StageIRD_XML_PHP/StageIRD/results/*xml");
 // Un petit bout de code PHP pour générer les lignes du
 // tableau présentant la liste des documents.
 // Parcourir la liste des documents et utiliser le nom
 // pour l’afchage et le numéro dans l’URL.
 foreach ( $files as $numero => $document) {
     echo sprintf(
         "<tr><td>%s</td></tr>\n",
         "<a href='../control/c_formDownload.php?no=$numero'>$document</a>"
     );
 }
 ?>
 </table>
 </body>
</html>

