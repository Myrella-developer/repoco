angular.module("backend")
.controller("IndexController", () => {
    
})
.controller("HomeController", () => {
})
.controller("RecuperarController", ($q, $scope, $http) => {
    $scope.email = "pancracio@gmail.com";
    $scope.nuevaContra = "nueva contra";

    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","recuperar");
    data.append("email", $scope.email);
    data.append("nuevaContra", $scope.nuevaContra);

    $http.post("models/recPass.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        console.log(res.data);
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})

.controller("EdicionesController", ($q, $http, $scope) => {
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","edicions");

    $http.post("models/projYedi.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.edicions = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})

.controller("ProjectesController", ($q, $http, $scope) => {
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","projectes");

    $http.post("models/projYedi.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.projectes = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})
.controller("GestorEspController", ($q, $http, $scope) => {
    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","especialitats");
    $http.post("models/gestDirEsp.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.especialitats = res.data;
        console.log($scope.especialitats);
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
})
