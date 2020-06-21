<?php
require_once("./sekcje/naglowek.php");
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel.php');
		exit();
	}

?>

	<main>
		
		<article>
				
				<section>
					
					<div class="categories">
						
						<header>
							
							<h1>Witaj!</h1>
							<p>Tu możesz zalogować się do swojego konta.</p>
							
						</header>
						
						<div class="registraction">
							
						<form action="zaloguj.php" method="post">
							
							Login: <br /> <input type="text" name="login" /> <br />
							Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
							<input type="submit" value="Zaloguj się" />
						
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
require_once ("./sekcje/stopka.php");
?>