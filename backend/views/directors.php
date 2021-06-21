views gestor Directors
<div class="container-fluid headerPrincipal">
	<div class="row ">
		<div class="col-12">
			<h1 class="titolPrincipal text-center">Llistat Directors</h1>
		</div>
	</div>	
    <label class="ms-1 fw-bold" data-bs-toggle="modal" data-bs-target="#afegirDir">AFEGIR</label>
    <div class="modal fade" id="afegirDir" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEsp">AFEGIR DIRECTOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-repeat="director in directors">
                        <div class="mb-3">
                            <div class="col-auto">
                                <label for="inputNomDir" class="col-form-label">Nombre</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="inputNomDir" class="form-control" aria-describedby="dirInline" ng-value="director[1]">
                            </div>
                            <div class="col-auto">
                                <span id="dirInline" class="form-text">fins a 30 caràcters</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-auto">
                                <label for="inputCogDir" class="col-form-label">Cognom 1</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="inputCogDir" class="form-control" aria-describedby="cogdirInline" ng-value="director[2]">
                            </div>
                            <div class="col-auto">
                                <span id="cogdirInline" class="form-text">fins a 30 caràcters</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-auto">
                                    <label for="inputCog2Dir" class="col-form-label">Cognom 2</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputCog2Dir" class="form-control" aria-describedby="cogdir2Inline" ng-value="director[3]">
                                </div>
                                <div class="col-auto">
                                    <span id="cogdir2Inline" class="form-text">fins a 30 caràcters</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-auto">
                                <label for="inputEmail" class="col-form-label">Correu</label>
                                </div>
                                <div class="col-auto">
                                <input type="text" id="inputEmail" class="form-control" aria-describedby="correoInline" ng-value="director[4]">
                                </div>
                                <div class="col-auto">
                                    <span id="correoInline" class="form-text">fins a 30 caràcters</span>
                                </div>
                            </div> 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" ng-click="afegir()" data-bs-dismiss="modal">Afegir Director</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card cardGestor m-5" style="width: 20rem;" ng-repeat="director in directors">
            <div class="card-body">
                <p class="card-title">{{director.nom}}</p>
                <p class="card-text">{{director.cog1}} </p>
                <p class="card-text">{{director.cog2}} </p>
                <p class="card-text">{{director.correu}} </p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gestor">Modificar</button>
            </div>
            <div class="modal fade" id="gestor" tabindex="-1" aria-labelledby="labelDigital" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelDigital">Modificar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form ng-repeat="director in directors">
                        <div class="mb-3">
                            <div class="col-auto">
                                <label for="inputNomDir" class="col-form-label">Nombre</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="inputNomDir" class="form-control" aria-describedby="dirInline" ng-value="director[1]">
                            </div>
                            <div class="col-auto">
                                <span id="dirInline" class="form-text">fins a 30 caràcters</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-auto">
                                <label for="inputCogDir" class="col-form-label">Cognom 1</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="inputCogDir" class="form-control" aria-describedby="cogdirInline" ng-value="director[2]">
                            </div>
                            <div class="col-auto">
                                <span id="cogdirInline" class="form-text">fins a 30 caràcters</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-auto">
                                    <label for="inputCog2Dir" class="col-form-label">Cognom 2</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputCog2Dir" class="form-control" aria-describedby="cogdir2Inline" ng-value="director[3]">
                                </div>
                                <div class="col-auto">
                                    <span id="cogdir2Inline" class="form-text">fins a 30 caràcters</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-auto">
                                <label for="inputEmail" class="col-form-label">Correu</label>
                                </div>
                                <div class="col-auto">
                                <input type="text" id="inputEmail" class="form-control" aria-describedby="correoInline" ng-value="director[4]">
                                </div>
                                <div class="col-auto">
                                    <span id="correoInline" class="form-text">fins a 30 caràcters</span>
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Dessar canvis</button>
                        </div>
                    </div>
                 </div>
            </div>    
        </div>
    </div>
</div>
