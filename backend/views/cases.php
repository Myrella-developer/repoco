
<div class="ms-4 mt-4 container-fluid d-block" ng-repeat="casa in cases">
  <div class="card" ng-model="cases" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{casa.nom}}</h5>
      <p class="card-text">{{casa.descripcio}}</p>
      <a class="btn btn-primary" ng-value="{{casa.idDir}}" ng-click="expandir()">Expandir</a>
    </div>
  </div>
</div>



