<div class="">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="titolGestor" ng-if="projectes.length > 0">Els projectes de la teva casa</h2>
    <h2 class="titolGestor" ng-if="projectes.length == 0">No hi ha projectes, afegeix un!</h2>

    <div class="row cols-12"><button class="btnAfegir fas fa-plus-circle" ng-click="editar('-1')"> AFEGIR</button></div>
    <div class="row ms-2">
        <div class="col-md-3" ng-repeat="projecte in projectes">
            <div class="card cardGestor-ESP mx-auto mt-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="../multimedia/img/projectes/{{projecte.url}}" class="card-img-top imgCard-Gestor"/>
                    <span class="card-title titolCard">{{projecte.titol}}</span>
                    <p class="card-text">{{projecte.descripcio}}</p>
                    <div class="icon-block">
                        <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"><i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(projecte.idProjecte)"></i></div>
                    <div class="col-9"><a class="btn cardButton" href="#/multimedia/{{projecte.idProjecte}}">Gestionar multimedia</a></div>
                </div>
            </div>
        </div>    
    </div>

    <div class="modal fade" id="modalProjecte">
        <div class="modal-dialog modal-projecte">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title labelModal">Projectes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="projectes" enctype="multipart/form-data">
                        <div class="mb-4" ng-show="showSelect">
                            <select class="form-control labelModal" ng-model="selEsp" ng-change="onChange()">
                                <option value="-1">--Selecciona especialitat a afegir--</option>
                                <option ng-repeat="esp in inexistents" value="{{esp.idEdicio}}">{{esp.nom}}</option>
                            </select>
                         
                            <hr/>
                            <span ng-repeat="edicio in existents" class="mx-2"><span class="badge bg-info text-dark">{{edicio.nom}}</span><i class="bi bi-x" ng-click="onDelete(edicio.idEdicio)"></i></span>
                        </div>
                        
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Titol del projecte - CAT</label>
                            <input type="text" class="form-control" ng-model="titol">
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Titulo del proyecto - ESP</label>
                            <input type="text" class="form-control" ng-model="titulo">
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripció del projecte - CAT</label>
                            <textarea rows="4" class="form-control" ng-model="descripcio">{{descripcio}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripción del proyecto - ESP</label>
                            <textarea rows="4" class="form-control" ng-model="descripcion">{{descripcion}}</textarea>
                        </div>
                        <div class="mb-2">
                            <h2 class="labelModal">Imatge del projecte</h2>
                            <img src="../multimedia/img/projectes/{{url}}" width="100"/><br/>
                            <input type="file" onchange="angular.element(this).scope().getFileDetails(this)">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btnModal" data-bs-dismiss="modal" ng-click="guardar()">Dessar canvis</button>
                </div>
            </div>
        </div>
    </div>

    <?php endif;?>
</div>