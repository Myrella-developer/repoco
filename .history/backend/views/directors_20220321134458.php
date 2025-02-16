<div class="">
*/<?php
	session_start();
	if (!isset($_SESSION['login']['idDir'])) header("location: ../");
?>
    <h2 class="titolGestor">Gestionar Directors</h2>
    <?php 
    if(isset($_SESSION['login']['tipus']) && $_SESSION['login']['tipus'] == "d") :?>
    <div class="row cols-12">
        <button class="btnAfegir fas fa-plus-circle" ng-click="editar('-1')"> AFEGIR</button>
    </div>
    <?php endif; ?>

       <div class="row ms-2">    
            <div class="col-md-3" ng-repeat="director in directors">
			    <div class="card cardGestor-ESP mx-auto mt-3" style="width: 18rem;">
				    <div class="card-content text-center">
					    <h3>{{director.nom}} {{director.cog1}}</h3>
                            <span>Director/a</span>
					    <div class="icon-block">
                        <?php if(isset($_SESSION['login']['tipus']) && $_SESSION['login']['tipus'] == "d") :?>
                            <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                            <i class="fas fa-key" aria-hidden="true"ng-click="recupera(director.idDir)" ></i>
                        <?php endif; ?>    
                            <a href="mailto:{{director.correu}}"><i class="fa fa-paper-plane"> {{director.correu}}</i></a>
                            <a href="tel:{{director.contacte}}"><i class="fa fa-phone">{{director.contacte}}</i></a>
                        </div>
                    </div>  
			    </div>   
		    </div>
        </div>        
        <div class="modal fade" id="modalRecontra" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRecontra" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title labelModal" id="modalRecontra">Canviar Contrasenya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="directors">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nova Contrasenya</label>
                            <input type="text" class="form-control" ng-model="pass"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Confirma Nova Contrasenya</label>
                            <input type="text" class="form-control" ng-model="newpass"></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btnModal" ng-click="recontra()">Dessar canvis</button>
                </div>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="modalDir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title labelModal" id="labelDigital">Director</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>        
                <div class="modal-body">
                    <form ng-model="directors">
                        <div class="mb-2">
                           <label for="message-text" class="col-form-label labelModal">Nom Director</label>
                           <input type="text" class="form-control" ng-model="nom"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Primer Cognom Director</label>
                            <input type="text" class="form-control" ng-model="cog1"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Segon Cognom Director</label>
                            <input type="text" class="form-control" ng-model="cog2"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Correu Director</label>
                            <input type="text" class="form-control" ng-model="correu"></input>
                       </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btnModal" data-bs-dismiss="modal" ng-click="guardar()">Dessar canvis</button>
           </div>
        </div>
    </div>
    <?php 
        
        if(isset($_SESSION['login']['tipus']) && $_SESSION['login']['tipus'] == "d") :
    ?>

    <h2>Tots els archius</h2>

    <?php endif; ?>
</div>



