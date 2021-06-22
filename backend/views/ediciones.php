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
                        <select class="form-select mb-4" ng-model="nomEdicio">
                            <option>--Selecciona edicio</option>
                            <option ng-repeat="edicio in edicions" ng-value="edicio.nom">{{edicio.nom}}</option>
                        </select>
                        <input type="date" class="form-control" ng-model="dataInici"/><br/>
                        <input type="date" class="form-control" ng-model="dataFi"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="afegir(dataInici, dataFi, nomEdicio)" data-bs-dismiss="modal">Afegir edicio</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="edicio in edicions">
            <div class="card-body">
                <h5 class="card-title">{{edicio.nom}}</h5>
                <p class="card-text">{{edicio.dataInici}} - {{edicio.dataFi}}</p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gestor">Modificar</a>
            </div>
        </div>

        <div class="modal fade" id="gestor" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelDigital">{{edicio.nom}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <select class="form-select mb-4" ng-model="nomEdicio">
                                <option>--Selecciona edicio</option>
                                <option ng-repeat="edicio in edicions" ng-value="edicio.nom">{{edicio.nom}}</option>
                            </select>
                            <input type="date" class="form-control" ng-model="dataInici"/><br/>
                            <input type="date" class="form-control" ng-model="dataFi"/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" ng-click="modificar(nomEdicio, dataInici, dataFi)" data-bs-dismiss="modal">Dessar canvis</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-warning" ng-click="irProjectes()">Gestionar projectes</button>

</div>