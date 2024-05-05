<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logowanie.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora&display=swap">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a65b9406d1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="zegarek.js"></script>
    <script type="text/javascript" src="migotanie.js"></script>
	<?php include "licznikodwiedzin.php";?>
	<?php include "imieniny.php";?>
    <title>Dawid Garncarek - Informatyk</title>
</head>

<body onload="odliczanie()">
    <header>
        <p id="zegar"></p>
		<p id="zegar"><a href="logowanie.php" class="loguj">Zaloguj się</a></p>
		<p id="zegar"><?php echo htmlspecialchars($_SESSION["username"]); ?> Witamy</p>
		<p id="zegar"><a href="logout.php" class="loguj">Wyloguj się</a></p>
		<p id="zegar"><a href="register.php" class="loguj">Zarejestruj się</a></p>
        <div class="welcome">
            <p id="migotanie">witaj!</p>
            <h1>Jestem Dawid Garncarek</h1>
            <h2>student informatyki</h2>
			<p class="odwiedziny"><?php echo "Licznik odwiedzin: ".(getHits()); ?></p>
        </div>
        <img src="photo.png" alt="Moje zdjęcie">
    </header>
    <section class="menu clearfix">
        <nav>
            <ul class="menu clearfix">
                <li><a href="index.php"><i class="fa-solid fa-person"></i>Opis</a></li>
                <li><a href="motto.php"><i class="fa-solid fa-mountain"></i>Motto</a></li>
                <li><a href="hobby.php"><i class="fa-solid fa-motorcycle"></i>Hobby</a></li>
                <li><a href="uslugi.php"><i class="fa-solid fa-desktop"></i>Usługi</a></li>
                <li><a href="sprzet.php"><i class="fa-solid fa-headphones"></i>Sprzęt</a></li>
                <li><a href="#kontakt"><i class="fa-solid fa-address-card"></i>Kontakt</a></li>
            </ul>
        </nav>
    </section>
    <section class="cv">
        <h1>Krótka historia mojego życia zawodowego</h1>
        <div class="info clearfix">
            <div class="web"><img src="omnie.jpg" alt="zdjęcie dotyczące informacji o mnie"></div>
            <div class="about">
                <h2>O mnie</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta officia iste vero veniam rem modi impedit eaque deserunt omnis aperiam inventore autem a quod excepturi commodi, quidem aliquid nisi, laborum? ipsum dolor sit amet, consectetur adipisicing elit. Facilis incidunt deserunt maiores natus error voluptatem vitae qui provident ratione ipsam non nisi eligendi aliquam dignissimos, consectetur tempora unde esse voluptatum! ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, minus! Voluptates accusantium autem fugiat veniam qui eius, quam illo minus magni quo eaque at tempora odio iste, delectus aliquid ullam? ipsum dolor sit amet, consectetur adipisicing elit. </p>
            </div>
        </div>
        <div class="info clearfix">
            <div class="web"><img src="szkolenia.jpg" alt="zdjęcie dotyczące szkoleń"></div>
            <div class="about clearfix">
                <h2>Szkolenia</h2>
                <h3>Warsztaty</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus culpa facere beatae quam qui! Laboriosam </p>
                <h3>Kurs Językowy</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore qui, eligendi adipisci pariatur sint dolorum ut, nam in.</p>
                <h3>Szkolenie programowania </h3>
                <p>Lorem ipsum dolor sit amet, consectetur aus commodi cumque deleniti ab harum, quod officia aut ratione, consequuntur, rem, odio id?</p>
                <h3>Kurs programowania</h3>
                <p>ste est tempore illo voluptate, vero tempora ea voluptatem nostrum autem inventore quis ullam provident, modi ipsam.</p>
                <h3>Kurs front-developer</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ea unde hic aspernatur repudiandae dolorem possimus, consequatur eum deserunt dignissimos minus iusto, neque perspiciatis! Rem sequi, numquam voluptates repudiandae quidem.</p>

            </div>
        </div>
        <div class="info clearfix">
            <div class="web"><img src="doswiadczenie.jpg" alt="zdjęcie dotyczące doświadczenia"></div>
            <div class="about">
                <h2>Doświadczenie</h2>
                <h3>Praktyki Zawodowe Erasmus+ </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quibusdam, voluptate, voluptatem totam p.</p>
                <h3>Praktyki Zawodowe , Projekt ’’Wykwalifikowany absolwent” </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit dolore dignissimos dolor. Quaerat temp</p>
                <h3>Praca w firmie Dell </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga asperiores quasi repellendus quam commodi dicta, numquam</p>
            </div>
        </div>
        <div class="info clearfix">
            <div class="web"><img src="edukacja.jpg" alt="zdjęcie dotyczące edukacji"></div>
            <div class="about">
                <h2>Edukacja</h2>
                <h3>Zespół Szkół nr 2 im. Jana Pawła II gdzieś tam</h3>
                <p>Profil: technik informatyk</p>
                <h3>Politechnika Opolska - 2020 </h3>
                <p>Kierunek: Informatyka niestacjonarnie I-stopnia</p>
            </div>
        </div>
    </section>
    <section class="contact" id="kontakt">
        <h1>Skontaktuj się ze mną</h1>
        <div class="wrap clearfix">
<?php
                    if(empty($_POST['name'])&&empty($_POST['message'])){
                        echo "<form method=\"post\" name=\"contact\">
                        <input type=\"text\" name=\"name\"  placeholder=\"Twoje imię\" required>
                        <input type=\"email\" name=\"mail\"  placeholder=\"Email\" required>
                        <textarea name=\"message\"  placeholder=\"Twoja wiadomość\" required></textarea>
                        <button name=\"submit\">Wyślij wiadomość</button>
                        </form>";}
				    else{
                        $name = $_POST['name'];
                        $name = addslashes($name);
                        $name = iconv("UTF-8","ISO-8859-2",$name);
                        $message = $_POST['message'];
                        $message = addslashes($message);
                        $message = iconv("UTF-8","ISO-8859-2",$message);
                        $adresod = $_POST['mail'];
                        $adresod = addslashes($adresod);
                        $adresdo = 'projektwizytowka@gmail.com';
                        mail($adresdo,$name,$message);

                    echo "<p style=\"color:white; float:left; font-size:25px; line-height:480px; padding:0px 50px 0 60px;\">Wiadomość została wysłana.</p>";
}
?>
            <div class="socials">
                <div class="social clearfix"><img src="email.png" alt="email"><span>d_garncarek@wp.pl</span></div>
                <div class="social clearfix"><img src="facebook.png" alt="facebook"><span>Dawid Garncarek</span></div>
                <div class="social clearfix"><img src="phone.png" alt="telefon"><span>664 202 137</span></div>
                <div class="social clearfix"><img src="linkedin.png" alt="linkedin"><span>Dawid Garncarek</span></div>
                <div class="social clearfix"><img src="instagram.png" alt="instagram"><span>d_dawid_g</span></div>
            </div>
        </div>
    </section>
    <footer>
		<p style="text-align:left;"><?php $ip = $_SERVER['REMOTE_ADDR']; echo "Twój adres IP to: " . $ip . ", a HOST to: " . gethostbyaddr( $ip );?></p>
		<p style="text-align:left;"><?php echo imieniny(); ?></p>
		&copy; Dawid Garncarek
    </footer>
</body>

</html>
