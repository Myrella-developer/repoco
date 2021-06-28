
<div class="container-fluid"> 
    <h2 class="text-center mt-5">Llistat Especialitat</h2>
    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
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
                        <input ng-model="newNombre" type="text" class="form-control" placeholder="Nombre"/><br/>
                        <input ng-model="newNom" type="text" class="form-control" placeholder="Nom"/><br/>
                        <input ng-model="newDescripcio" type="text" class="form-control" placeholder="Descripcio"/><br/>
                        <input ng-model="newDescripcion" type="text" class="form-control" placeholder="Descripcion"/><br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="insert()" data-bs-dismiss="modal">Afegir Especialitat</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="especialitat in especialitats">
            <div class="card-body">
                <p class="card-title">{{especialitat.nom}}</p>
                <p class="card-text">{{especialitat.nombre}} </p>
                <p class="card-text">{{especialitat.descripcio}} </p>
                <p class="card-text">{{especialitat.descripcion}} </p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a{{especialitat.idcasa}}">Modificar</button>
            </div>

            <div class="modal fade" id="a{{director.idDir}}" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Modifica Especialitat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <select class="form-select mb-4" ng-model="selCasa">
                                    <option ng-repeat="case in cases" ng-value="cases.idcasa" ng-selected="cases.nom">{{cases.nom}}</option>
                                </select>
                                <input class="form-control" type="text" ng-model="especialitat.nom"/><br/>
                                <input class="form-control" type="text" ng-model="especialitat.nombre"/><br/>
                                <input class="form-control" type="text" ng-model="especialitat.descripcio"/><br/>
                                <input class="form-control" type="text" ng-model="especialitat.descripcion"/><br/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" ng-click="altera(selCasa, especialitat.nom, especialitat.nombre, especialitat.descripcio, especialitat.descripcion,especialitat.idEsp)">Dessar canvis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
