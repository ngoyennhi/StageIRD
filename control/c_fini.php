<?php
    // file by file
    // include ('control/c_formDownload.php');
    // // Array containing file names
    // $files = glob("../results/*xml");
    // // Loop through array to create file XML
    //     foreach($files as $file){
    //         echo sprintf(
    //         "<tr><td>%s</td></tr>\n",
    //         '<p><a href="../results/'.$file.'" alt="'.pathinfo($file, PATHINFO_FILENAME).'">'.$file.'</a></p>'
    //         );
    // }

    include ('control/c_formDownload.php');
    // Array containing file names
    $files = glob("../results/*xml");
    $foldertobackup = 'ZipISO1915';

    $backup = '../results/'.$foldertobackup;

    $newname = $foldertobackup.'.backup.zip';

    $cmd = "zip -r $newname $backup";
                        
    $compressFolder = exec($cmd ." 2>&1" );

    echo $compressFolder;
                        
    if($compressFolder)
    {
	    echo 'Done';
    }else{
	    echo 'Not Done';
    }
?>



