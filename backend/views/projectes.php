<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Els projectes de la teva casa</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" data-bs-toggle="modal" data-bs-target="#afegir">AFEGIR</label>

    <div class="modal fade" id="afegir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelDigital">AFEGIR PROJECTE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <select class="form-select mb-4" ng-model="idEdicio">
                            <option>--Selecciona especialitat</option>
                            <option ng-repeat="esp in especialitats" ng-value="esp.idEdicio">{{esp.nom}}</option>
                        </select>
                        <input ng-model="nouTitol" type="text" class="form-control" placeholder="titol..."/><br/>
                        <input ng-model="nouTitulo" type="text" class="form-control" placeholder="titulo..."/><br/>
                        <input ng-model="nouDescripcio" type="text" class="form-control" placeholder="descripcio..."/><br/>
                        <input ng-model="nouDescripcion" type="text" class="form-control" placeholder="descripción..."/><br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="afegir()" data-bs-dismiss="modal">Afegir projecte</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="projecte in projectes">
            <div class="card-body">
                <img ng-src="../img/{{projecte.url}}" width="200"/>
                <h5 class="card-title">{{projecte.titol}}</h5>
                <p class="card-text">{{projecte.descripcio}}</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a{{projecte.idProjecte}}">Modificar</button>
                <button class="btn btn-danger" ng-click="eliminar(projecte.idProjecte)">Eliminar</button>
            </div>

            <div class="modal fade" id="a{{projecte.idProjecte}}" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Modifica projecte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <select class="form-control">
                                    <option>--Selecciona especialitat</option>
                                    <option ng-repeat="esp in especialitats">{{esp.nom}}</option>
                                </select><br/>
                                <input class="form-control" type="text" ng-model="projecte.titol"/><br/>
                                <input class="form-control" type="text" ng-model="projecte.titulo"/><br/>
                                <textarea class="form-control" ng-model="projecte.descripcio" rows="6" cols="40"></textarea>
                                <textarea class="form-control" ng-model="projecte.descripcion" rows="6" cols="40"></textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" ng-click="editar(projecte.titol, projecte.titulo, projecte.descripcio, projecte.descripcion, projecte.idProjecte)">Dessar canvis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        endif; 
    
        if(isset($_SESSION['login']['idDir']) && $_SESSION['login']['tipus'] == "a") :
    ?>

    <h2>Tots els projectes</h2>

    <?php endif; ?>
</div>