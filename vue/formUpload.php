<form action='control/c_formUpload.php' method='post' enctype = 'multipart/form-data'>
<div>
    <!-- this code will work for Chrome and Mozilla browser only-->
    Upload Folder: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" />
    <!-- La valeur précisée dans cette zone ne peut pas être supérieure à la valeur de la directive de confguration upload_max_flesize (2 Mo par défaut) -->
    <input type ='hidden' name='saisie[MAX_FILE_SIZE]' value='250000'/>
    <input type ='submit' name='saisie[ok]' value = 'OK'/>
    <!-- Fichier:-->
    <!-- <input size = '100' type ='file' name='fichier' />-->
</div>
</form>