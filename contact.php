<?php
include("database.php");

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_contact.css">
    <link rel="icon">
    <title>Kawałki i gryzki</title>
</head>
<body>
    <header>
    <h1 class="logo">Kawałki i gryzki</h1>
    <nav class="navbar">
        <ul>
            <li><a href="#">O nas</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Rezerwacje</a></li>
            <li><a href="#">Galeria</a></li>
        </ul>
    </nav>
    <a class="ct" href="contact.html"><button id="contact">Kontakt</button></a>
    </header>
    <main>
        <h2 id="contact_us">Skontaktuj się z nami</h2>
    <article>

    <section class="inqury">
        <h3 id="destiny">Zapytanie</h3>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label for="fname">Imię:</label><br>
    <input placeholder="Adam" type="text" id="fname" name="fname"><br>
    <label for="lname">Nazwisko:</label><br>
    <input placeholder="Przykładowy" type="text" id="lname" name="lname"><br>
    <label for="email">Email:</label><br>
    <input placeholder="twojemail@gmail.com" type="email" id="email" name="email"><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Mężczyzna</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Kobieta</label>
    <input type="radio" id="nobody" name="gender" value="nobody">
    <label for="nobody">Nie chce podawać</label><br>
    <input type="checkbox" id="statute" name="statute" value="1">
    <label for="statute">Akceptuję <a id="regulamin" href="#">regulamin</a></label><br>
    <input type="checkbox" id="newsletter" name="newsletter" value="1">
    <label for="newsletter">Akceptuje newsletter</label><br>
    <label for="message">Wiadomość:</label><br>
    <textarea placeholder="Twoja wiadomość do nas" rows="5" cols="25" name="message"></textarea><br>
    <button id="submit" type="submit">Wyślij</button>
    </form>
    
    </section>
    <section class="find_us">
        <h3 id="destiny">Znajdz nas</h3>
        <p>Nasz lokal w Poznaniu znajdziecie na ulicy <mark>Pólwiejskiej 15.</mark></p>
        <p>Druga nasza lokalizacja to Wrocław, ulica <mark>Fabryczna 20.</mark></p>
        <p>Zapraszamy!</p>
    </section>
</article>
    </main>
    </body>
    </html>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $fname = filter_input(INPUT_POST,"fname",FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,"lname",FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $gender = $_POST['gender'];
        $statute = isset($_POST['statute'])? 1:0 ;
        $newsletter = isset($_POST['newsletter'])? 1:0 ;
        $message = filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS);
        
        if(empty($fname)){
            echo"Wpisz imie";
        }
        elseif(empty($lname)){
            echo"Wpisz nazwisko";
        }
        elseif(empty($email)){
            echo"Wpisz email";
        }
        elseif(empty($gender)){
            echo"Zaznacz plec";
        }
        elseif(empty($message)){
            echo"Napisz wiadomosc";
        }
        $sql = "INSERT INTO wiadomosci
        (`id_klienta`, `imie`, `nazwisko`, `email`, `plec`, `regulamin`, `newsletter`, `wiadomosc`) 
        VALUES (NULL, '$fname', '$lname', '$email', '$gender', '$statute', '$newsletter', '$message')";
        try{
        if (mysqli_query($conn, $sql)) {
            echo"Dziekujemy za przeslanie wiadomosci";
            echo '<script>alert("Dziękujemy za przeslanie wiadomosci") </script>';
        } else {
            echo "Błąd: " . mysqli_error($conn);
        }
        }
        catch(mysqli_sql_exception){
            echo"Wystapil blad";
        }
        
    }    
    mysqli_close($conn);
    ?>