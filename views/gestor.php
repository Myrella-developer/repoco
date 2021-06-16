<div class="container-fluid text-center">
    <h3 class="mt-5">Hola {{nombre}}, aquest es el teu espai personal</h3>
    <h5 class="mt-5 mb-5" ng-if="tipo == 'a' ">Fes click a un boto per gestionar les dades de les cases d'oficis</h5>
    <h5 class="mt-5 mb-5" ng-if="tipo == 'd' ">Fes click a un boto per gestionar les dades de la teva casa</h5>

    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <a class="navbar-brand text-center ms-5 text-white">Gestionar dades</a>    
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <button ng-controller="LoginController" class="btn btn-warning" ng-click="tancar()">Tancar sesio</button>
                <a ng-if="tipo == 'd'" class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar home</a>
                <a class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar cases</a>    
                <a class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar directors</a>    
                <a class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar edicions</a>    
                <a class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar especialitats</a>    
                <a class="nav-link active text-white ms-5 hoverMenu" href="#">Gestionar projectes</a>    
            </div>
        </div>
    </nav>
</div>