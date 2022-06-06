<?php include('control/c_home.php') ;
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center " style="margin-top: 30vh">
                <div class="row shadow-lg p-5 mb-5 bg-body rounded d-flex justify-content-center align-items-center ">
                        <h1>Welcome to Service Transformation</h1>
                </div>
                <div class="row bg-success p-2 text-dark bg-opacity-50 d-flex justify-content-center align-items-center">
                        <h2> XML2XMLISO19115 can help you to transform to XML files ISO-19115. </h2>
                        <h5> Click on button below to upload your folder to start </h5>
                </div>  
        </div>
        <div class="row d-flex justify-content-center align-items-center " >
            <div class="col d-flex align-items-center justify-content-around" style="margin-top: 2vw">
                <a href="index.php?loc=formUpload" class="nbutton noselect" >Upload products OSO</a>  
                <a href="index.php?loc=formUpload_neige" class="nbutton noselect" >Upload products SNOW</a>  
                <a href="index.php?loc=formUpload_reflectente" class="nbutton noselect" >Upload products Reflectante</a>  
        </div>
        </div>
</div> 



