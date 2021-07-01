<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Gestionar Directors</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary" ng-click="editar('-1')"><label class="ms-1 fw-bold">AFEGIR</label></i>

    <div class="container">
        <div class="row ms-2">    
            <div class="col-md-3" ng-repeat="director in directors">
			    <div class="card gestorDir-card">
				    <div class="card-content text-center">
					    <h3>{{director.nom}} {{director.cog1}}<small>Director/a</small></h4>
					    <div class="icon-block">
                            <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
						    <a href="mailto:{{director.correu}}"> <i class="fa fa-paper-plane"></i></a>
                            <a href="tel:{{director.contacte}}"><i class="fa fa-phone"></i></a>
					    </div>
                    </div>   
			    </div>   
		    </div>
        </div>        
    </div>        
    <div class="modal fade" id="modalDir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelDigital">Director</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>        
                <div class="modal-body">
                    <form ng-model="directors">
                        <div class="mb-2">
                           <label for="message-text" class="col-form-label">Nom Director</label>
                          <input class="form-control" id="message-text" ng-model="nom"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Primer Cognom Director</label>
                            <textarea class="form-control" id="message-text" ng-model="cog1">{{cog1}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Segon Cognom Director</label>
                            <textarea class="form-control" id="message-text" ng-model="cog2">{{cog2}}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Correu Director</label>
                            <textarea class="form-control" id="message-text" ng-model="correu">{{correu}}</textarea>
                       </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Contrasenya Director</label>
                            <textarea class="form-control" id="message-text" ng-model="pass">{{pass}}</textarea>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" ng-click="guardar()">Dessar canvis</button>
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



