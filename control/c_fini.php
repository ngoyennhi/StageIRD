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
         exit;
     };

 // Files which need to be added into zip
    $files = glob("../results/*xml");
 // Directory of files
 $filesPath = '../results/';
 // Name of creating zip file
 $zipName = 'XML_ISO_files.zip';

 createZipAndDownload($files, $filesPath, $zipName);




    // // zip file
    // // Create a zip file by function touch()
    // $zip_file = "../file/all-xml.zip";
    // touch($zip_file);
    // // open zip file and add all XML ISO files 
    //  $zip = new ZipArchive;
    //     $this_zip =$zip->open($zip_file);
    //     if ($this_zip){
    //        $folder =opendir('./../results');
    //        if($folder){
    //            while(false !== ($xmlISO = readdir($folder))){
    //                    $file_with_path ="../results/".$xmlISO;
    //                    $zip->addFile($file_with_path,$xmlISO);
    //             }
    //             closedir($folder);
    //        }
    //         $zip->close(); 
    //     }

    // // Download this created zip file
    // if(file_exists($zip_file)){
    //     //For force download, you have to set the header correctly. When you are setting the header for download the Zip file that time <coce>Content-type and Content-Disposition correctly. In Content-Disposition, add the attachment, it will suggest the browser to download the file instead of displaying it directly. 
    //     header('Content-type: application/zip');
    //     header('Content-Disposition: attachment; filename="'.basename($zip_file).'"');
    //     header("Content-length: " . filesize($zip_file));
    //     header("Pragma: no-cache");
	//     header("Expires: 0");
    //     ob_clean(); // clear the output buffer to avoid the problem with auto unzipping
    //     flush();// clear the output buffer to avoid the problem with auto unzipping
    //     readfile($zip_file); //auto download
        
    //     // delete this zip-file after download
    //     unlink($zip_file);
    //     exit("Done");
    // }



 ?>  


