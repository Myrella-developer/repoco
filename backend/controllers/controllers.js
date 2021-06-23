angular.module("backend")
.controller("IndexController", ($scope,$q,$http,$routeParams) => {  
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
.controller("HomeController", ($scope,$q,$http,$location) => {

        let data = new FormData;
        data.append("acc","r");

        let defered =$q.defer();
        $http.post("models/cases.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

        .then((res) =>{
            defered.resolve(res);
            $scope.cases=res.data;
            console.log($scope.cases);
        })
        .catch((err)=>{console.log(err.statusText)})
        .finally(()=>{});

        $scope.expandir=()=>{
            $location.path('edicions/{{$scope.cases[0].idcasa}}')
        }
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
    let data = new FormData;
    let defered = $q.defer();
    $scope.param1= $routeParams.param1;

    $http.post("models/gestorcases.php", data, { headers:{ "Content-type" : undefined}, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        console.log(res.data);
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})
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
    data.append("idcasa", idcasa);

    $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.edicions = res.data.edicions;
        $scope.especialitats = res.data.especialitats;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.afegir = (selEspAdd, dataInici, dataFi) => {
        dataInici = dataInici.getFullYear() + "-" + (dataInici.getMonth()+1) + "-" + dataInici.getDate()
        dataFi = dataFi.getFullYear() + "-" + (dataFi.getMonth()+1) + "-" + dataFi.getDate()
        alert("Edicio afegida")
        data.append("acc","c");
        data.append("selEspAdd", selEspAdd);
        data.append("dataInici", dataInici);
        data.append("dataFi", dataFi);
    
        $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
    $scope.selEspAdd = "-1";

    $scope.modificar = (selEsp, dataInici, dataFi, idEdicio) => {
        dataInici = dataInici.getFullYear() + "-" + (dataInici.getMonth()+1) + "-" + dataInici.getDate()
        dataFi = dataFi.getFullYear() + "-" + (dataFi.getMonth()+1) + "-" + dataFi.getDate()
        alert("Edicio modificada")
        data.append("acc","u");
        data.append("selEsp", selEsp);
        data.append("dataInici", dataInici);
        data.append("dataFi", dataFi);
        data.append("idEdicio", idEdicio);
    
        $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
    
    $scope.irProjectes = () => {
        $location.path("/projectes/"+idcasa)
    }

    $scope.eliminar = (idEdicio) => {
        data.append("acc", "d");
        data.append("idEdicio", idEdicio);

        $http.post("models/edicions.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
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
        data.append("titulo", titulo);
        data.append("descripcio", descripcio);
        data.append("descripcion", descripcion);
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
        data.append("acc","c");
        data.append("titol", $scope.nouTitol);
        data.append("titulo", $scope.nouTitulo);
        data.append("descripcio", $scope.nouDescripcio);
        data.append("descripcion", $scope.nouDescripcion);
        data.append("idEdicio", $scope.idEdicio);
    
        $http.post("models/projectes.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }

    $scope.eliminar = (idProjecte) => {
        data.append("acc", "d");
        data.append("idProjecte", idProjecte);

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
    let idcasa = $routeParams.idcasa;
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
    $scope.altera = (selCasa,nom, Nombre, Descripicio,Descripicion, idEsp,idCasa) => {
        data.append("acc","u");
        data.append("selCasa", selCasa);
        data.append("nom", nom);
        data.append("Nombre", Nombre);
        data.append("Descripicio", Descripicio);
        data.append("Descripicion", Descripicion);
        data.append("idEsp", idEsp);
        data.append("idCasa", idCasa);
        console.log (nom);
    
        $http.post("models/especialitat.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }

    $scope.insert= () => {
        console.log($scope.newNom)
        data.append("acc","c");
        data.append("nom", $scope.newNom);
        data.append("Nombre", $scope.newNombre);
        data.append("Descripicio", $scope.newDescripicio);
        data.append("Descripicion", $scope.newDescripicion);
        data.append("idEsp", $scope.idEsp);
    
        $http.post("models/especialitat.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
    $scope.irEdiciones = () => {
        $location.path("/ediciones/"+idcasa)
    }
})
.controller("DirectorsController", ($q, $http, $scope, $routeParams) => {
    let idcasa = $routeParams.idcasa;
	let data= new FormData;
    let defered = $q.defer();
    data.append("acc","r");
    data.append("idcasa", idcasa);

    $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
    .then((res) => { 
        defered.resolve(res);
        $scope.directors = res.data;
    })
    .catch((err) => { console.log(err.statusText) })
    .finally(() => {})

    $scope.alter = (nom, cog1, cog2, correu,idDir) => {
        data.append("acc","u");
        data.append("nom", nom);
        data.append("cog1", cog1);
        data.append("cog2", cog2);
        data.append("correu", correu);
        data.append("idDir", idDir);
        console.log (nom);
    
        $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }

    $scope.inserir= () => {
        console.log($scope.nouNom)
        console.log($scope.nouCog1)
        data.append("acc","c");
        data.append("nom", $scope.nouNom);
        data.append("cog1", $scope.nouCog1);
        data.append("cog2", $scope.nouCog2);
        data.append("correu", $scope.nouCorreu);
        data.append("pass", $scope.nouPass);
    
        $http.post("models/directors.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
            defered.resolve(res);
            console.log(res.data)
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
    }
})