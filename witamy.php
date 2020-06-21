<?php


session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: logowanie.php');
		exit();
	}
		else
		{
			unset($_SESSION['udanarejestracja']);
		}
	
	
?>
<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title>Coffee lovers</title>
	<meta name="description" content="Blog na temat ckawy. Omówienie wybranych zagadnień wziązanych z kawą!">
	<meta name="keywords" content="kawa, mleko, blog, przemyślenia">
	<meta name="author" content="Kamila Zawadzka">

	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

	<link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
				<li><a href="logowanie.php">Logowanie</a></li>
				<li><a href="rejestracja.php">Rejestracja</a></li>
			</ul>

		</nav>
	</header>
	
	<main>
		
		<article>
				
				<section>
					
					<div class="categories">
						
						<header>
							
							<h1>Dziękujemy za rejestracje! </h1>
							<p>Możesz się już zalogować.  Niech kawa będzie z Tobą!</p>
							
							<a href="logowanie.php">Zaloguj się na swoje konto!</a>
							
						</header>
						

						</form>
<?php
	if(isset($_SESSION['blad']))
	echo $_SESSION['blad'];

?>
							
						</div>

				</section>

		</article>
		
	</main>

<?php

require_once("./sekcje/stopka.php");

?>