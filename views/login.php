
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="">
                <form onsubmit="event.preventDefault()" class="box">
                    <h3 class="bg-danger rounded-pill p-1" ng-show="errorLogin">Introdueix les teves dades correctament!</h3>
                    <h1>Inici de sessió</h1>
                    <p class="text-muted"> Introduïu el vostre usuari i contrasenya!</p> 
                    <input type="email" ng-model="email" name="" placeholder="Nom d'usuari">
					<input type="password" ng-model="pass" name="" placeholder="contrasenya"> 
					<input type="submit" name="" value="Anar" ng-click="entrar()">
                </form>
            </div>
        </div>
    </div>
</div>
