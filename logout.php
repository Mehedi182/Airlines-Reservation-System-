<?php
session_start();

if( isset($_GET['logout']) ) {
	session_destroy ();
	//unset ($_SESSION["email_s"]);

        
header('Location: index.php');

    }


    	