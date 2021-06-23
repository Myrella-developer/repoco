<?php
    session_start();
    if(!isset($_SESSION['login'])) header('Location: ../#');
?>
<!DOCTYPE html>
	<html data-ng-app="backend" ng-controller="IndexController" >
	<head>
		<meta charset="utf-8">
		<title>Cases d'oficis</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="icon"> -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<script src="https://kit.fontawesome.com/a861c3e143.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
		<script src="js/app.js"></script>
		<script src="controllers/controllers.js"></script>
	</head>
	<body>

		<div class="container-fluid">
       		 <header>
        		<div class="row row-cols-3 brandLogo">
	        		<div class="col text-start p-0 ">
	        			<a href="https://www.barcelona.cat/ca/" target="_blank" class="fw-bold">www.barcelona.cat</a>
	        		</div>
	        		<div class="col text-center p-0">
	        			<!-- <span><img src="img/world.png" style="width: 25px"></span><span ng-model="idioma">Català</span> -->
	        		</div>
	        		<div class="col text-end p-0"><img src="img/logo.svg"></div>
        		</div>
        		<div class="row filaGris">
        			<div class="col text-end brandIcons">
        				<a href="https://www.instagram.com/barcelonactiva/" target="_blank"><i class="bi bi-instagram"></i></a>
        				<a href="https://twitter.com/barcelonactiva" target="_blank"><i class="bi bi-twitter"></i></a>
        				<a href="https://www.linkedin.com/company/barcelona-activa/" target="_blank"><i class="bi bi-linkedin"></i></a>
        				<a href="https://www.facebook.com/barcelonactiva/" target="_blank"><i class="bi bi-facebook"></i></a>
						<a href="https://www.youtube.com/user/videosbarcelonactiva" target="_blank"><i class="bi bi-youtube"></i></a>
						<a href="https://www.slideshare.net/barcelonactiva" target="_blank"><i class="fab fa-slideshare"></i></a>
        			</div>
        		</div>
        	</header>
    	</div>

    	

    	<button ng-click="tancar()">Tancar</button>

		<div data-ng-view=""></div>
		
        <footer>

		</footer>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>