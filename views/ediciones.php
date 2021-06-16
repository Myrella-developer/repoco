<div class="container-fluid">
    <div class="row">
        <div class="card cardGestor m-5" style="width: 18rem;" ng-repeat="edicio in edicions">
            <div class="card-body">
                <h5 class="card-title">{{edicio.nom}}</h5>
                <p class="card-text">{{edicio.dataInici}} - {{edicio.dataFi}}</p>
                <a href="#" class="btn btn-primary">Modificar</a>
            </div>
        </div>
    </div>
</div>