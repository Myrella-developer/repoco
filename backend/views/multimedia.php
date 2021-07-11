<div class="">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="titolGestor mt-5">La multimedia de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" ng-click="editar('-1')">AFEGIR</label>
    
    <div class="row">
        <div class="card cardGestor-ESP m-5" style="width: 18rem;" ng-repeat="m in multimedia">
            <div class="card-body">
                <img ng-src="../../multimedia/img/projectes/{{m.url}}" width="200"/>
                <h5 class="card-title">{{m.url}}</h5>
                <p class="card-text">{{m.descripcio}}</p>
                <div class="icon-block">
                    <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                    <i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(m.idMult)"></i>
				</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalMultimedia">
        <div class="modal-dialog modal-projecte">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title">Multimedia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="multimedia" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripció</label>
                            <textarea rows="4" class="form-control" ng-model="descripcio">{{descripcio}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Descripción</label>
                            <textarea rows="4" class="form-control" ng-model="descripcion">{{descripcion}}</textarea>
                        </div>
                        <div class="mb-2">
                            <h2>Imatge del projecte</h2>
                            <img src="../../multimedia/img/projectes/{{url}}" width="100"/><br/>
                            <input type="file" multiple onchange="angular.element(this).scope().getFileDetails(this)">
                        </div>
                    </form>

                    <div class="mt-3">
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
       
        if(isset($_SESSION['login']['tipus']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Tota la multimedia</h2>

    <?php endif; endif;?>
</div>