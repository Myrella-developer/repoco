<div class="">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Els projectes de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" ng-click="editar('-1')">AFEGIR</label>
    
    <div class="row">
        <div class="card cardGestor-ESP m-5" style="width: 18rem;" ng-repeat="projecte in projectes">
            <div class="card-body">
                <img src="./img/{{projecte.url}}" width="200"/>
                <h5 class="card-title">{{projecte.titol}}</h5>
                <p class="card-text">{{projecte.descripcio}}</p>
                <div class="icon-block">
                    <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                    <i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(projecte.idProjecte)"></i>
				</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalProjecte">
        <div class="modal-dialog modal-projecte">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Projectes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="projectes" enctype="multipart/form-data">
                        <div class="mb-2">
                            <select ng-model="sel" class="form-control">
                                <option value="-1" ng-model="sel">--Selecciona una edicio</option>
                                <option ng-model="sel" ng-repeat="e in especialitats">{{e.nom}} * {{e.dataInici}} * {{e.dataFi}}</option>
                            </select>
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
                            <img src="./img/{{url}}" width="100"/><br/>
                            <input type="file" multiple onchange="angular.element(this).scope().getFileDetails(this)">
                        
                            <button class="btn btn-warning mt-2" ng-click="mostrarDesc()">Descripcio</button>
    
                            <div class="mb-2" ng-show="showDesc">
                                <label for="message-text" class="col-form-label">Descripcio multimedia</label>
                                <input type="text" class="form-control" ng-model="descripcioMulti">
                            
                                <label for="message-text" class="col-form-label">Descripción multimedia</label>
                                <input type="text" class="form-control" ng-model="descripcionMulti">
                            </div>
                        </div>
                    </form>

                    <div class="mt-3">
                        <h2>Imatges del projecte</h2>
                        <!--
                        <div ng-repeat="u in urlMulti" class="d-inline-flex">
                            <img src="./img/{{u.url}}" width="100"/>
                            <input type="file" multiple onchange="angular.element(this).scope().getFileDetails(this)">
                            <button class="btn btn-warning mt-2" ng-click="mostrarDesc()">Descripcio</button>
                            <div class="mb-2" ng-show="showDesc">
                                <label for="message-text" class="col-form-label">Descripcio multimedia</label>
                                <input type="text" class="form-control" ng-model="descripcioMulti">
                            
                                <label for="message-text" class="col-form-label">Descripción multimedia</label>
                                <input type="text" class="form-control" ng-model="descripcionMulti">
                            </div>
                        </div>-->
                        
                        <!--
                        <img ng-if="m.tipo == 'i'" />
                        <video ng-if="m.tipo == 'v'" width="250" height="150" controls>
                            <source src="..." type="video/mp4">
                        </video><br/>
                        <audio ng-if="m.tipo == 's'" width="250" height="150" controls>
                            <source src="..." type="audio/mp3">
                        </audio><br/>-->
                    </div>
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

    <h2>Tots els projectes</h2>

    <?php endif; ?>
</div>