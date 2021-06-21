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
            window.location.href="../index.html";           
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

.controller("GestorCasesController", ($q, $scope, $http, $location) => {
    $scope.tipo="a";
    $scope.irProjectes = () => {
        $location.path("/projectes/1")
    }
})

.controller("EdicionesController", ($q, $http, $scope, $routeParams) => {
    $scope.idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", $scope.idcasa);

    $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
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

.controller("ProjectesController", ($q, $http, $scope, $routeParams) => {
    $scope.idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", $scope.idcasa);

    $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.especialitats = res.data.especialitats;
        $scope.projectes = res.data.projectes;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.editar = (titol, titulo, descripcio, descripcion, idProjecte) => {
        data.append("acc","u");
        data.append("titol", titol);
        data.append("titol", titulo);
        data.append("titol", descripcio);
        data.append("titol", descripcion);
        data.append("idProjecte", idProjecte);
    
        $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }

    $scope.afegir = () => {
        console.log($scope.nouTitol)
        console.log($scope.nouDescripcio)
        data.append("acc","c");
        data.append("titol", $scope.nouTitol);
        data.append("titulo", $scope.nouTitulo);
        data.append("descripcio", $scope.nouDescripcio);
        data.append("descripcion", $scope.nouDescripcion);
    
        $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
})
.controller("GestorEspController", ($q, $http, $scope,$routeParams) => {
    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","especialitats");
    data.append("idcasa",$routeParams.idcasa);
    $http.post("models/gestDirEsp.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.especialitats = res.data.especialitats;
        $scope.cases=res.data.cases;
        console.log($scope.cases);
    })   
    .catch((err) => { console.log(err.statusText) })
    .finally(() => { if($scope.especialitats==0) $scope.sinespecialitats=true;})
    
    
    
    
})
