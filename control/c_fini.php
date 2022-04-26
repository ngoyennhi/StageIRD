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
 <!-- <table>
 <tr><th>Files transformed into XML ISO 19115</th></tr>
 <?php
    include 'control/c_formDownload.php';
    // Array containing file names
    $files = glob("../results/*xml");
    // Loop through array to create file XML
        foreach($files as $file){
            echo sprintf(
            "<tr><td>%s</td></tr>\n",
            '<p><a href="../results/'.$file.'" alt="'.pathinfo($file, PATHINFO_FILENAME).'">'.$file.'</a></p>'
            );
    }
 ?> 
 </table> -->
 <h2>Download XMl files ISO 19115 standard </h2>
 <?php
    include 'control/c_formDownload.php';
    // Array containing file names
    $files = glob("../results/*xml");
    // Loop through array to create file XML
        foreach($files as $file){
            // remove "../results/" form file name
            $file = substr($file,11);
            echo sprintf(
            "<tr><td>%s</td></tr>\n",
            '<p><a href="c_fini.php?file='.$file.'" alt="'.pathinfo($file, PATHINFO_FILENAME).'">'.$file.'</a></p>'
            );
        if(!empty($_GET['file'])){
                $filename =basename($_GET['file']);
  
                $filepath = '../results/'.$filename;
    
                if(!empty($filename) && file_exists($filepath)){
                    //Define Headers
                    header("Cache-Control: public");
                    header("Content-Description: File Transer");
                    header("Content-Disposition: attachment; filename=$filename");
                    header("Content-Type: application/zip");
                    header("Content-Transfer-Emcoding: binary");
                
                    readfile($filepath);
                    exit;
                }
                else{
                http_response_code(404);
                 die();
                }
                }
                
    }
 ?> 
 <a href="../index.php">Back to Home Page</a>
 </body>
</html>


