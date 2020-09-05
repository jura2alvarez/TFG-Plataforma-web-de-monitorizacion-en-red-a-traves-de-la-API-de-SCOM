<!-- Inicio -->
<!-- Barra navegador -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Links -->
  <ul class="nav navbar-nav nav-info"> 
 		 <li style="float:right">
			<a class="navbar-brand .justify-content-rigth" href="#">
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Fujitsu-Logo.svg/500px-Fujitsu-Logo.svg.png" style="width:60px;">
			</a>
		</li> 
	</ul>
</nav>
<!-- Barra navegador -->
<!-- Cabeceras Bootstrap 4 -->
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/ac4759fb14.js"></script>
    </head>
<!-- Cabeceras Bootstrap 4 -->
<!-- FIN  -->

<!-- Cabecera individual -->
<title>Login</title>

<br>
<div class="jumbotron text-center">
  <h1 class="display-3">Login</h1>
</div>


<div class="container">
  <div class="row">
    <div class="col-sm-3"> </div>

    <div class="col-sm-9">
      <form action="LoginCorrecto.php" method="post">
        <label class="col-sm-6" for="usuario">Usuario:</label>
        <label class="sr-only" for="inlineFormInputGroupUsername">Usuario</label>
        <div class="input-group col-sm-6">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i></div>
          </div>
          <input type="text" class="form-control" name="usuario" placeholder="Introduce el usuario de SCOM"><br>
        </div>
        <br>
        <label class="col-sm-6" for="pass">Contraseña:</label>
        <label class="sr-only" for="inlineFormInputGroupUsername">Contraseña</label>
        <div class="input-group col-sm-6">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-key"></i></div>
          </div>
          <input type="password" class="form-control" name="pass" placeholder="Introduce la contraseña de usuario"><br>
        </div>
        </br> 
        <div class="input-group col-sm-6">
          <button type="submit" class="btn btn-primary" onclick="cargandoAnimacion()">Acceder</button>
        </div>
        <br>
      </form>
    </div>

    <div class="col-sm-5"> </div>
    <div class="col-sm-4" id="cargando"> </div>
  </div>
</div>
<script>
  function cargandoAnimacion(){
    document.getElementById("cargando").innerHTML = '<i class="fas fa-spinner fa-spin fa-3x"></i>' ;
  }
</script>

