<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Multimedia dels projectes de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary" ng-click="editar('-1')"></i>
    <label class="ms-1 fw-bold">AFEGIR</label>
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="m in multimedia">
            <div class="card-body">
                <img ng-src="../img/{{projecte.url}}" width="200"/>
                <h5 class="card-title">{{m.url}}</h5>
                <img class="w-75" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9E-EVCmmhLN51ydEr1uFEgcur-yGtBNOaT83DaRj4-O_eAYWW8gaGsLad35PJTVPD8l0&usqp=CAU">
                <p class="card-text">{{m.titol}}</p>
                <p class="card-text">{{m.descripcio}}</p>
                <b ng-if="m.tipo == 'i'">Imatge</b>
                <b ng-if="m.tipo == 'v'">Video</b>
                <b ng-if="m.tipo == 's'">So</b>
                <br/>
                <button class="btn btn-primary" ng-click="editar($index)">Modificar</button>
                <button class="btn btn-danger" ng-click="eliminar(projecte.idProjecte)">Eliminar</button>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalMultimedia">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Multimedia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="multimedia">
                        <div class="mb-2">
                            <select ng-model="sel">
                                <option value="-1" ng-model="sel">--Selecciona un projecte</option>
                                <option ng-repeat="p in projectes" ng-value="p.titol">{{p.titol}}</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripció de multimedia</label>
                            <textarea class="form-control" id="message-text" ng-model="descripcio">{{descripcio}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripción de multimedia</label>
                            <textarea class="form-control" id="message-text" ng-model="descripcion">{{descripcion}}</textarea>
                        </div>
                        <div class="mb-2">
                            <input type="file" onchange="angular.element(this).scope().getFileDetails(this)">
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

    <?php 
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Tots els archius</h2>

    <?php endif; ?>
</div>
