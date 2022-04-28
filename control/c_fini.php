<?php
    //list file by file
    include 'control/c_formDownload.php';
    // list file by file
    // include 'control/c_formDownload.php';
    // // Array containing file names
    // $files = glob("../results/*xml");
    // // Loop through array to create file XML
    //     foreach($files as $file){
    //         // remove "../results/" form file name
    //         $file = substr($file,11);
    //         echo sprintf(
    //         "<tr><td>%s</td></tr>\n",
    //         '<p><a href="c_fini.php?file='.$file.'" alt="'.pathinfo($file, PATHINFO_FILENAME).'">'.$file.'</a></p>'
    //         );
    //     if(!empty($_GET['file'])){
    //             $filename =basename($_GET['file']);
  
    //             $filepath = '../results/'.$filename;
    
    //             if(!empty($filename) && file_exists($filepath)){
    //                 //Define Headers
    //                 header("Cache-Control: public");
    //                 header("Content-Description: File Transer");
    //                 header("Content-Disposition: attachment; filename=$filename");
    //                 header("Content-Type: application/zip");
    //                 header("Content-Transfer-Emcoding: binary");
                
    //                 readfile($filepath);
    //                 exit;
    //             }
    //             else{
    //             http_response_code(404);
    //              die();
    //             }
    //             }     
    // }


    
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
    
         // Download the created zip file
         header("Content-type: application/zip");
         header("Content-Disposition: attachment; filename = $zipFileName");
         header("Pragma: no-cache");
         header("Expires: 0");
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


