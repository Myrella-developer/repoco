angular.module("backend")
.controller("IndexController", ($scope,$q,$http) => {
       $scope.tancar=()=>{
        let data = new FormData;
        data.append("acc","tancar");

        let defered =$q.defer();
        $http.post("../models/login.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

        .then((res) =>{
            defered.resolve(res);
            $scope.datos=res.data;
            //$location.path("./index.php");
            window.location.href="../index.html";
            console.log($scope.datos);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});
    }
    
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

.controller("GestorCasesController", ($q, $scope, $http) => {
    $scope.tipo="a";
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

    $scope.afegir = (dataInici, dataFi, nomEdicio) => {
        dataInici = dataInici.getFullYear() + "-" + (dataInici.getMonth()+1) + "-" + dataInici.getDate()
        dataFi = dataFi.getFullYear() + "-" + (dataFi.getMonth()+1) + "-" + dataFi.getDate()
        alert("Edicio afegida")
        console.log(nomEdicio)
        console.log(dataInici)
        console.log(dataFi)
    }

    $scope.modificar = (nomEdicio, dataInici, dataFi) => {
        dataInici = dataInici.getFullYear() + "-" + (dataInici.getMonth()+1) + "-" + dataInici.getDate()
        dataFi = dataFi.getFullYear() + "-" + (dataFi.getMonth()+1) + "-" + dataFi.getDate()
        alert("Edicio modificada")
        console.log(nomEdicio)
        console.log(dataInici)
        console.log(dataFi)
    }
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

    $scope.afegir = () => {

    }

    $scope.modificar = () => {
        
    }
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
