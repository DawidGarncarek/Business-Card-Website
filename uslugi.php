<?php

namespace uslugi;

require WalidacjaLog.php;

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
    <script type="text/javascript" src="kalkulator.js"></script>
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
    <div class="uslugi">
        <span>Jeśli trawiłeś na tą strone to spójrz na usługi jakie jestem w stanie wykonać,
            być może jestem w stanie ci w czymś pomóc </span>
    </div>
    <section>
        <table class="tg">
            <tr>
                <th class="nagl">Lp.</th>
                <th class="nagl">Usługa</th>
                <th class="nagl">Opis</th>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=1"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=1"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=1"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=2"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=2"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=2"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=3"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=3"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=3"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=4"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=4"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=4"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=5"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=5"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=5"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=6"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=6"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=6"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=7"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=7"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=7"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
            <tr>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select LP From uslugi where LP=8"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["LP"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Usługa From uslugi where LP=8"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Usługa"];}	}$conn->close();?></td>
                <td class="wiersze"><?php $conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych"); $wynik = $conn->query("Select Opis From uslugi where LP=8"); if($wynik->num_rows > 0) {while($wiersz = $wynik->fetch_assoc()){echo $wiersz["Opis"];}	}$conn->close();?></td>
            </tr>
        </table>
        <p class="dopisek">W razie zdecydowania sie na którąkolwiek usługę proszę o kontakt poprzez telefon lub przez formularz*</p>
        <div class="cal">
            <h3>Oblicz Koszt Usługi</h3>
            <p><input type="checkbox" id="x">Posiadam kartę stałego klienta (-5%)</p>
            <p><input type="checkbox" id="y">Posiadam kod rabatowy (-10%)</p>
            <p>Podaj liczbę usługi jakiej potrzebujesz:<input type="number" id="z"></p>
            <button onclick="funkcja()">Oblicz</button>
            <p id="wynik">
            </p>
        </div>
        <?php
		    if(isset($_POST["id"])){
			$id = $_POST["id"];
			$imie = $_POST["imie"];
			$nazwisko = $_POST["nazwisko"];
			$telefon = $_POST["telefon"];
			$specjalizacja = $_POST["specjalizacja"];
			$temat = $_POST["temat"];
			$rodzaj = $_POST["rodzaj"];
			$typ = $_POST["typ"];
			$ogloszenie = $_POST["ogloszenie"];
			
			if(empty($id)||empty($imie)||empty($nazwisko)||empty($telefon)||empty($specjalizacja)||empty($temat)||empty($rodzaj)||empty($typ)||empty($ogloszenie)){
				echo "<p style=\"text-align:center; color:white;\">Wypełnij wszystkie pola ogłoszenia</p>";				
			}else{
				$conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych");
				$odp1 = $conn->query("INSERT INTO uzytkownik(id,imie,nazwisko,telefon,specjalizacja) VALUES ('$id','$imie','$nazwisko','$telefon','$specjalizacja')");
				$odp2 = $conn->query("INSERT INTO ogloszenie(id,imie,temat,ogloszenie) VALUES ('$id','$imie','$temat','$ogloszenie')");
				$odp3 = $conn->query("INSERT INTO typ(id,temat,rodzaj,typ) VALUES ('$id','$temat','$rodzaj','$typ')");
				
				if($odp1&&$odp2&&$odp3){
					echo "<p style=\"text-align:center; color:white;\">Dodano ogłoszenie</p>";	
				}else{
					echo "<p style=\"text-align:center; color:white;\">Coś poszło nie tak</p>";	
				}
				$conn->close();
			}
				
		}
		?>
        <div class="inputogloszenia">
            <h1>Wstaw nowe ogłoszenie</h1>
            <p>Proszę wypełniać tablice liczbami od najmniejszej do największej(bez powtórek)</p>
            <form method="POST" action="uslugi.php">
                <input name="id" type="number" placeholder="ID">
                <input name="imie" type="text" placeholder="Imię">
                <input name="nazwisko" type="text" placeholder="Nazwisko">
                <input name="telefon" type="number" placeholder="Numer Telefonu">
                <input name="specjalizacja" type="text" placeholder="Specjalizacja">
                <input name="temat" type="text" placeholder="Temat Ogłoszenia">
                <input name="rodzaj" type="text" placeholder="Rodzaj">
                <input name="typ" type="text" placeholder="Typ">
                <p><textarea name="ogloszenie" placeholder="Treść ogłoszenia"></textarea></p>
                <p><button name="submit">Zapisz</button>
                <p>
            </form>
        </div>
        <div class="ogloszenia">
            <h1>Tablica Ogłoszeń</h1>
            <?php
		$conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych");
		$wynik = $conn->query("Select u.id,u.imie,o.temat,o.ogloszenie From uzytkownik u left join ogloszenie o on (u.id=o.id) order by u.id");
		
		if($wynik->num_rows > 0) {
			echo "<table class=\"tg\">";
			while($wiersz = $wynik->fetch_assoc()){
				echo "<tr>";
			echo "<td>". $wiersz["id"] . "</td>";
			echo "<td>". $wiersz["imie"] . "</td>";
            echo "<td>". $wiersz["temat"] . "</td>";	
            echo "<td>". $wiersz["ogloszenie"] . "</td>";
                echo "</tr>";			
			}
            echo "</table>";			
		}else{
			echo "Brak aktywnych ogłoszeń";
		}
		$conn->close();
		?>
        </div>
        <div class="inputogloszenia">
            <?php
		    if(isset($_POST["idd"])){
			$idd = $_POST["idd"];	
			
			if(empty($idd)){
				echo "<p style=\"text-align:center; color:white;\">Wypełnij pole</p>";				
			}else{
				$conn = new mysqli("localhost", "root", "", "ogloszenia") or die("Błąd , nie polączono z bazą danych");
				$odp12 = $conn->query("DELETE FROM uzytkownik where ID='$idd'");
				$odp22 = $conn->query("DELETE FROM ogloszenie where ID='$idd'");
				$odp32 = $conn->query("DELETE FROM typ where ID='$idd'");
				
				if($odp12&&$odp22&&$odp32){
					echo "<p style=\"text-align:center; color:white;\">Usunięto ogłoszenie</p>";	
				}else{
					echo "<p style=\"text-align:center; color:white;\">Coś poszło nie tak</p>";	
				}
				$conn->close();
			}		
		}
		?>
            <p>Proszę wybrać numer ogłoszenia do usunięcia (które już jest nieaktywne)</p>
            <form method="POST" action="uslugi.php">
                <input name="idd" type="number" placeholder="ID">
                <p><button name="submit">Usuń ogłoszenie</button>
                <p>
            </form>
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
