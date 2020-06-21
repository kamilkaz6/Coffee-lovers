<?php
    require_once("./sekcje/naglowek.php");
    $kategoria = mysqli_real_escape_string($polaczenie, $_GET['kategoria']);
    $wynik = $polaczenie->query("SELECT * FROM kategoria WHERE id=$kategoria");

    $posty = [];

    if ($wynik && $wynik->num_rows > 0) {
        $kategoria = $wynik->fetch_assoc();
        $wynik=$polaczenie->query("SELECT post.*, u.user FROM post JOIN uzytkownicy u ON u.id = post.id_user WHERE id_kategoria = {$kategoria['id']}");
        if($wynik){
            $posty=$wynik->fetch_all(MYSQLI_ASSOC);
        }
    }
?>


<section id="newest">

    <div class="entries archiwum">

        <header>

            <h1>Wpisy z kategorii: <?=$kategoria['nazwa']?></h1>
            <p>Poniżej znajdziesz trzy najnowsze wpisy na blogu. Mam nadzieję, że poniższe wpisy zaciekawą Ciebie do dalszej lektury. </p>

        </header>
        <?php foreach($posty as $post){ ?>

        <div class="entry">

            <div class="entrytxt">
                <h2><?=$post['title']?><span><?=$post['user']?> | <?=date('Y-m-d H:i', strtotime($post['created_at']))?></span></h2>
                <p><?= substr($post['body'], 0, 120) ?>... </p>

                <a href="post.php?id=<?=$post['id']?>">Czytaj dalej</a>
            </div>
        </div>
       <?php } ?>


    </div>

</section>






<?php
require_once("./sekcje/stopka.php");
?>

