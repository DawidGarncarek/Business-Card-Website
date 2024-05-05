<?php

namespace Rejestracja;

require WalidacjaLog.php;

require_once "config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Wpisz nazwę użytkownika";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Nazwa użytkownika może zawierać tylko litery, cyfry i podkreślenia.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Nazwa użytkownika już istnieje";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Coś poszło nie tak";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Wpisz hasło";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi zawierać 6 znaków";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła się różnią";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                header("location: logowanie.php");
            } else{
                echo "Coś poszło nie tak";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
<?php
function dni_mies($mies,$rok) {
 $dni = 31;
 while (!checkdate($mies, $dni, $rok)) $dni--;
return $dni;
}
function dzien_tyg_nr($mies,$rok) {
 $dzien = date("w", mktime(0,0,0,$mies,1,$rok));
return $dzien;
}
function dzien_tyg($nr) {
 $dzien = array(0 => "Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota");
return $dzien[$nr];
}
function miesiac_pl($mies) {
 $mies_pl = array(1=>"Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwieca", "Lipieca", "Sierpnia", "Wrzesienia", "Października", "Listopada", "Grudnia");
return $mies_pl[$mies];
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
	<style type="text/css">
        #kalendarz {width: 250px; color:white; font-family:arial; margin-left:auto; margin-right:auto; padding-top:30px; }
        #kalendarz p {text-align: left; padding-left:5px;}
        #kalendarz li {display: inline; padding:2px 5px; }
        #kalendarz .akt {color: #990000; font-weight: bold;}
        #kalendarz .hidden {visibility: hidden;}
    </style>
    <title>Rejestracja</title>
</head>
<body class="logowanie">
<section class="login">
        <h1>Rejestracja</h1>
		<?php 
        if(!empty($login_err)){
            echo  $login_err ;
        }        
        ?>
		<div class="wrap clearfix">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" placeholder="Nazwa użytkownika" class="loginput <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="logerror"><?php echo $username_err; ?></span>
                <input type="password" name="password" placeholder="Hasło" class="loginput <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="logerror"><?php echo $password_err; ?></span>
                <input type="password" name="confirm_password" placeholder="Powtórz hasło" class="loginput <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="logerror"><?php echo $confirm_password_err; ?></span>
				<button id="submit" name="submit">Zarejestruj się</button>
				<button id="submit" name="reset">Reset</button>
                <p class="logerror">Posiadzasz już konto? <a href="logowanie.php" class="logerror1">Zaloguj się</a>.</p>
        </form>
    </div>
	<div id="kalendarz">
        <?php echo '<p>'.dzien_tyg(date("w")).', '.date("d").' '.miesiac_pl(date("n")).' '.date("Y").'</p>'; ?>
            <ul><li>N&nbsp;</li> <li>Pn</li> <li>Wt</li> <li>Śr</li> <li>Cz</li> <li>Pt</li> <li>Sb</li></ul>
            <ul><?php for($i=0;$i<dzien_tyg_nr(date("n"),date("Y"));$i++) echo '<li class="hidden">00</li> '; for($i=1;$i<dni_mies(date("n"),date("Y")) +1;$i++) {
            if ($i<10) $i = '0'.$i;
            if ($i == date("d")) echo '<li class="akt">'.$i.'</li> '; else echo '<li>'.$i.'</li> ';}?></ul>
        </div>
</section>    
</body>
</html>