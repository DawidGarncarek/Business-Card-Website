<?php

namespace Logowanie2;

require WalidacjaLog.php;

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Wprowadź nazwe.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Wprowadź hasło.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: index.php");
                        } else{
                            $login_err = "Niepoprawne hasło lub nazwa użytkownika.";
                        }
                    }
                } else{
                    $login_err = "Niepoprawne hasło lub nazwa użytkownika.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
 $mies_pl = array(1=>"Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwieca", "Lipieca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia");
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
    <title>Logowanie</title>
	<style type="text/css">
        #kalendarz {width: 250px; color:white; font-family:arial; margin-left:auto; margin-right:auto; padding-top:30px; }
        #kalendarz p {text-align: left; padding-left:5px;}
        #kalendarz li {display: inline; padding:2px 5px; }
        #kalendarz .akt {color: #990000; font-weight: bold;}
        #kalendarz .hidden {visibility: hidden;}
    </style>
</head>
<body class="logowanie">
<section class="login">
        <h1>Logowanie</h1>
		<?php 
        if(!empty($login_err)){
            echo  $login_err ;
        }        
        ?>
        <div class="wrap clearfix">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" id="name" placeholder="Login" class="loginput <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" >
				<span class="logerror"><?php echo $username_err; ?></span>
				<input type="password" name="password" id="password" placeholder="Hasło" class="loginput <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" >
				<span class="logerror"><?php echo $password_err; ?></span>
                <button id="submit" name="submit">Zaloguj się</button>
				<p class="logerror">Nie posiadasz konta? <a href="register.php" class="logerror1">Zarejestruj się</a>.</p>
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

