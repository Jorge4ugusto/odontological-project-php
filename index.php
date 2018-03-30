<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Multimedia/Estilos/main.css" />
		<noscript><link rel="stylesheet" href="Multimedia/Estilos/noscript.css" /></noscript>
    <title>Inicio</title>
    <script type="text/javascript">
    </script>
  </head>

  <body>
    <div id=wrapper>
<header id="header">
  <div class="content">
    <div class="inner">
      <h1>Hola Doctor</h1>
    </div>
  </div>
  <nav>
    <ul>
      <li><a href="#Ingresar">Ingresar</a></li>
      <li><a href="#nuevoDoctor">Registrarse</a></li>
    </ul>
  </nav>
</header>
<div id="main">
  <article id="Ingresar">
  <form  action="login.php" method="post">
  <h2 class="major">Ingresar</h1>
  <label for="user_nombre"> Usuario </label>
  <input id="name" class="texts" type="text" name="user_nombre" placeholder="Nombre Usuario" title="Falta su nombre de Usuario" required><br>
  <label for="password">Contrase&ntilde;a</label>
  <input id="paswd" class="texts" type="password" name="password" placeholder="Contrase&ntilde;a" title="Falta su contraseña" required><br>
  <input id="envio" type="submit" value="Ingresar"><br><br>
  <a href="#nuevoDoctor">Eres nuevo? &nbsp; &nbsp;Registrate Ahora!</a>
  <div class="inner"> <?php $error ?></div>
  </form>
  </article>
<article id="nuevoDoctor">
  <h2 class="major">Registrarse</h2>
  <form method="POST" action="registrar.php">
    <div class="field half first">
      <input type="text" name="name" placeholder="Nombre Completo" required/>
      <input type="number" name="edad" placeholder="Edad" required />
      <input type="text" name="usuario" placeholder="Nombre de Usuario" required />
      <input type="password" name="contra" id="password" placeholder="Contraseña" required />
      <input type="password" name="contra1" id="confirm_password" placeholder="Confirmar Contraseña" required />
      <label for="genero">Genero</label>
      Masculino: <input type="radio" name="genero" id="genero" value="Masculino" oninvalid="this.setCustomValidity('Ups te olvidaste marcar un genero..')" onclick="clearValidity();" required  />
      Femenino: <input type="radio" name="genero" value="Femenino" onclick="clearValidity()" />
    </div>
    <ul class="actions">
      <li><input type="reset" value="Restaurar" /></li>
      <li><input type="submit" value="Registrar"/></li>
    </ul>
  </form>
</article>
</div>
<footer id="footer">
  <p class="copyright">Comunidad Odontologica "Dentistas Libres"</p>
  <p class="copyright">Diseño y Desarollo:Jorge Augusto Rodriguez con la colaboracion de HTML5UP</p>
  <p class="copyright">&copy;&nbsp;Todos los Derechos Reservados</p>
</footer>
    </div>
    <script src="Multimedia/Scripts Java/jquery.min.js"></script>
    <script src="Multimedia/Scripts Java/skel.min.js"></script>
    <script src="Multimedia/Scripts Java/util.js"></script>
    <script src="Multimedia/Scripts Java/main.js"></script>
    <div id="bg"></div>
</body>
</html>
