<form action='control/c_formUpload.php' method='post' enctype = 'multipart/form-data'>
<div>
    <!-- Ce code ne fonctionnera que pour les navigateurs Chrome et Mozilla-->
    <div class="container">
        <div class="row">
            <h2> Upload Folder: </h2>
            <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" class="form-control-plaintext" />
            <!-- La valeur précisée dans cette zone ne peut pas être supérieure à la valeur de la directive de confguration upload_max_flesize (2 Mo par défaut) -->
            <input type ='hidden' name='saisie[MAX_FILE_SIZE]' value='250000'/>
            <input class="btn btn-primary mb-3" type ='submit' name='saisie[ok]' value = 'OK' />
        </div>
    </div>
</div>

