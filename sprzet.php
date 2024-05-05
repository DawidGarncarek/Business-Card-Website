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
    <section class="sprzet">
        <h6>oto sprzęt na którym pracuje:</h6>
        <div class="komp">
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Procesor - AMD Ryzen 7 5800X</div>
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Płyta główna - Asus TUF GAMING X570-PLUS</div>
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Pamięć RAM - Ballistix 32GB Kit DDR4 2x16GB 3000</div>
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Karta graficzna - Gigabyte Aorus Radeon RX 6800 XT</div>
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Zasilacz - Corsair HX1200</div>
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Chłodzenie systemu - Cooler Master MasterLiquid ML240L</div>
            <div class="podzespol"><i class="fa-solid fa-circle-dot"></i>Obudowa - SilentiumPC Armis AR6X</div>
            <div class="podzespol">
                <p>Miejsce gdzie kupiłem części: </p><a href="https://www.x-kom.pl/"><img src="xkom.jpg" alt="xkom"></a>
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
