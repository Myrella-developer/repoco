<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Els projectes de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" ng-click="editar('-1')">AFEGIR</label>
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="projecte in projectes">
            <div class="card-body">
                <img src="../img/default.png">
                <!--<img ng-src="../img/{{projecte.url}}" width="200"/>-->
                <h5 class="card-title">{{projecte.titol}}</h5>
                <p class="card-text">{{projecte.descripcio}}</p>
                <button class="btn btn-primary" ng-click="editar($index)">Modificar</button>
                <button class="btn btn-danger" ng-click="eliminar(projecte.idProjecte)">Eliminar</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalProjecte">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Projectes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="projectes">
                        <div class="mb-2">
                            <select ng-model="sel">
                                <option value="-1" ng-model="sel">--Selecciona un projecte</option>
                                <option ng-repeat="e in especialitats" ng-value="e.idEsp">{{e.nom}}</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripció del projecte</label>
                            <textarea class="form-control" id="message-text" ng-model="descripcio">{{descripcio}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripción del proyecto</label>
                            <textarea class="form-control" id="message-text" ng-model="descripcion">{{descripcion}}</textarea>
                        </div>
                        <div class="mb-2">
                            <input type="file" onchange="angular.element(this).scope().getFileDetails(this)">
                        </div>
                    </form>
                    <h2>Imatges del projecte</h2>
                    <div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
                    <button type="button" class="btn btn-primary" ng-click="guardar()">Guardar canvis</button>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-warning mb-5" ng-click="irMultimedia()">Gestionar multimedia</button>
    
    <?php 
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Tots els projectes</h2>

    <?php endif; ?>
</div>