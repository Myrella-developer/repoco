<div class="mb-5">
<?php
	session_start();
	if (!isset($_SESSION['login']['idDir'])) header("location: ../");
	?>


<div class="container">
        <div class="row ms-2">    
            <div class="col-md-3" ng-repeat="casa in cases">
                <div class="card cardGestor-ESP mx-auto mt-3">
				      	    <img src="../multimedia/img/miniaturas/{{casa.url}}" class="card-img-top imgCard-Gestor" alt="cases" />                      
                    <div class="card-body card-content">
                        <span class="card-title">{{casa.nom}}</span><br>
                        <p class="card-text">{{casa.descripcio}} </p><br>
                        <p class="card-text">{{especialitat.descripcion}} </p>
					              <div class="icon-block">
                            <i class="fa fa-cog" aria-hidden="true" ng-click="editar($index)"></i>
                            <a class="btn cardButton" href="#/especialitats/{{casa.idcasa}}">Gestionar especialitats</a>
					              </div>
                    </div>
                </div>   
			        </div>   
        </div>        
    </div>   
    <div class="modal fade" id="modalCases" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modalgestorDir">
                <div class="modal-header">
                    <h3 class="modal-title labelModal" id="labelDigital">Especialitat</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-model="especialitats">
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nom de la Casa</label>
                            <input type="text" class="form-control" ng-model="nom"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Nombre de la Casa</label>
                            <input type="text" class="form-control" ng-model="nombre"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripció de la Casa</label>
                            <input type="text" class="form-control"  ng-model="descripcio"></input>
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label labelModal">Descripción de la Casa</label>
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