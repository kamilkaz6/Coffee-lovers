<?php

require_once("./sekcje/naglowek.php");


if (isset($_POST['email'])) {
    // Udana walidacja
    $wszystko_OK = true;

    //Sprawdzenie poprawności nicka
    $nick = $_POST['nick'];

    //Sprawdzenie długości nicka
    if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków!";
    }

    if (ctype_alnum($nick) == false) {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Nick musi składać się tylko z liter i cyfr";
    }

    //Sprawdzenie poprawności adresu email
    $email = mysqli_real_escape_string($polaczenie, $_POST['email']);
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres email";
    }

    // Sprawdzanie poprawności hasła
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków";
    }

    if ($haslo1 != $haslo2) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    //czy zaakceptowano regulamin
    if (!isset($_POST['regulamin'])) {
        $wszystko_OK = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptacji regulaminu";
    }

    try {
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if ($ile_takich_maili > 0) {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail";
            }

            //Czy nick jest juz zarezerwowany?
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_nickow = $rezultat->num_rows;
            if ($ile_takich_nickow > 0) {
                $wszystko_OK = false;
                $_SESSION['e_nick'] = "Istnieje już gracz o takim nicku! Wybierz inny ";
            }
            if ($wszystko_OK == true) {
                //Wszsystkie dane ok
                if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email')")) {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: witamy.php');
                } else {
                    throw new Exception($polaczenie->error);
                }
            }

            $polaczenie->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności</span>';
        //	echo '<br />Informacja deweloperska: '.$e;
    }
}


?>


<main>

    <article>

        <section>

            <div class="categories">

                <header>

                    <h1>Witaj </h1>
                    <p>Tu możesz się zarejestrować!</p>

                </header>

                <div class="registraction">

                    <form method="post">

                        Nickname: <br/> <input type="text" name="nick"/><br/>

                        <?php

                        if (isset($_SESSION['e_nick'])) {
                            echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
                            unset($_SESSION['e_nick']);
                        }

                        ?>

                        E-mail: <br/> <input type="text" name="email"/><br/>

                        <?php

                        if (isset($_SESSION['e_email'])) {
                            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                            unset($_SESSION['e_email']);
                        }

                        ?>

                        Twoje hasło: <br/> <input type="password" name="haslo1"/><br/>

                        <?php

                        if (isset($_SESSION['e_haslo'])) {
                            echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
                            unset($_SESSION['e_haslo']);
                        }

                        ?>

                        Powtórz hasło: <br/> <input type="password" name="haslo2"/><br/>

                        <label>
                            <input type="checkbox" name="regulamin"/> Akceptuję regulamin
                        </label>
                        <?php

                        if (isset($_SESSION['e_regulamin'])) {
                            echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
                            unset($_SESSION['e_regulamin']);
                        }

                        ?>
                        <br/>
                        <br/>

                        <input type="submit" value="Zarejestruj się"/>

                    </form>


                </div>


        </section>


    </article>

</main>

<?php
require_once ("./sekcje/stopka.php");
?>