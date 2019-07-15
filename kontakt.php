<?php
session_start();
if($_SESSION["user"] == null) {
	header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Domowe wydatki - dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="scss/styles.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
        <div class="dropdown">
            <button class="icon dropbtn">
            <i class="fa fa-bars"></i>
            </button>
            <div class="dropdown-content">
                    <a href="profil.php">Profil</a>
                    <a href="onas.php">O nas</a>
                    <a href="logout.php">Wyloguj się</a>
            </div>
        </div>
        </a>
      </div>

    <div class="sidenav">
        <a href="dashboard.php"><i class="fas fa-home"></i>Start</a>
        <a href="wydatki.php"><i class="fas fa-hand-holding-usd"></i>Moje wydatki</a>
        <a href="ustawienia.php"><i class="fas fa-cogs"></i>Ustawienia</a>
        <a href="kontakt.php"><i class="fas fa-envelope"></i>Kontakt</a>
	</div>
	<div class="main">
		<img class="image-contact" src='images/bg-04.png'></img>
		<div class="row">
			<div class="col-md-4 ">
                Kontakt
                <p>Jeśli masz jakieś pytania - skontaktuj się z nami</p>
                <br/><br/>
                <h5>Dane kontaktowe:</h5><br/>
                <h6>Email: support@domowewydatki.pl</h6>
                <h6>Telefon: 123 456 789</h6>
			</div>
			<div class="col-md-8">
				
				
			</div>
		</div>
	</div>
    
	
    

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/v4-shims.js"></script>

</body>
</html>