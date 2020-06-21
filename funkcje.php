<?php
    session_start();

	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "kawa";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    function czyZalogowany()
    {

        if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany'] == false))
        {
            return false;
        }
        return true;
    }
