<div class="">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="titolGestor mt-5" ng-if="multimedia.length > 0">La multimedia de la teva casa</h2>
    <h2 class="titolGestor mt-5" ng-if="multimedia.length == 0">No hi ha archius</h2>

    <div class="row cols-12"><button class="btnAfegir fas fa-plus-circle" ng-click="editar('-1')"> AFEGIR</button></div>
    <div class="row ms-2">
        <div class="col-md-3" ng-repeat="m in multimedia">
            <div class="card cardGestor-ESP mx-auto mt-3" style="width: 18rem;">
                <div class="card-body">
                    <img ng-src="../multimedia/img/projectes/{{m.url}}" class="card-img-top imgCard-Gestor" ng-if="m.tipo == 'i' "/>

                    <iframe ng-src="{{m.url| trustedVideo}}" class="w-100" height="220" ng-if="m.tipo == 'v' "
                    ></iframe> 
                    
                    <audio controls ng-if="m.tipo == 's' " class="w-100" src="{{m.url| trusted}}"></audio>
                    
                    <h5 class="card-title mt-2 text-center">{{m.url}}</h5>
                    <p class="card-text text-center">{{m.descripcio}}</p>
                    <div class="icon-block">
                        <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                        <i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(m.idMult)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalMultimedia">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title labelModal">Multimedia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="multimedia" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripció - CAT</label>
                            <textarea rows="4" class="form-control" ng-model="descripcio">{{descripcio}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripción - ESP</label>
                            <textarea rows="4" class="form-control" ng-model="descripcion">{{descripcion}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label class="labelModal">Tipus de archiu</label>

                            <div ng-click='newValue(value)'>
                                <input type="radio" id="imatge" name="archiu" ng-model="value" value="imatge" ng-checked="checkImagen">
                                <label for="imatge">Imatge</label><br/>

                                <input type="radio" id="video" name="archiu" ng-model="value" value="video" ng-checked="checkVideo">
                                <label for="video">Video</label><br/>
                                
                                <input type="radio" id="so" name="archiu" ng-model="value" value="so" ng-checked="checkSonido">
                                <label for="so">So</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <h2>Archiu del projecte</h2>
                            <img src="../multimedia/img/projectes/{{url}}" width="320" height="240" ng-show="showImg"/><br/>

                            <div ng-show="showVideo">
                                <iframe ng-src="{{url| trustedVideo}}" width="320" height="240"
                                ></iframe> 
                               
                                <input type="text" placeholder="Enllaç al video..." ng-model="url">
                            </div><br/>

                            <audio controls class="w-100" src="{{url| trusted}}" ng-show="showSound"></audio><br/>

                            <input ng-show="showExaminar" type="file" onchange="angular.element(this).scope().getFileDetails(this)">
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