<div class="mb-5">
<?php
	session_start();
	if (!isset($_SESSION['login']['idDir'])) header("location: ../");{}
?>




<?php
    session_start();
    if (!isset($_SESSION['login']['idDir'])) header("location: ../");
        ?>
        
       
    
        <div class="container">

            <h2 class="display-4 text-center">Districtes i Barris</h2>

        <!-- Districte Section -->
            <div class="accordion" id="distBarriAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="districtesSec">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#districtesSecBod" aria-expanded="true" aria-controls="districtesSecBod">
                            <h3>Districtes</h3>
                        </button>
                    </h2>
                    <div id="districtesSecBod" class="accordion-collapse collapse show" aria-labelledby="districtesSec" data-bs-parent="#distBarriAccordion">
                        <div class="accordion-body">
                            <ul class="list-group mb-3">
                                <li class="list-group-item" ng-repeat="dist in dists" aria-current="true">
                                    {{dist.nom}}
                                    <div class="float-end">
                                    <i class="ms-2 me-2 fas fa-pencil-alt text-secondary" ng-click="modalDist(dist.idDistricte, dist.nom)"></i>
                                    <i class="ms-2 me-2 fas fa-trash-alt text-danger" ng-click="delDist(dist.idDistricte)"></i>
                                    </div>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newDistModal">
                                Nuevo distrito
                            </button>


                            <!-- Modal for modifying selected district -->
                            <div class="modal fade" id="distModal" tabindex="-1" aria-labelledby="distModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="distModalLabel">Change name</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="districteName" class="form-label">Nom del districte</label>
                                        <input type="text" class="form-control" name="districteName" id="districteName" ng-model="districteNom">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="" class="btn btn-primary" ng-click="editDist()">Change</button>
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Modal for creating new district -->
                            <div class="modal fade" id="newDistModal" tabindex="-1" aria-labelledby="newDistModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newDistModalLabel">Nou districte</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="txtDistricteName" class="form-label">Nom del districte</label>
                                        <input type="text" class="form-control" name="txtdistricteName" id="txtDistricteName" ng-model="newDistricteNom">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="" class="btn btn-primary" ng-click="createDist()">Crear</button>
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <!-- Barri section -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="barrisSec">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#barriSecBod" aria-expanded="false" aria-controls="barriSecBod">
                            <h3>Barris</h3>
                        </button>
                    </h2>
                    <div id="barriSecBod" class="accordion-collapse collapse" aria-labelledby="barrisSec" data-bs-parent="#distBarriAccordion">
                        <div class="accordion-body">

                        <label class="form-label">Districte</label>
                        <select class="form-select form-select mb-3" aria-label=".form-select-lg example" ng-model="distID" ng-change="getBarris()">
                            <option value="-1">--Selecionar distrito</option>
                            <option ng-repeat="dist in dists" ng-value="dist.idDistricte">{{dist.nom}}</option>
                        </select>

                        
                            <div ng-if="distID != -1">

                                <ul class="list-group mb-3">
                                    <li class="list-group-item" ng-repeat="barri in barris" aria-current="true">
                                        {{$index+1}}. {{barri.nomBarri}}
                                        <div class="float-end">
                                        <i class="ms-2 me-2 fas fa-pencil-alt text-secondary" ng-click="fillCollBarri(barri.idBarri, barri.nomBarri)"></i>
                                        <i class="ms-2 me-2 fas fa-trash-alt text-danger" ng-click="removeBarri(barri.idBarri)"></i>
                                        </div>
                                    </li>
                                </ul>


                                <div class="collapse mb-3" id="modifBarriCollapse">
                                    <div class="card card-body">
                                        <h4>Modificar Barri</h4>
                                        <label for="barriDistr" class="form-label">Districte:</label>
                                        <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm" ng-model="barriDist">
                                            <option value="-1">--Selecionar distrito</option>
                                            <option ng-repeat="dist in dists" ng-selected="dist.idDistricte == barriDist" ng-value="dist.idDistricte">{{dist.nom}}</option>
                                        </select>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtBarri" class="form-label">Barri:</label>
                                                    <input type="text" ng-model="barriTitle" class="form-control mb-3" id="txtBarri">
                                                    <button class="btn btn-primary" ng-click="modifyBarri(barriTitle, barriDist)">Change</button>
                                                    <button class="btn btn-secondary" ng-click="hideBarriCollapse()">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newBarriModal">Add New Barri</button>
                        </div>

                        <!-- Modal for creating new barri -->
                        <div class="modal fade" id="newBarriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Barri</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="form-label">Districte</label>
                                        <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" ng-model="newDistricte">
                                            <option value="-1">--Selecionar distrito</option>
                                            <option ng-repeat="dist in dists" ng-value="dist.idDistricte">{{dist.nom}}</option>
                                        </select>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtNewBarri" class="form-label">Barri:</label>
                                                    <input type="text" ng-model="barriName" class="form-control mb-3" id="txtNewBarri">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" ng-click="addBarri(barriName, newDistricte)">Change</button>
                                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
?>

