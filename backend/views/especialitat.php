
<div class="container-fluid"> 
    <h2 class="text-center mt-5">Llistat Especialitat</h2> 
    <!-- TODO -->
    <!-- <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" data-bs-toggle="modal" data-bs-target="#afegir">AFEGIR</label>
     <div class="modal fade" id="afegir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelDigital">AFEGIR ESPECIALITAT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form >
                        <input ng-model="nombre" type="text" class="form-control" placeholder="Nombre"/><br/>
                        <input ng-model="nom" type="text" class="form-control" placeholder="Nom"/><br/>
                        <input ng-model="descripcio" type="text" class="form-control" placeholder="Descripcio"/><br/>
                        <input ng-model="descripcion" type="text" class="form-control" placeholder="Descripcion"/><br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="insert()" data-bs-dismiss="modal">Afegir Especialitat</button>
                </div>
            </div>
        </div>
    </div> -->
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="especialitat in especialitats.especialitats">
            <div class="card-body">
                <p class="card-title">{{especialitat.nom}}</p>
                <p class="card-text">{{especialitat.nombre}} </p>
                <p class="card-text">{{especialitat.descripcio}} </p>
                <p class="card-text">{{especialitat.descripcion}} </p><br>
                <a class="btn btn-primary" ng-click="editar($index)">Modificar</a><br><br>
                <a class="btn btn-primary" ng-click="editar('-1')">añadir Especialitat</a>
            </div>

            <div class="modal fade" id="a{{especialitats.idesp}}" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Modifica Especialitat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <select class="form-select mb-4" ng-model="selCasa">
                                    <option ng-repeat="case in cases" ng-value="case.idcasa" ng-selected="case.nom">{{case.nom}}</option>
                                </select>
                                <input class="form-control" type="text" ng-model="nom"/><br/>
                                <input class="form-control" type="text" ng-model="nombre"/><br/>
                                <input class="form-control" type="text" ng-model="descripcio"/><br/>
                                <input class="form-control" type="text" ng-model="descripcion"/><br/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" ng-click="guardar()">Dessar canvis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
