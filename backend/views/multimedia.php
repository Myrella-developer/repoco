<div class="container-fluid">
    <?php 
        session_start();
        if(!isset($_SESSION['login']['idDir'])){
            echo "Debes iniciar sesión";
        }
    
        if(isset($_SESSION['login']['idDir'])) :
    ?>
    <h2 class="text-center mt-5">Multimedia dels projectes de la teva casa</h2>

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
                        <select class="form-select mb-4" ng-model="idProjecte">
                            <option value="-1">--Selecciona projecte</option>
                            <option ng-repeat="p in projectes" ng-value="p.idProjecte">{{p.titol}}</option>
                        </select>

                        <input ng-model="novaDescripcio" type="text" class="form-control" placeholder="descripcio..."/><br/>
                        <input ng-model="novaDescripcion" type="text" class="form-control" placeholder="descripción..."/><br/>
                        <input type="file" onchange="angular.element(this).scope().getFileDetails(this)">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="afegir()" data-bs-dismiss="modal">Afegir projecte</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="m in multimedia">
            <div class="card-body">
                <img ng-src="../img/{{projecte.url}}" width="200"/>
                <h5 class="card-title">{{m.url}}</h5>
                <img class="w-75" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9E-EVCmmhLN51ydEr1uFEgcur-yGtBNOaT83DaRj4-O_eAYWW8gaGsLad35PJTVPD8l0&usqp=CAU">
                <p class="card-text">{{m.titol}}</p>
                <p class="card-text">{{m.descripcio}}</p>
                <b ng-if="m.tipo == 'i'">Imatge</b>
                <b ng-if="m.tipo == 'v'">Video</b>
                <b ng-if="m.tipo == 's'">So</b>
                <br/>
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
                                    <option></option>
                                </select><br/>
                                <!--
                                <input class="form-control" type="text" ng-model="projecte.titol"/><br/>
                                <input class="form-control" type="text" ng-model="projecte.titulo"/><br/>
                                <textarea class="form-control" ng-model="projecte.descripcio" rows="6" cols="40"></textarea>
                                <textarea class="form-control" ng-model="projecte.descripcion" rows="6" cols="40"></textarea>
                                -->
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

    <h2>Tots els archius</h2>

    <?php endif; ?>
</div>