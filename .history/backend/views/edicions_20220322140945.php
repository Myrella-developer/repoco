<div class="">
    <?php 
        session_start();
        if(!isset($_SESSION['login'])) header('Location: ../#');
        if(isset($_SESSION['login']['idDir'])) :
    ?>

    <h2 class="titolGestor">Les edicions de la teva Especialitat</h2>

    <div class="row cols-12"><button class="btnAfegir fas fa-plus-circle" ng-click="editar('-1')"> AFEGIR</button></div>

    <div class="row ms-2">
        <div class="col-md-3"  ng-repeat="edicio in edicions">
            <div class="card cardGestor-ESP mx-auto mt-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="../multimedia/img/noimatge.png" class="card-img-top imgCard-Gestor" ng-if="edicio.url == '' "/>
                    <img src="../multimedia/img/edicions/{{edicio.url}}" class="card-img-top imgCard-Gestor" ng-if="edicio.url !== '' "/>
                    <p class="card-text">{{edicio.nom}}</p>
                    <span class="card-title">{{edicio.dataInici}} - {{edicio.dataFi}}</span>
                    <div class="icon-block">
                        <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index, edicio.idEdicio)"></i>
                    </div>
                </div>
                <a class="btn cardButton" href="#/projectes/21/2020-12-31">Gestionar projectes</a>
                </div>
            </div>
        </div>    
    </div>

    <div class="modal fade" id="modalEdicio">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title labelModal">Edicions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="edicions">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Data Inici</label>
                            <input type="date" class="edFecha" ng-model="dataInici" ng-change="cambiDataInici(dataInici)">
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Data Fi</label>
                            <input type="date" class="edFecha" ng-model="dataFi" ng-change="cambiDataFi(dataFi)">
                        </div>
                        <div class="mb-2">
                            <input type="file" onchange="angular.element(this).scope().getFileDetails(this)"><br/>
                            <img src="../multimedia/img/edicions/{{edicionurl}}" width="250" height="150" class="mt-2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btnModal" ng-click="guardar()">Guardar canvis</button>
                </div>
            </div>
        </div>
    </div>

    <?php endif;?>
</div>