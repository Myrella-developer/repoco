<div class="mb-5">
<?php
	session_start();
	if (!isset($_SESSION['login']['idDir'])) header("location: ../");
?>
     <div class="row ms-2">    
        <div class="col-md-3" ng-repeat="casa in cases">
            <div class="card cardGestor-ESP mx-auto mt-3" style="width: 18rem;">
            <div class="card-body">
				<img src="../multimedia/img/casas/{{casa.url}}" class="card-img-top imgCard-Gestor" alt="cases" title="{{casa.descripcio}}"/>                      
                    <span class="card-title">{{casa.nom}}</span><br>
                    <p class="card-text">{{casa.descripcio|limitTo:25:0}}</p>
					<div class="icon-block">
                        <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
					</div>
                <a class="btn cardButton" href="#/especialitats/{{casa.idcasa}}">Gestionar especialitats</a>
                <i class="fa fa-trash" aria-hidden="true" ng-click="eliminar(m.idMult)"></i>     
            </div>     
			</div>   
        </div>        
    </div>    
    <div class="modal fade" id="modalCases" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h3 class="modal-title labelModal" id="labelDigital">CASES D'OFICIS</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="especialitats">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nom Case - CAT</label>
                            <input type="text" class="form-control" ng-model="nom"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nombre Casa - ESP</label>
                            <input type="text" class="form-control" ng-model="nombre"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripció Case - ESP</label>
                            <textarea rows="4" class="form-control" ng-model="descripcio"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripción Casa - ESP</label>
                            <textarea rows="4" class="form-control" ng-model="descripcion"></textarea>
                        </div>
                        <div class="mb-2">
                          <label for="upload" class="col-form-label labelModal ">Penjar una imatge</label>
                          <input type="file" id="upload" multiple="true"></input>
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