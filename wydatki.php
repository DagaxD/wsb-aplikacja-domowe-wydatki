<?php
session_start();
if($_SESSION["user"] == null) {
	header("Location: login.html");
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
        <img class="image-wydatki" src='images/bg-06.png'></img>
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                
                <h2>Moje wydatki</h2>
                <p>Tu możesz zarządzać swoimi wydatkami</p>
            </div>
        </div>
        <br/>
		<div class="row">
			<div class="col-md-7 ">
                <h4>Zmienne wydatki z bieżącego miesiąca</h4>
                <p>Dodaj swoje wydatki </p>
                <input type="text" id="thisMonthOutcome" class="inputtext" placeholder="Nazwa"><input class="inputnumber" type="number" id="thisMonthOutcomeAmount" placeholder="Koszt"> <button id="thisMonthOutcomeButton" class="addbutton">+</button>
                <ul id="thisMonthOutcomes">
                      
                </ul>
                <br/>
                <h4>Przychody z bieżącego miesiąca</h4>
                <p>Dodaj swoje przychody </p>
                <input type="text" id="thisMonthIncome" class="inputtext" placeholder="Przychód"><input type="number" class="inputnumber" id="thisMonthIncomeAmount" placeholder="Kwota"> <button id="thisMonthIncomeButton" class="addbutton">+</button>
                <ul id="thisMonthIncomes">
                      
                </ul>


                <br/>
                <h4>Podsumowanie bieżącego miesiąca</h4><br/>
                <div class="row table-sum">
                <div class="col-md-6">
                    <h6>Suma przychodów:</h6>
                    <h6>Suma stałych wydatków:</h6>
                    <h6>Suma zmiennych wydatków:</h6>
                    <hr>
                    <h6>Pozostało:</h6>

                </div>
                <div class="col-md-6">
                    <h6 id="sumIncomes">0</h6>
                    <h6 id="sumAll">0</h6>
                    <h6 id="sumMonth">0</h6>
                    <hr>
                    <h6 id="theRest">0</h6>
                </div>
                </div>
			</div>
			<div class="col-md-4 right-table">
                <h4>Stałe wydatki</h4>
                <p>Dodaj swoje stałe miesięczne wydatki </p>
                <input type="text" id="newOutcome" placeholder="Nazwa"><input type="number" id="outcomeAmount" placeholder="Koszt"> <button id="addOutcome" class="addbutton">+</button>
				<ul id="allOutcomes">
                      
                </ul>
				
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