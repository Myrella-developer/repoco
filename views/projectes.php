<div class="container-fluid">
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="projecte in projectes">
            <div class="card-body">
                <h5 class="card-title">{{projecte.nom}}</h5>
                <p class="card-text">{{projecte.descripcio}} </p>
                <p class="card-text">{{projecte.dataInici}} - {{projecte.dataFi}}</p>
                <a href="#" class="btn btn-primary">Modificar</a>
            </div>
        </div>
    </div>
</div>