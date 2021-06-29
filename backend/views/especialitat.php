<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Especialitats de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary" ng-click="editar('-1')"></i>
    <label class="ms-1 fw-bold">AFEGIR</label>

    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="especialitat in especialitats">
            <div class="card-body">
                <p class="card-title">{{especialitat.nom}}</p>
                <p class="card-text">{{especialitat.nombre}} </p>
                <p class="card-text">{{especialitat.descripcio}} </p>
                <p class="card-text">{{especialitat.descripcion}} </p><br>
                <a class="btn btn-primary" ng-click="editar($index)">Modificar</a><br><br>
            </div>
        </div> 
    </div>       
            <div class="modal fade" id="modalEsp" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Especialitat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form ng-model="especialitats">
                                <select class="form-select mb-4" ng-model="selCasa">
                                    <option ng-repeat="case in cases" ng-value="case.idcasa" ng-selected="case.nom">{{case.nom}}</option>
                                </select>
                                <div class="mb-2">
                                    <label for="message-text" class="col-form-label">Nom Especialitat</label>
                                    <textarea class="form-control" id="message-text" ng-model="nom">{{nom}}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="message-text" class="col-form-label">Nombre Especialitat</label>
                                    <textarea class="form-control" id="message-text" ng-model="nombre">{{nombre}}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="message-text" class="col-form-label">Descripcio Especialitat</label>
                                    <textarea class="form-control" id="message-text" ng-model="descripcio">{{descripcio}}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="message-text" class="col-form-label">Descripción Especialitat</label>
                                    <textarea class="form-control" id="message-text" ng-model="descripcion">{{descripcion}}</textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" ng-click="guardar()">Dessar canvis</button>
                        </div>
                    </div>
                </div>
            </div>
        
    
    <?php 
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "d") :
    ?>

    <h2>Tots els archius</h2>

    <?php endif; ?>
</div>

