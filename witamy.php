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
<?php
require_once("./sekcje/naglowek.php");
?>
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
