

<div class="container-fluid">
	<form>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Correu electrònic</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="pancracio@gmail.com">
	    <div id="emailHelp" class="form-text">Mai comparteixis les teves dades de sessió.</div>
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Contrasenya</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" value="1111">
	  </div>
	  <button type="submit" class="btn btn-primary" ng-click="entrar()">Entrar</button>
	  <span ng-click="tancar()">Tancar sessió</span>
	</form>
</div>
<!-- <div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
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
 -->