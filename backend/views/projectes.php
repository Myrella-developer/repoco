<div class="container-fluid">
    <h2 class="text-center mt-5">Projectes</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" data-bs-toggle="modal" data-bs-target="#afegir">AFEGIR</label>

    <div class="modal fade" id="afegir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelDigital">afegir</h5>
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
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="projecte in projectes">
            <div class="card-body">
                <img ng-src="../img/{{projecte.url}}" width="200"/>
                <h5 class="card-title">{{projecte.nom}}</h5>
                <p class="card-text">{{projecte.descripcio}} </p>
                <p class="card-text">{{projecte.dataInici}} - {{projecte.dataFi}}</p>
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