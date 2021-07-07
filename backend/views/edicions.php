<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Les edicions de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary" ng-click="editar('-1')"></i>
    <label class="ms-1 fw-bold">AFEGIR</label>

    <div class="row">
        <div class="card cardGestor-ESP m-5" style="width: 18rem;" ng-repeat="edicio in edicions">
            <div class="card-body">
                <h5 class="card-title">{{edicio.dataInici}} - {{edicio.dataFi}}</h5>
                <img src="img/default.png" class="w-75" ng-if="!edicio.url"/>
                <img ng-src="img/edicio.url" class="w-75" ng-if="edicio.url"/>
                <p class="card-text">{{edicio.nom}}</p>
                <div class="icon-block">
                    <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                    <i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(projecte.idProjecte)"></i>
				</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdicio">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edicions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="edicions">
                        <div class="mb-2">
                            <select ng-model="sel">
                                <option value="-1" ng-model="sel">--Selecciona especialitat</option>
                                <option ng-model="sel" ng-repeat="e in especialitats">{{e.nom}}</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Data Inici</label>
                            <input type="date" ng-model="dataInici">
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Data Fi</label>
                            <input type="date" ng-model="dataFi">
                        </div>
                        <div class="mb-2">
                            <input type="file" onchange="angular.element(this).scope().getFileDetails(this)"><br/>
                            <img ng-model="url" width="250" height="150" src="./img/{{url}}" class="mt-2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
                    <button type="button" class="btn btn-primary" ng-click="guardar()">Guardar canvis</button>
                </div>
            </div>
        </div>
    </div>
    
    <button class="btn btn-warning mb-5" ng-click="irProjectes()">Gestionar projectes</button>
    
    <?php 
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Totes les edicions</h2>

    <?php endif; ?>
</div>