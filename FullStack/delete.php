<?php
    session_start();

    $filename=$_GET['filename'];

    if($_SESSION['verifier']==true && $filename!="")
    {
    	unlink($filename);   // Deleted the file.
    }

?>