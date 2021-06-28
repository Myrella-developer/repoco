
<div class="row">
  <div class="ms-4 mt-4 container-fluid d-block" ng-repeat="casa in cases">
    <div class="card" id="card-cases" ng-model="cases" style="width: 18rem;">
      <div class="card-body">
        <img src="../img/{{casa.url}}" class="card-img-top" alt="...">
        <h5 class="card-title">{{casa.nom}}</h5>
        <p class="card-text">{{casa.descripcio}}</p>
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a{{casa.idcasa}}">Modificar</a>
        <a class="btn btn-warning" ng-click="expandir()">Veure edicions</a>
      </div>
    </div>
  

  <div class="modal fade" id="a{{casa.idcasa}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edita el contingut</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form ng-model="cases">
            <div class="mb-2">
              <label for="recipient-name" class="col-form-label">Nom de la Casa d'ofici</label>
              <input type="text" class="form-control" ng-model="casa.nom" id="recipient-name">
            </div>
            <div class="mb-2">
              <label for="recipient-name" class="col-form-label">Nombre de la Casa de oficios</label>
              <input type="text" class="form-control" ng-model="casa.nombre" id="recipient-name">
            </div>
            <div class="mb-2">
              <label for="message-text" class="col-form-label">Descripció de la casa</label>
              <textarea class="form-control" id="message-text" ng-model="casa.descripcio">{{casa.descripcio}}</textarea>
            </div>
            <div class="mb-2">
              <label for="message-text" class="col-form-label">Descripción de la casa</label>
              <textarea class="form-control" id="message-text" ng-model="casa.descripcion">{{casa.descripcion}}</textarea>
            </div>
            <div class="mb-2">
              <label for="upload" class="col-form-label">Penjar una imatge</label>
              <input type="file" id="upload" multiple>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
          <button type="button" class="btn btn-primary" ng-click="editar(casa.nom,casa.nombre,casa.descripcio,casa.descripcion,casa.url)">Guardar canvis</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>