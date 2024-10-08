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
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/a861c3e143.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
		<script src="js/app.js"></script>
		<script src="controllers/controllers.js"></script>
	</head>
	<body>
	<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  			<div class="container-fluid">

	    		<a class="navbar-brand" href="#">
	    		</a>
	    		
	    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	      			
	      			<span class="navbar-toggler-icon"></span>
	    		
	    		</button>
	    		
	    		<div class="collapse navbar-collapse" id="navbarText">
		      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        		<li class="nav-item">

		          			<a class="nav-link" ng-href="#/professors">Professors</a>
		        		
		        		</li>

		        		<li class="nav-item">
		        			
		        			<a class="nav-link" ng-href="#/">Principal</a>

		        		</li>

		        		<li class="nav-item">

		        			<a class="nav-link" ng-href="#/especialitats/">Especialitats</a>

		        		</li>

		        		<li class="nav-item">
		        			
		        			<a class="nav-link" ng-href="#/cases">Cases d'Oficis</a>

		        		</li>

		        		<li class="nav-item">
		        			
		        			<a class="nav-link" ng-href="#/districtes/">Districtes</a>

		        		</li>
		      		</ul>
		      		<span class="navbar-text" id="tancar" ng-click="tancar()">Tancar sessió</span>

	    		</div>
  			
  			</div>

		</nav>

       		 <!-- <header>
        		<div class="row menu">
        			<div class="col p-0">
        				<nav id="navCasa" class="navbar navbar-expand-md navbar-light">
						    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
						      <span class="navbar-toggler-icon"></span>
						    </button>
						    <div class="collapse navbar-collapse"  id="menuPrincipal">
						      <ul class="navbar-nav mb-2 mb-lg-0">
						        <li class="nav-item">
						          <a class="nav-link active fw-bold" aria-current="page" ng-href="#/home">{{idioma=="cat"?inici:inicio}}</a>
						        </li>
						        <li class="nav-item" ng-repeat="casa in datosCasas">
						          <a class="nav-link" href="#/cases/{{casa.idcasa}}">{{idioma=="cat"?casa.nom:casa.nombre}}</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" ng-href="#/contacte">{{idioma=="cat"?contacte:contacto}}</a>
						        </li>   
						      </ul>				
						    </div>
						</nav>
        			</div>
        		</div>
        	</header>
		</div>	
		<div class="row cols-12"><button class="btnTancar fa fa-sign-out fa-5" ng-click="tancar()"> Tancar</button></div> -->
		<div data-ng-view="row"></div>
		
        <footer>

		</footer>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>