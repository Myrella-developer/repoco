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

.controller("RecuperarController", ($q, $scope, $http, $location) => {
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
    $scope.irEsp = () => {
        $location.path("/especialitats/1")
    }
})

.controller("EdicionesController", ($q, $http, $scope, $routeParams, $location) => {
    let idcasa = $routeParams.idcasa;
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

    $scope.irProjectes = () => {
        $location.path("/projectes/"+idcasa)
    }
})

.controller("ProjectesController", ($q, $http, $scope, $routeParams) => {
    let idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", idcasa);

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
.controller("EspecialitatController", ($q, $http, $scope, $routeParams, $location) => {
    $scope.idcasa = $routeParams.idcasa;
    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","especialitats");
    data.append("idcasa",$scope.idcasa);
    $http.post("models/especialitat.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.especialitats = res.data;
        console.log($scope.especialitats);
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.irEdiciones = () => {
        $location.path("/ediciones/"+idcasa)
    }
})
.controller("DirectorsController", ($q, $http, $scope, $routeParams) => {
    $scope.idcasa = $routeParams.idcasa;
    let data= new FormData;
    let defered = $q.defer();
    data.append("acc","directors");
    data.append("idcasa",$scope.idcasa);
    $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.directors = res.data;
        console.log($scope.directors);
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
    $scope.alter = (nom, cog1, cog2, correu, idDir) => {
        data.append("acc","u");
        data.append("nom", nom);
        data.append("cog1", cog1);
        data.append("cog2", cog2);
        data.append("correu", correu);
        data.append("idDir", idDir);
    
        $http.post("models/director.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }

    $scope.inserir = () => {
        console.log($scope.nouNom)
        console.log($scope.nouCog1)
        console.log($scope.nouCog2)
        console.log($scope.nouCorreu)
        data.append("acc","c");
        data.append("nom", $scope.nouNom);
        data.append("cog1", $scope.nouCog1);
        data.append("cog2", $scope.nouCog2);
        data.append("correu", $scope.nouCorreu);
    
        $http.post("models/director.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
})