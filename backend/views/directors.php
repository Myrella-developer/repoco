<div class="container-fluid">
    <h2 class="text-center mt-5">Gestionar llistado</h2>
    <i class="fas fa-plus-square ms-4 mt-5 text-primary"></i>
    <label class="ms-1 fw-bold" data-bs-toggle="modal" data-bs-target="#afegir">AFEGIR</label>
    <div class="modal fade" id="afegir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelDigital">AFEGIR DIRECTOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input ng-model="nouNom" type="text" class="form-control" placeholder="Nom"/><br/>
                        <input ng-model="nouCog1" type="text" class="form-control" placeholder="Congnom 1"/><br/>
                        <input ng-model="nouCog2" type="text" class="form-control" placeholder="Congnom 2"/><br/>
                        <input ng-model="nouCorreu" type="text" class="form-control" placeholder="Correu"/><br/>
                        <input ng-model="nouPass" type="password" class="form-control" placeholder="contrasenya"/><br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="inserir()" data-bs-dismiss="modal">Afegir director</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="director in directors">
            <div class="card-body">
                <p class="card-title">{{director.nom}}</p>
                <p class="card-text">{{director.cog1}} </p>
                <p class="card-text">{{director.cog2}} </p>
                <p class="card-text">{{director.correu}} </p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a{{director.idDir}}">Modificar</button>
            </div>

            <div class="modal fade" id="a{{director.idDir}}" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Modifica Director</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input class="form-control" type="text" ng-model="director.nom"/><br/>
                                <input class="form-control" type="text" ng-model="director.cog1"/><br/>
                                <input class="form-control" type="text" ng-model="director.cog2"/><br/>
                                <input class="form-control" type="text" ng-model="director.correu"/><br/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" ng-click="alter(director.nom, director.cog1, director.cog2, director.correu,director.idDir)">Dessar canvis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
