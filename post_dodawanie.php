<?php

require_once("funkcje.php");
if (!czyZalogowany()) {
    header('Location: index.php');
    exit();
}
require_once("./sekcje/naglowek.php");
$informacje = ["bledy"=>[]];

if (isset($_POST['wyslij'])) {
    $tytul = mysqli_real_escape_string($polaczenie, $_POST['title']);
    $kategoria = mysqli_real_escape_string($polaczenie, $_POST['kategoria']);
    $tresc = mysqli_real_escape_string($polaczenie, $_POST['body']);
    $id_uzytkownika = $_SESSION['id'];
    if($tytul==""){
        $informacje["bledy"]["title"]="Tytuł nie może być pusty";
    }
    if($tresc==""){
        $informacje["bledy"]["body"]="Treść  nie może być pusta";
    }

    if(count($informacje["bledy"])==0){

    $wynik = $polaczenie->query("SELECT * FROM kategoria WHERE id=$kategoria");
    if ($wynik->num_rows > 0) {
        $wynik = $polaczenie->query("insert into post (body, id_user, title, id_kategoria) values ('$tresc', $id_uzytkownika,'$tytul',$kategoria)");
        if ($wynik) {
            $informacje['komunikat'] = "Post dodany!";
        } else {
            $informacje['komunikat'] = "Wystąpił błąd podczas dodawania posta";
        }
    }}else{
        $informacje['komunikat'] = "Wystąpił błąd podczas dodawania posta";
    }
}
?>

    <main>

        <article>

            <section>

                <div class="categories">

                    <header>
                        <h1>Tu możesz dodać post</h1>
                        <?php
                        if(isset($informacje['komunikat']))
                        {
                            ?>
                            <h2><?=$informacje['komunikat']?></h2>
                            <?php
                        }
                        ?>
                    </header>

                    <div class="dodajpost">
                        <form method="post">

                            <label>
                               <?php
                               if(isset($informacje["bledy"]["title"]))
                               {
                                   ?><span class="error"><?=$informacje['bledy']['title']?></span><?php
                               }
                               ?>
                                Tytuł:
                                <input type="text" name="title">
                            </label>
                            <label>
                                Kategoria:
                                <select name="kategoria">
                                    <?php
                                    $result = $polaczenie->query("SELECT id, nazwa FROM kategoria");
                                    while (($wiersz = $result->fetch_assoc())) {
                                        ?>
                                        <option
                                        value="<?php echo $wiersz["id"] ?>"><?= $wiersz["nazwa"] ?></option><?php
                                    }
                                    ?>
                                </select>
                            </label>
                            <label>
                                <?php
                                if(isset($informacje["bledy"]["body"]))
                                {
                                    ?><span class="error"><?=$informacje['bledy']['body']?></span><?php
                                }
                                ?>
                                Treść:
                                <textarea name="body"></textarea>
                            </label>
                            <input type="submit" name="wyslij" value="wyślij">

                        </form>

                    </div>

                </div>
            </section>


        </article>

    </main>

<?php

require_once("./sekcje/stopka.php");

?>