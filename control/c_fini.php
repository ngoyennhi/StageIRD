<?php
    //list file by file
    include 'control/c_formDownload.php';
  
// ZIP file
     function createZipAndDownload($files, $filesPath, $zipFileName)
        {
         // Create instance of ZipArchive. and open the zip folder.
         $zip = new ZipArchive();
         if ($zip->open($zipFileName, ZipArchive::CREATE) !== TRUE) {
             exit("cannot open <$zipFileName>\n");
         }
    
         // Adding every attachments files into the ZIP.
         foreach ($files as $file) {
             $zip->addFile($filesPath . $file, $file);
         }
         $zip->close();
    
        //test 2 
        header('Content-Description: File Transfer');
        header('Content-Type:'.mime_content_type($zipFileName));
        header('Content-Disposition: inline; filename="'.basename($zipFileName).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zipFileName));
        ob_clean();
        flush();

         //-------------------
         //download file 
         readfile("$zipFileName");
         // Delete all XMl files in folder data/results/file and XML_ISO_files.zip  before exit
         array_map('unlink', glob('../results/*.xml'));
         array_map('unlink', glob('../data/*.xml'));
         array_map('unlink', glob('../file/*.zip'));
         array_map('unlink', glob('../control/XML_ISO_files.zip'));
         exit;
        };

 // Files which need to be added into zip
    $files = glob("../results/*xml");
 // Directory of files
 $filesPath = '../results/';
 // Name of creating zip file
 $zipName = 'XML_ISO_files.zip';

 createZipAndDownload($files, $filesPath, $zipName);
 ?>  


