<?php
require_once("./sekcje/naglowek.php");

$id = mysqli_real_escape_string($polaczenie, $_GET['id']);
//select x from
$wynik = $polaczenie->query("SELECT post.*, u.user FROM post JOIN uzytkownicy u ON u.id = post.id_user WHERE post.id=$id");
if ($wynik && $wynik->num_rows > 0) {
    $post = $wynik->fetch_assoc();
} else {
    die ("Post nie istnieje");
}


?>

    <div class="container">

        <div class="west">

            <main>

                <article class="post">

                    <header>

                        <h2><?=$post['title']?><span><?=$post['user']?></span></h2>
                        <span class="post-date"><?=date('Y-m-d H:i', strtotime($post['created_at']))?></span>


                    </header>

                    <p><?= nl2br($post['body']) ?> </p>

                    <section>

                        <heather>

                            <h1> Komentarze</h1>

                            <p>Podziel się z nami swoją opinią. Masz pytania? Pytaj! Na pewno otrzymasz odpowiedź. </p>

                        </heather>

                        <article>

                            <header>
                                <img src="img/user.jpg" alt="user">
                                <p>User 1 | 08.05.2020 | 13:12:12</p>
                            </header>

                            <p>Co za świenty wpis! Nigdy nie spodziewałem sie, ze Espresso miało takie duże znaczenie.
                                Pozdrawiam!</p>

                        </article>

                        <article>

                            <header>
                                <img src="img/user.jpg" alt="user">
                                <p>User 2 | 09.05.2020 | 12:12:12</p>
                            </header>

                            <p>Witam serdecznie! Bardzo dziękuję za tak treściwy wpis. Czekam z niecierpliwością na
                                nowinki!</p>

                        </article>


                    </section>


                </article>

            </main>

        </div>

        <div class="east">
            <aside>

                <nav>

                    <h2>Kategorie</h2>

                    <ul>
                        <li><a href="archiwum.php?kategoria=1">Rodzaje kawy</a></li>
                        <li><a href="archiwum.php?kategoria=2">Jak przygotować</a></li>
                        <li><a href="archiwum.php?kategoria=2">Akcesoria</a></li>

                    </ul>
                </nav>

            </aside>
        </div>

        <div style="clear:both;"></div>

<?php
require_once("./sekcje/stopka.php");
?>