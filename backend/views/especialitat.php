<div class="container-fluid mb-5">
<a class="btn btn-warning mt-4 ms-2" ng-href="http://localhost/repoco/backend/#/edicions/1">Gestionar edicions</a>
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
	<div class="text-center">
		<h2>Especialitats de la teva casa</h2>
	</div>
   

    <i class="fas fa-plus-square ms-4 mt-5 text-primary" ng-click="editar('-1')"><label class="ms-1 fw-bold">AFEGIR</label></i>
    <div class="container">
        <div class="row ms-2">    
            <div class="col-md-3" ng-repeat="especialitat in especialitats">
                <div class="card cardGestor-ESP mx-auto mt-3">
					<img src="img/{{especialitat.url!=null?especialitat.url: 'noimage.png'}}" class="card-img-top imgCard-Gestor" alt="especialitat" />                       <div class="card-content text-center">
                    <div class="card-body card-content">
                        <span class="card-title">{{especialitat.nom}}</span><br>
                        <span class="card-text">{{especialitat.nombre}} </span><br>
                        <p class="card-text">{{especialitat.descripcio}} </p><br>
                        <p class="card-text">{{especialitat.descripcion}} </p>
					    <div class="icon-block">
                            <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
					    </div>
                    </div>
                </div>   
			</div>   
        </div>        
    </div>     
    <div class="modal fade" id="modalEsp" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h3 class="modal-title labelModal" id="labelDigital">Especialitat</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="especialitats">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nom Especialitat</label>
                            <input type="text" class="form-control" ng-model="nom"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nombre Especialitat</label>
                            <input type="text" class="form-control" ng-model="nombre"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripcio Especialitat</label>
                            <input type="text" class="form-control"  ng-model="descripcio"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripción Especialitat</label>
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
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "d") :
    ?>

    <h2>Tots els archius</h2>

    <?php endif; ?>
</div>

