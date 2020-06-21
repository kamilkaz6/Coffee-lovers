<?php
    require_once("./sekcje/naglowek.php");
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}

?>

	<main>
		
		<article>
				
				<section>
					
					<div class="categories">
						
						<header>
							
							<h1>Witaj jesteś ZALOGOWANY!</h1>
							<p>Skoro tu trafiłeś to podejrzewam, że jesteś miłośnikiem kawy. Serdecznie zapraszam do lektury.</p>
							
						</header>
						
						<div class="registraction">
							
						<?php
						
							echo "<p><b>Witaj ".$_SESSION['user']."!</b></p>";
							echo "<p>Twój email to: ".$_SESSION['email']."</p>";
							echo '<p>[<a href="logout.php">Wyloguj się</a>]</p>';
						
						?>
						
						</form>
							
						</div>

				</section>

		</article>
		
	</main>

<?php
require_once ("./sekcje/stopka.php");
?>