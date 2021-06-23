<div class="ms-4 mt-4 container-fluid d-block" ng-repeat="casa in cases">
  <div class="card" id="card-cases" ng-model="cases" style="width: 18rem;">
    <div class="card-body">
      <img src="../img/{{casa.url}}" class="card-img-top" alt="...">
      <h5 class="card-title">{{casa.nom}}</h5>
      <p class="card-text">{{casa.descripcio}}</p>
      <a class="btn btn-primary" ng-value="{{casa.idDir}}" ng-click="expandir()">Expandir</a>
    </div>
  </div>
</div>