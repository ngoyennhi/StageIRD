// Create a zip file
    $zip_file = "../file/all-xml.zip";
    touch($zip_file);
    // open zip file and add all XML ISO files 
    $zip = new ZipArchive;
    $this_zip =$zip->open($zip_file);
        if ($this_zip){
            $folder =opendir('./../results');
            if($folder){
                while(false !== ($xmlISO = readdir($folder))){
                        $file_with_path ="../results/".$xmlISO;
                        $zip->addFile($file_with_path,$xmlISO);
                }
            }
            closedir($folder);
        }
  
    // Download this created zip file
    if(file_exists($zip_file)){
        //name when downnload
        $demo_name = "all_XML_ISO.zip";
        header
    }