<?php
	session_start();
	if (!isset($_SESSION['login']['idDir'])) header("location: ../");
	?>
<div class="row">
  <div class="ms-4 mt-4 d-block" ng-repeat="casa in cases">
    <div class="card" id="card-cases" ng-model="cases" style="width: 18rem;">
      <div class="card-body">
        <img src="../multimedia/img/{{casa.url}}" class="card-img-top" alt="...">
        <h5 class="card-title">{{casa.nom}}</h5>
        <p class="card-text">{{casa.descripcio}}</p>
        <ul class="list-group mb-2">
          <li class="list-group-item">{{casa.url}}</li>
        </ul>
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCases" ng-click="editar($index)">Modificar</a>
        <a href="#/especialitats/{{casa.idcasa}}" class="btn btn-warning">Gestionar especialitats</a>
      </div>
    </div>  
  </div>
</div>

<div class="modal fade" id="ModalCases">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalCasesxx">Edita el contingut</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form ng-model="cases">
            <div class="mb-2">
              <label for="recipient-name" class="col-form-label">Nom de la Casa d'ofici</label>
              <input type="text" class="form-control" ng-model="nom" id="recipient-name">
            </div>
            <div class="mb-2">
              <label for="recipient-name" class="col-form-label">Nombre de la Casa de oficios</label>
              <input type="text" class="form-control" ng-model="nombre" id="recipient-name">
            </div>
            <div class="mb-2">
              <label for="message-text" class="col-form-label">Descripció de la casa</label>
              <textarea class="form-control" id="message-text" ng-model="descripcio">{{descripcio}}</textarea>
            </div>
            <div class="mb-2">
              <label for="message-text" class="col-form-label">Descripción de la casa</label>
              <textarea class="form-control" id="message-text" ng-model="descripcion">{{descripcion}}</textarea>
            </div>
            <div class="mb-2">
              <ul class="list-group" ng-model="url">
                <li class="list-group-item">{{url}}</li>
              </ul>
              <label for="upload" class="col-form-label">Penjar una imatge</label>
              <input type="file" id="upload" multiple="true">
            </div>
          </form>
        </div>
        <div class="modal-footer d-block">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" ng-click="guardar()" >Guardar canvis</button>
        </div>
      </div>
    </div>
  </div>
</div>

