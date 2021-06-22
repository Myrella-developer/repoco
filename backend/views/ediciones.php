<div class="container-fluid">
    <h2 class="text-center mt-5">Edicions</h2>

    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" data-bs-toggle="modal" data-bs-target="#afegir">AFEGIR</label>

    <div class="modal fade" id="afegir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelDigital">AFEGIR EDICIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <select class="form-select mb-4" ng-model="selEspAdd">
                            <option value="-1">--Selecciona especialitat</option>
                            <option ng-repeat="esp in especialitats" ng-value="esp.idEsp">{{esp.nom}}</option>
                        </select>
                        
                        <input type="date" class="form-control" ng-model="dataInici"/><br/>
                        <input type="date" class="form-control" ng-model="dataFi"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="afegir(selEspAdd, dataInici, dataFi)" data-bs-dismiss="modal">Afegir edicio</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="edicio in edicions">
            <div class="card-body">
                <h5 class="card-title">{{edicio.dataInici}} - {{edicio.dataFi}}</h5>
                <p class="card-text">{{edicio.nom}}</p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a{{edicio.idEdicio}}">Modificar</a>
            </div>

            <div class="modal fade" id="a{{edicio.idEdicio}}" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Modificar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <select class="form-select mb-4" ng-model="selEsp">
                                    <option ng-repeat="esp in especialitats" ng-value="esp.idEsp" ng-selected="esp.nom">{{esp.nom}}</option>
                                </select>
                                <input type="date" class="form-control" ng-model="dataInici"/><br/>
                                <input type="date" class="form-control" ng-model="dataFi"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-dark" ng-click="modificar(selEsp, dataInici, dataFi, edicio.idEdicio)" data-bs-dismiss="modal">Dessar canvis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-warning" ng-click="irProjectes()">Gestionar projectes</button>

</div>