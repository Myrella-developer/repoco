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
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="director in directors">
            <div class="card-body">
                <p class="card-title">{{director.nom}}</p>
                <p class="card-text">{{director.cog1}} </p>
                <p class="card-text">{{director.cog2}} </p>
                <p class="card-text">{{director.correu}} </p>
                <a class="btn btn-primary" ng-click="editar($index)">Modificar</a><br><br>
            </div>

            
        </div>
        <div class="modal fade" id="modalDir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
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
            </div>
    </div>
    <?php 
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Tots els archius</h2>

    <?php endif; ?>
</div>