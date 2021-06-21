carga views Gestor Especialitats


<div class="container-fluid headerPrincipal">
	<div class="row ">
		<div class="col-12">
			<h1 class="titolPrincipal text-center">Llistat Especialitat</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12 text-center">
			<button class="button-refresca text-wrap" ng-repeat="case in cases"  ng-click="refrescaEsp(case.idcasa)">{{case.nom}}</button>
		</div>
	</div>
</div> 
<div class="row">
        <div class="card cardGestor m-5" style="width: 20rem;" ng-repeat="especialitat in especialitats">
            <div class="card-body">
                <img width="50%" ng-src="backend/../img/{{especialitat.url}}"/>
                <h5 class="card-title">{{especialitat[1]}}</h5>
                <p class="card-text">{{especialitat.nom}} </p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gestor">Modificar</button>
            </div>
        </div>

        <div class="modal fade" id="gestor" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelDigital">Titulo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Dessar canvis</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>