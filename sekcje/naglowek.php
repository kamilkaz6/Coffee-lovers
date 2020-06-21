<?php
    require_once ("./funkcje.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title>Coffee lovers</title>
    <meta name="description" content="Blog na temat kawy. Omówienie wybranych zagadnień wziązanych z kawą!">
    <meta name="keywords" content="kawa, mleko, blog, przemyślenia">
    <meta name="author" content="Kamila Zawadzka">

    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

</head>

<body>

<header>

    <h1 class="logo">Coffee lovers</h1>

    <nav id="topnav">

        <ul class="menu">
            <li><a href="index.php">Strona główna</a></li>
            <?php
                if(czyZalogowany())
                {
                    ?>
                    <li><a href="post_dodawanie.php">Dodaj post</a></li>
                    <li><a href="logout.php">Wyloguj</a></li>


                    <?php
                }
                else{?>
                    <li><a href="logowanie.php">Logowanie</a></li>
                    <li><a href="rejestracja.php">Rejestracja</a></li>

                    <?php
                }

            ?>

        </ul>

    </nav>
</header>