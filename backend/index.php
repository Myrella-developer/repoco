<?php
    session_start();
    if(!isset($_SESSION['login'])) header('Location: ../');
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
	        			<span><img src="img/world.png" style="width: 25px"></span><span ng-model="idioma">Català</span>
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
						<span class="login"><a ng-href="#/login" target="_blank">Espai personal</a></span>
        			</div>
        		</div>
        		<div class="row menu">
        			<div class="col p-0"><img src="img/Logo Basa.jpg"></div>
        			<div class="col p-0">
        				<nav class="navbar navbar-expand-lg navbar-light">
						    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
						      <span class="navbar-toggler-icon"></span>
						    </button>
						    <div class="collapse navbar-collapse"  id="menuPrincipal">
						      <ul class="navbar-nav mb-2 mb-lg-0">
						        <li class="nav-item">
						          <a class="nav-link active fw-bold" aria-current="page" ng-href="#/home">Inici</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link"  ng-href="#/barrisdigitals">Barris Digitals</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link"ng-href="#/barrissostenibles">Barris sostenibles</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" ng-href="#/espectacleenviu">Espectacle en viu</a>
						        </li>  
						        <li class="nav-item">
						          <a class="nav-link" ng-href="#/contacte">Contacte</a>
						        </li>     
						      </ul>				
						    </div>
						</nav>
        			</div>
        		</div>
        	</header>
    	</div>

        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <a class="navbar-brand text-center ms-5 text-white">Gestionar dades</a>    
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <button class="btn btn-warning me-2" ng-click="tancar()">Tancar sesio</button>
                
                    <a ng-if="tipo == 'a'" class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar home</a>
                    <a class="nav-link active text-white ms-5 hoverMenu" href="#/cases">Gestionar cases</a> 
                    <a class="nav-link active text-white ms-5 hoverMenu" href="#/directors">Gestionar directors</a>    
                    <a class="nav-link active text-white ms-5 hoverMenu" href="#/ediciones">Gestionar edicions</a>    
                    <a class="nav-link active text-white ms-5 hoverMenu" href="#/especialitats">Gestionar especialitats</a>    
                    <a class="nav-link active text-white ms-5 hoverMenu" ng-href="#/projectes">Gestionar projectes</a>    
                </div>
            </div>
        </nav>
		<div data-ng-view=""></div>
		
        <footer>

		</footer>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>