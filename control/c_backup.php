<?php 

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