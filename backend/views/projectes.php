<div class="">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="titolGestor">Els projectes de la teva casa</h2>


    <div class="row cols-12"><button class="btnAfegir fas fa-plus-circle" ng-click="editar('-1')"> AFEGIR</button></div>
    <div class="row">
        <div class="card cardGestor-ESP m-5" style="width: 18rem;" ng-repeat="projecte in projectes">
            <div class="card-body">
                <img src="../multimedia/img/projectes/{{projecte.url}}" class="w-100"/>
                <h5 class="card-title mt-2">{{projecte.titol}}</h5>
                <p class="card-text text-center">{{projecte.descripcio}}</p>
                <div class="icon-block">
                    <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                    <i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(projecte.idProjecte)"></i>
				</div>
            </div>
            <a class="btn cardButton" ng-href="http://localhost/repoco/backend/#/multimedia/{{projecte.idProjecte}}">Gestionar multimedia</a>
        </div>
    </div>

    <div class="modal fade" id="modalProjecte">
        <div class="modal-dialog modal-projecte">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title">Projectes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="projectes" enctype="multipart/form-data">
                        <div class="mb-4">
                            <select class="form-control" ng-model="selEsp" ng-change="onChange()">
                                <option value="-1">--Selecciona especialitat a afegir</option>
                                <option ng-repeat="esp in inexistents" value="{{esp.idEdicio}}">{{esp.nom}}</option>
                            </select>
                         
                            <hr/>
                            <span ng-repeat="edicio in existents" class="mx-2"><span class="badge bg-info text-dark">{{edicio.nom}}</span><i class="bi bi-x" ng-click="onDelete(edicio.idEdicio)"></i></span>
                        </div>
                        
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Titol del projecte</label>
                            <input type="text" class="form-control" ng-model="titol">
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Titulo del proyecto</label>
                            <input type="text" class="form-control" ng-model="titulo">
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripció del projecte</label>
                            <textarea rows="4" class="form-control" ng-model="descripcio">{{descripcio}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripción del proyecto</label>
                            <textarea rows="4" class="form-control" ng-model="descripcion">{{descripcion}}</textarea>
                        </div>
                        <div class="mb-2">
                            <h2>Imatge del projecte</h2>
                            <img src="../multimedia/img/projectes/{{url}}" width="100"/><br/>
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
       
        if(isset($_SESSION['login']['tipus']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Tots els projectes</h2>

    <?php endif; endif;?>
</div>