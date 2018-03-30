<?php
require_once("../Core/conexion.php");
require_once("../Core/Lock.php");
 ?>
<!DOCTYPE HTML>
<html>
	<head>

		<title>Inicio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../Multimedia/Estilos/main.css" />
		<noscript><link rel="stylesheet" href="../Multimedia/Estilos/noscript.css" /></noscript>
		<link rel="stylesheet" href="../Multimedia/Estilos/iconos estilo.css">
	</head>
		<body>
				../Multimedia/Scripts Java/<div id="wrapper">
					<header id="header">
						<div class="content">
							<div class="inner">
								<h1>Bienvenido</h1>
								<h2><?=$login_session_nombre?></h2>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#pacientes">Lista de Pacientes</a></li>
								<li><a href="#tratamientos">Lista de Tratamientos</a></li>
								<li><a href="#VerHistorial">Ver Historiales</a></li>
								<li><a href="#nuevoHistorial">Abrir Historial</a></li>
								<li><a href="../logout.php">Cerrar Sesion</a></li>
							</ul>
						</nav>
					</header>
					<div id="main">
							<article id="pacientes">
								<h2 class="major">Pacientes</h2>
                <input type="search" placeholder="Buscar Pacientes"><br><br>
                <ul class="actions">
                  <li><a href="#nuevoPaciente" class="button"> + Agregar Paciente</a></li>
                </ul>
                <div class="table-wrapper">
								<table border="1">
					        <thead class="colortitulos">
					        <tr>
					          <th>Nombres</th>
					          <th>Apellidos</th>
					          <th>Genero</th>
					          <th>Edad</th>
										<th>Estado</th>
										<th>Opciones</th>
					        </tr>
					         </thead>
					      <?php
					      $enlistar="SELECT id_paciente,
					        nombres_paciente,
					        apellidos_paciente,
									paciente.genero,
									paciente.edad,
					        paciente.estado
					        FROM paciente, usuario
					        WHERE paciente.id_usuario=usuario.id_usuario
                  AND paciente.id_usuario='$login_session_usuario'
					        ";
					      $listar_pacientes=mysql_query($enlistar,$bd);
					       ?>
					       <tbody>
					         <?php
					         while ($ejecutar_lista_pacientes=mysql_fetch_array($listar_pacientes))
					         {
					           ?>
                     <?php if ($ejecutar_lista_pacientes['estado']==1 || $ejecutar_lista_pacientes['estado']==2) {
                     ?>
					           <tr>
					           <td><?=$ejecutar_lista_pacientes['nombres_paciente']?></td>
					           <td><?=$ejecutar_lista_pacientes['apellidos_paciente']?></td>
										 <td><?=$ejecutar_lista_pacientes['genero']?></td>
										 <td><?=$ejecutar_lista_pacientes['edad']?></td>
					           <?php
					           if ($ejecutar_lista_pacientes['estado']==1) {
					          echo "<td style='background-color:rgba(84, 255, 101, 0.49);'>Habilitado</td>
					          <td>
					          <a id='deshabilitar' href='Opciones/Deshabilitar.php?ID=".$ejecutar_lista_pacientes['id_paciente']."'>
					          <span class='icon-lock-open'></span> <div class='mostrar'> <p>Deshabilitar</p> </div>
					          </a>
					          </td>";
					           }
					           if ($ejecutar_lista_pacientes['estado']==2) {
					            echo "<td style='background-color:rgba(255, 0, 0, 0.52);' >Deshabilitado</td>
					            <td>
					            <a id='habilitar' href='Opciones/Habilitar.php?ID=".$ejecutar_lista_pacientes['id_paciente']."'>
					            <span class='icon-lock-rounded'></span> <div class='mostrar'><p>Habilitar</p></div>
					            </a>
											<a id='Editar' href='Opciones/Editar.php?ID=".$ejecutar_lista_pacientes['id_paciente']."'>
					            <span class='icon-document-edit'></span> <div class='mostrar'><p>Editar</p></div>
					            </a>
											<a id='Eliminar' href='Opciones/Eliminar.php?ID=".$ejecutar_lista_pacientes['id_paciente']."'>
					            <span class='icon-trash-can'></span> <div class='mostrar'><p>Eliminar</p></div>
					            </a>
					            </td>";
					           }
                     if ($ejecutar_lista_pacientes['estado']==3) {
                    }

					            ?>
					       </tr>
					       <?php
                 }
					      }
					      ?>
					       </tbody>
					       </table>
                 </div>
								</article>
							<article id="tratamientos">
								<h2 class="major">Tratamientos</h2>
								<input type="search" placeholder="Buscar Tratamiento"><br><br>
                <ul class="actions">
                <li><a href="#nuevoServicio" class="button"> + Agregar Tratamiento</a></li>
                </ul>
                <div class="table-wrapper">


                <table border="1">
                  <thead>
                  <tr>
                    <th>Servicio o Tratamiento</th>
                    <th>Precio en Bs.</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                   </thead>
                <?php
                $enlistar="SELECT id_servicio,
                  nombre_servicio,
                  costo_servicio,
                  servicio.estado
                  FROM servicio, usuario
                  WHERE servicio.id_usuario=usuario.id_usuario
                  AND servicio.id_usuario='$login_session_usuario'
                  ";
                $listar_servicios=mysql_query($enlistar,$bd);
                 ?>
                 <tbody>
                   <?php
                   while ($ejecutar_lista_servicios=mysql_fetch_array($listar_servicios))
                   {
                     ?>
                     <?php if ($ejecutar_lista_servicios['estado']==1 || $ejecutar_lista_servicios['estado']==2) {
                     ?>
                     <tr>
                     <td><?=$ejecutar_lista_servicios['nombre_servicio']?></td>
                     <td><?=$ejecutar_lista_servicios['costo_servicio']?></td>
                     <?php

                     if ($ejecutar_lista_servicios['estado']==1) {
                    echo "<td style='background-color:rgba(84, 255, 101, 0.49);'>Habilitado</td>
                    <td>
                    <a id='deshabilitar' href='Opciones/deshabilitarServicio.php?ID=".$ejecutar_lista_servicios['id_servicio']."'>
                    <span class='icon-lock-open'></span><div class='mostrar'><p>Deshabilitar</p></div>
                    </a>
                    </td>";
                     }
                     if ($ejecutar_lista_servicios['estado']==2) {
                      echo "<td style='background-color:rgba(255, 0, 0, 0.52);' >Deshabilitado</td>
                      <td>
                      <a id='habilitar' href='Opciones/habilitarServicio.php?ID=".$ejecutar_lista_servicios['id_servicio']."'>
                      <span class='icon-lock-rounded'></span>
                      <div class='mostrar'><p>Habilitar</p></div>
                      </a>
                      <a id='Editar' href='javascript:enviarDS();'><span class='icon-document-edit'></span><div class='mostrar'><p>Editar</p></div></a>
                      <form name='edicionServicio' action='index.php#editarServicio' method='GET' style='display:none;'>
                      <input name='id_oserv' type='hidden' value='".$ejecutar_lista_servicios['id_servicio']."'/>
                      </form>
                      <a id='Eliminar' href='Opciones/eliminarServicio.php?ID=".$ejecutar_lista_servicios['id_servicio']."'>
                      <span class='icon-trash-can'></span>
                      <div class='mostrar'><p>Eliminar</p></div>
                      </a>
                      </td>";
                     }
                     if ($ejecutar_lista_servicios['estado']==3) {
                    }

                      ?>
                 </tr>
                 <?php
                 }
                }
                ?>
                 </tbody>
                 </table>
                 </div>
								<p></p>
								<p></p>
							</article>
							<article id="nuevoPaciente">
								<h2 class="major">Registrar Paciente</h2>
								<form method="post" action="registrarPaciente.php">
									<div class="field half first">
										<input type="text" name="name" id="name" placeholder="Nombres" required/>
										<input type="text" name="apes" id="apes" placeholder="Apellidos" required/>
										<input type="number" name="edad" id="edad" placeholder="Edad"  required/>
									</div>
									<div class="field half">
										<label for="genero">Genero</label>
										Masculino: <input type="radio" name="genero" id="genero" value="Masculino" oninvalid="this.setCustomValidity('Ups te olvidaste marcar un genero..')" onclick="clearValidity();" required  />
										Femenino: <input type="radio" name="genero" id="genero" value="Femenino" onclick="clearValidity()" />
									</div>
									<ul class="actions">
										<li><input type="reset" value="Restaurar" /> <input type="submit" value="Registrar" class="button special"/></li>
									</ul>
								</form>
							</article>
              <article id="nuevoServicio">
								<h2 class="major">Registrar Tratamiento</h2>
								<form method="post" action="agregarServicio.php">
									<div class="field half first">
										<input type="text" name="nombreServicio"  placeholder="Nombre del Tratamiento" required/>
										<input type="number" name="costoServicio"  placeholder="Costo del Tratamiento en Bs." required/>
									</div>
									<ul class="actions">
										<li><input type="reset" value="Restaurar" /></li>
										<li><input type="submit" value="Registrar" class="button special"></li>
									</ul>
								</form>
							</article>
              <article id="nuevoHistorial">
								<h2 class="major">Nuevo Historial</h2>
								<form method="post" action="nuevHistorial.php">
                  <div class="field half first">
                    <div class="box">
                    <label for="SeleccionarPacientes">Pacientes</label>
                    <div class="select-wrapper">
									<select name="SeleccionarPacientes">
                    <?php
                    $pacientes="SELECT id_paciente,
    					        nombres_paciente,
    					        apellidos_paciente,
                      paciente.estado
    					        FROM paciente, usuario
    					        WHERE paciente.id_usuario=usuario.id_usuario
                      AND paciente.id_usuario=$login_session_usuario
    					        ";
                   $ejecuto_pacientes=mysql_query($pacientes,$bd);
 					         while ($slpaciente=mysql_fetch_array($ejecuto_pacientes))
 					         {
                     if ($slpaciente['estado']==1) {

 					           ?>
                     <option><?=$slpaciente['nombres_paciente']?>&nbsp;&nbsp;<?=$slpaciente['apellidos_paciente']?></option>
                  <?php
                    }
                  }
                   ?>
									</select>
                </div>
                <br>
                  <label for="fechaComienzo">Fecha Inicio</label>
                  <input type="date" name="fechaComienzo" min="2014-09-08" max="2018-09-08" value="2015-02-24">
                  </div>
                  </div>
                  <div class="field half">
                    <div class="box">
                    <label for="SeleccionarTratamientos">Tratamientos</label>
                    <div class="select-wrapper">
                  <select name="SeleccionarTratamientos">
                    <?php
                    $servs="SELECT id_servicio,
                      nombre_servicio,
                      costo_servicio,
                      servicio.estado
                      FROM servicio, usuario
                      WHERE servicio.id_usuario=usuario.id_usuario
                      AND servicio.id_usuario=$login_session_usuario
                      ";
                    $ejecuto_servs=mysql_query($servs,$bd);
 					         while ($listaServicios=mysql_fetch_array($ejecuto_servs))
 					         {
                     if ($listaServicios['estado']==1) {
 					           ?>
                     <option><?=$listaServicios['nombre_servicio']?>&nbsp;&nbsp;<?=$listaServicios['costo_servicio']?>&nbsp;bs.</option>

                  <?php
                  }
                }
                   ?>
                   </select>

                 </div><br>
                 <label for="fechaConclusion">Fecha Conclusion Aprox</label>
                 <input type="date" name="fechaConclusion" min="2014-09-08" max="2018-09-08" value="2015-02-24">
                 </div>
               </div>
               <div class="field">
                 <label for="grama">ODONTOGRAMA</label>
                 <div name="grama" class="table-wrapper">
 								<table>
                   <th>18</th>
                   <th>17</th>
                   <th>16</th>
                   <th>15</th>
                   <th>14</th>
                   <th>13</th>
                   <th>12</th>
                   <th>11</th>
                   <th>21</th>
                   <th>22</th>
                   <th>23</th>
                   <th>24</th>
                   <th>25</th>
                   <th>26</th>
                   <th>27</th>
                   <th>28</th>
 								  <tr>
 								    <td><input type="checkbox" name="18" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/18.png" alt=""></span> </a></td>
 								    <td><input type="checkbox" name="17" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/17.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="16" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/16.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="15" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/15.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="14" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/14.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="13" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/13.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="12" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/12.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="11" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/11.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="21" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/21.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="22" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/22.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="23" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/23.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="24" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/24.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="25" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/25.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="26" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/26.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="27" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/27.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="28" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/28.png" alt=""></span></a></td>
 								  </tr>
                   <th>48</th>
                   <th>47</th>
                   <th>46</th>
                   <th>45</th>
                   <th>44</th>
                   <th>43</th>
                   <th>42</th>
                   <th>41</th>
                   <th>31</th>
                   <th>32</th>
                   <th>33</th>
                   <th>34</th>
                   <th>35</th>
                   <th>36</th>
                   <th>37</th>
                   <th>38</th>
 								  <tr>
 								    <td><input type="checkbox" name="48" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/48.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="47" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/47.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="46" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/46.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="45" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/45.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="44" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/44.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="43" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/43.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="42" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/42.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="41" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/41.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="31" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/31.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="32" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/32.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="33" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/33.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="34" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/34.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="35" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/35.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="36" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/36.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="37" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/37.png" alt=""></span></a></td>
 								    <td><input type="checkbox" name="38" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/38.png" alt=""></span></a></td>
 								  </tr>
 								</table>
                 </div>
                 </div>
               <ul class="actions">
                 <li><input type="submit" value="Registrar" class="button special"/></li>
                 <li><input type="reset" value="Restaurar" /></li>
               </ul>
								</form>
							</article>
              <article id="editarServicio">
                <?php
                $id_serv=$_GET["id_oserv"];
                	$Consulta = "SELECT	id_servicio,
                				nombre_servicio,
                        costo_servicio
                			FROM	servicio
                			WHERE	id_servicio = $id_serv";
                			$Ejecutar_Consulta	= MySql_Query($Consulta, $bd);
                			$Array= MySql_Fetch_Array($Ejecutar_Consulta);
                ?>
                 <h2 class="major">Editar Tratamiento</h2>
                <form action="Opciones/actualizarServicio.php" method="GET">
                <div class="field half first">
                <label for="N1">Tratamiento:</label>
                <input Name="N1" type="text" value="<?=$Array['nombre_servicio']?>" required>
                </div>
                <div class="field half">
                 <label for="A1">Precio:</label>
                 <input Name="A1" type="number" value="<?=$Array['costo_servicio']?>" required>
                </div>
                <ul class="actions">
                <li><input class="button special" type="submit" value="Actualizar"> <input type="reset"  value="Restablecer"></li>
                <li><a href="#tratamientos" class="button">Cancelar</a></li>
                <input name="ID1" type="hidden" value="<?=$Array['id_servicio'];?>"/>
                </ul>
                </form>
              </article>
              <article id="VerHistorial">
                <h2 class="major">Historial</h2>
                <div class="table-wrapper">
                  <table>
                    <thead>
                      <th>Paciente</th>
                      <th>Tratamiento&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th>Fecha Inicial&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th>Fecha Conclusion Estimada</th>
                    </thead>
                  <tbody>

                <?php
                $consultarTratamiento="SELECT paciente,
                tratamiento,
                fecha_inicio,
                fecha_consulta
                FROM tratamiento, usuario
                WHERE tratamiento.id_usuario=usuario.id_usuario
                AND tratamiento.id_usuario=$login_session_usuario
                ";
                $ejecucionTratamiento=mysql_query($consultarTratamiento,$bd);
                while ($listarTratamiento=MySql_Fetch_Array($ejecucionTratamiento)) {
                 ?><tr>
                 <td><?=$listarTratamiento['paciente']?></td>
                 <td><?=$listarTratamiento['tratamiento']?></td>
                 <td><?=$listarTratamiento['fecha_inicio']?></td>
                 <td><?=$listarTratamiento['fecha_consulta']?></td>

</tr>
                 <?php
               }
               ?>

             </tbody>
               </table>
               </div>
               <label for="">ODONTOGRAMA</label>
               <div class="table-wrapper">
                 <?php
                 $consultarDientes="SELECT diente18,
                 diente17,
                 diente16,
                 diente15,
                 diente14,
                 diente13,
                 diente12,
                 diente11,
                 diente21,
                 diente22,
                 diente23,
                 diente24,
                 diente25,
                 diente26,
                 diente27,
                 diente28,
                 diente48,
                 diente47,
                 diente46,
                 diente45,
                 diente44,
                 diente43,
                 diente42,
                 diente41,
                 diente31,
                 diente32,
                 diente33,
                 diente34,
                 diente35,
                 diente36,
                 diente37,
                 diente38
                 FROM dientes,tratamiento,odontograma,usuario
                 WHERE dientes.id_odontograma=odontograma.id_odontograma
                 AND odontograma.id_odontograma=tratamiento.id_odontograma
                 AND tratamiento.id_usuario=usuario.id_usuario
                 AND usuario.id_usuario=$login_session_usuario
                 AND tratamiento.id_usuario=$login_session_usuario
                 ";
                 $ejecucionDientes=mysql_query($consultarDientes,$bd);
                 while ($listarDientes=MySql_Fetch_Array($ejecucionDientes)) {
                  ?>
                  <table>
                    <thead>


                    <tr>


                    <?php if ($listarDientes['diente18']==1) {?>
                    <th>18</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente17']==1) {?>
                    <th>17</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente16']==1) {?>
                    <th>16</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente15']==1) {?>
                    <th>15</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente14']==1) {?>
                    <th>14</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente13']==1) {?>
                    <th>13</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente12']==1) {?>
                    <th>12</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente11']==1) {?>
                    <th>11</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente21']==1) {?>
                    <th>21</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente22']==1) {?>
                    <th>22</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente23']==1) {?>
                    <th>23</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente24']==1) {?>
                    <th>24</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente25']==1) {?>
                    <th>25</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente26']==1) {?>
                    <th>26</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente27']==1) {?>
                    <th>27</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente28']==1) {?>
                    <th>28</th>
                    <?php }  ?>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                      <?php if ($listarDientes['diente18']==1) {
                      ?>
                      <td><input type="checkbox" name="18" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/18.png" alt=""></span> </a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente17']==1) {
                      ?>
                      <td><input type="checkbox" name="17" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/17.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente16']==1) {?>
                      <td><input type="checkbox" name="16" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/16.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente15']==1) {?>
                      <td><input type="checkbox" name="15" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/15.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente14']==1) {?>
                      <td><input type="checkbox" name="14" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/14.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente13']==1) {?>
                      <td><input type="checkbox" name="13" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/13.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente12']==1) {?>
                      <td><input type="checkbox" name="12" value="1" checked><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/12.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente11']==1) {?>
                      <td><input type="checkbox" name="11" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/11.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente21']==1) {?>
                      <td><input type="checkbox" name="21" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/21.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente22']==1) {?>
                      <td><input type="checkbox" name="22" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/22.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente23']==1) {?>
                      <td><input type="checkbox" name="23" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/23.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente24']==1) {?>
                      <td><input type="checkbox" name="24" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/24.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente25']==1) {?>
                      <td><input type="checkbox" name="25" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/25.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente26']==1) {?>
                      <td><input type="checkbox" name="26" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/26.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente27']==1) {?>
                      <td><input type="checkbox" name="27" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/27.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente28']==1) {?>
                      <td><input type="checkbox" name="28" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/28.png" alt=""></span></a></td>
                      <?php }  ?>

                    </tr>
                    </tbody>
                    <thead>
                      <tr>


                    <?php if ($listarDientes['diente48']==1) {?>
                    <th>48</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente47']==1) {?>
                    <th>47</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente46']==1) {?>
                    <th>46</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente45']==1) {?>
                    <th>45</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente44']==1) {?>
                    <th>44</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente43']==1) {?>
                    <th>43</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente42']==1) {?>
                    <th>42</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente41']==1) {?>
                    <th>41</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente31']==1) {?>
                    <th>31</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente32']==1) {?>
                    <th>32</th>
                    <?php }
                    ?>
                    <?php if ($listarDientes['diente33']==1) {?>
                    <th>33</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente34']==1) {?>
                    <th>34</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente35']==1) {?>
                    <th>35</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente36']==1) {?>
                    <th>36</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente37']==1) {?>
                    <th>37</th>
                    <?php }  ?>
                    <?php if ($listarDientes['diente38']==1) {?>
                    <th>38</th>
                    <?php }  ?>
                  </tr>
                </thead>
                      <?php if ($listarDientes['diente48']==1) {?>
                      <td><input type="checkbox" name="48" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/48.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente47']==1) {?>
                      <td><input type="checkbox" name="47" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/47.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente46']==1) {?>
                      <td><input type="checkbox" name="46" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/46.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente45']==1) {?>
                      <td><input type="checkbox" name="45" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/45.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente44']==1) {?>
                      <td><input type="checkbox" name="44" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/44.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente43']==1) {?>
                      <td><input type="checkbox" name="43" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/43.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente42']==1) {?>
                      <td><input type="checkbox" name="42" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/42.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente41']==1) {?>
                      <td><input type="checkbox" name="41" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/41.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente31']==1) {?>
                      <td><input type="checkbox" name="31" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/31.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente32']==1) {?>
                      <td><input type="checkbox" name="32" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/32.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente33']==1) {?>
                      <td><input type="checkbox" name="33" value="1"><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/33.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente34']==1) {?>
                      <td><input type="checkbox" name="34" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/34.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente35']==1) {?>
                      <td><input type="checkbox" name="35" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/35.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente36']==1) {?>
                      <td><input type="checkbox" name="36" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/36.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente37']==1) {?>
                      <td><input type="checkbox" name="37" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/37.png" alt=""></span></a></td>
                      <?php }  ?>
                      <?php if ($listarDientes['diente38']==1) {?>
                      <td><input type="checkbox" name="38" value="1" checked=""><a href="#nuevoHistorial"><span class="image"><img src="../Multimedia/Imagenes/Dientes Grama1/38.png" alt=""></span></a></td>
                      <?php }  ?>
                    </tr>
                  </table>
                  <?php
                }
                ?>
               </div>
              </article>
					</div>
					<footer id="footer">
						<p class="copyright">Comunidad Odontologica "Dentistas Libres"</p>
            <p class="copyright">Diseño y Desarrollo:Jorge Augusto Rodriguez con la colaboracion de HTML5UP</p>
            <p class="copyright">&copy;&nbsp;Todos los Derechos Reservados</p>
					</footer>
			</div>
			<div id="bg"></div>
			<script src="../Multimedia/Scripts Java/jquery.min.js"></script>
			<script src="../Multimedia/Scripts Java/skel.min.js"></script>
			<script src="../Multimedia/Scripts Java/util.js"></script>
			<script src="../Multimedia/Scripts Java/main.js"></script>
	</body>
</html>
