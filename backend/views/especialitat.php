<div class="mb-5">

<?php
	session_start();
	if (!isset($_SESSION['login']['idDir'])) header("location: ../");
?>
    <h2 class="titolGestor text-center">Especialitats de la teva casa</h2> 
    <div class="row cols-12"><button class="btnAfegir fas fa-plus-circle" ng-click="editar('-1')"> AFEGIR</button></div>
    <div class="row ms-2">
        <div class="col-md-3" ng-repeat="especialitat in especialitats">
        <div class="card cardGestor-ESP mx-auto mt-3" style="width: 18rem;">
				    <div class="card-content text-center">
					    <h4 class="titolCard">{{especialitat.nom}}</h4>
                        <p class="card-text">{{especialitat.descripcio}}</p>
					    <div class="icon-block">
                            <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
					    </div>
                    </div> 
                <a class="btn cardButton" ng-href="http://localhost/repoco/backend/#/edicions/{{especialitat.idEsp}}">Gestionar edicions</a>    
            </div>
        </div>    
    </div>
    <div class="modal fade" id="modalEsp" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h3 class="modal-title labelModal" id="labelDigital">Especialitat</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="especialitats">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nom Especialitat - CAT</label>
                            <input type="text" class="form-control" ng-model="nom"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nombre Especialitat - ESP</label>
                            <input type="text" class="form-control" ng-model="nombre"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripció Especialitat - CAT</label>
                            <input type="text" class="form-control"  ng-model="descripcio"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripción Especialitat - ESP</label>
                            <input type="text" class="form-control"  ng-model="descripcion"></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btnModal" data-bs-dismiss="modal" ng-click="guardar()">Dessar canvis</button>
                </div>
            </div>
        </div>
    </div>
<?php 
     if(isset($_SESSION['login']['tipus']) && $_SESSION['login']['tipus'] == "d") :
?>
<h2>Tots els archius</h2>
<?php endif; ?>
</div>

