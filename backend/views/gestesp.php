carga views Gestor Especialitats


<div class="container-fluid headerPrincipal">
	<div class="row ">
		<div class="col-12">
			<h1 class="titolPrincipal text-center">Llistat Especialitat</h1>
		</div>
	</div>	
    <div class="row">
        <div class="card cardGestor m-5" style="width: 20rem;" ng-repeat="especialitat in especialitats">
            <div class="card-body">
                <img width="50%" ng-src="backend/../img/{{especialitat.url}}"/>
                <h5 class="card-title">{{especialitat[1]}}</h5>
                <p class="card-text">{{especialitat.nom}} </p>
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
                        <form>
                            <div class="mb-3">
                                <div class="col-auto">
                                <label for="inputEspNomb" class="col-form-label">Nombre</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputEspnomb" class="form-control" aria-describedby="EspNombInline" ng-value="especialitat[1]">
                                </div>
                                <div class="col-auto">
                                    <span id="EspNombInline" class="form-text">fins a 50 caràcters</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-auto">
                                <label for="inputEspNom" class="col-form-label">Nom</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputEspnomb" class="form-control" aria-describedby="EspNomInline" ng-value="especialitat[2]">
                                </div>
                                <div class="col-auto">
                                    <span id="EspNomInline" class="form-text">fins a 50 caràcters</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-auto">
                                <label for="inputEspDesc" class="col-form-label">Descripció</label>
                                </div>
                                <div class="col-auto">
                                <textarea class="form-control" aria-label="textarea" ng-value="especialitat[4]"></textarea>
                                </div>
                                <div class="col-auto">
                                    <span id="Espdescricio" class="form-text">fins a 200 caràcters</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-auto">
                                <label for="inputEspDes" class="col-form-label">Descripcion</label>
                                </div>
                                <div class="col-auto">
                                <textarea class="form-control" aria-label="textarea" ng-value="especialitat[5]"></textarea>
                                </div>
                                <div class="col-auto">
                                    <span id="Espdes" class="form-text">fins a 200 caràcters</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputFile01">Imagen</label>
                                <input type="file" class="form-control" id="inputFile01">
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



<!-- <form>
  <div class="mb-3">
    <div class="col-auto">
    <label for="inputEspNomb" class="col-form-label">Nombre</label>
    </div>
    <div class="col-auto">
        <input type="text" id="inputEspnomb" class="form-control" aria-describedby="EspNombInline">
    </div>
    <div class="col-auto">
        <span id="EspNombInline" class="form-text">fins a 50 caràcters</span>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-auto">
    <label for="inputEspNomb" class="col-form-label">Nom</label>
    </div>
    <div class="col-auto">
        <input type="text" id="inputEspnomb" class="form-control" aria-describedby="EspNombInline">
    </div>
    <div class="col-auto">
        <span id="EspNombInline" class="form-text">fins a 50 caràcters</span>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-auto">
    <label for="inputEspDesc" class="col-form-label">Descripció</label>
    </div>
    <div class="col-auto">
    <textarea class="form-control" aria-label="textarea"></textarea>
    </div>
    <div class="col-auto">
        <span id="Espdescricio" class="form-text">fins a 200 caràcters</span>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-auto">
    <label for="inputEspDes" class="col-form-label">Descripcion</label>
    </div>
    <div class="col-auto">
    <textarea class="form-control" aria-label="textarea"></textarea>
    </div>
    <div class="col-auto">
        <span id="Espdes" class="form-text">fins a 200 caràcters</span>
    </div>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputFile01">Imagen</label>
  <input type="file" class="form-control" id="inputFile01">
</div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="input-group mb-3">
  <label class="input-group-text" for="inputFile01">Imagen</label>
  <input type="file" class="form-control" id="inputFile01">
</div>

<div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">Upload</label>
</div>

<div class="input-group mb-3">
  <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Button</button>
  <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
</div>

<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
</div> -->