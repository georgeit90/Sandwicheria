<div id="templatemo_main">
	<div id="templatemo_content" class="left">
		<div class="content_wrapper content_mb_30">

			<h2>Asignar Horarios</h2>
			<div id="contact_form" class="col_2 left">

				<form method="post" name="Horario" id="FormNombramiento" action="#">
                     <?php
                    	if(isset($_GET['respuesta'])){
                        	if($_GET['respuesta']==1){
                            	echo "<script type='text/javascript'>alert('Datos Guardados')</script>";
                            }
							if($_GET['respuesta']==2){
                            	echo "<script type='text/javascript'>alert('Datos Actualizados')</script>";
                            }
							if($_GET['respuesta']==3){
                            	echo "<script type='text/javascript'>alert('Datos Imcompletos')</script>";
                            }
						}
                    ?>
                      <div class="col_3">
						<label for="Empleado">Empleado:</label>
                            <?php
                           
								require_once('Empleado.inc');
								
								$mysqli = new mysqli("localhost", "root", "", "diagrama");
								$resultado = $mysqli->query("Select Cedula, CONCAT(Nombre,' ',Apellido1,' ',Apellido2) AS NombreC from T_Empleado where Estado = 1;");
								
								echo "<select name='Empleado' id='Empleado'>";
								while ($emp = $resultado->fetch_assoc()) 
								{ 
									echo "<option value='".$emp[Cedula]."'>".$emp[NombreC]."</option>"; 
								} 
								echo "</select>";
							?>
                      </div>

					<div class="col_3 no_margin_right">

						<label for="Empleado">Plaza:</label>
                            <?php
                           
								require_once('Plaza.inc');
								
								$mysqli = new mysqli("localhost", "root", "", "diagrama");
								$resultado = $mysqli->query("Select id_Plaza, Descripcion from T_Plaza where Estado = 1;");
								
								echo "<select name='Plaza' id='Plaza'>";
								while ($Plaza = $resultado->fetch_assoc()) 
								{ 
									echo "<option value='".$Plaza[id_Plaza]."'>".$Plaza[Descripcion]."</option>"; 
								} 
								echo "</select>";
							?>
                        </div>
					<div class="clear h10">
						<div class="col_3">
							<label for="descripcion">Día:</label>
                      <?php
					include('ICalendario.php');
					
					$numero_mes = date("n");
					$numero_Año = date("Y");
					$cantidad_dias = evaluar_mes($numero_mes,true);
					$nombre_mes = evaluar_mes($numero_mes,false);
					
					$timestamp = mktime(0,0,0,$numero_mes,1,$numero_Año);
					$saltear = date("w",$timestamp);
					$cantidad_dias += $saltear;
					
					$filas = ceil($cantidad_dias/7);
					$cantidad_celdas = $filas*7;
					$diferencia = $cantidad_celdas-$cantidad_dias;
					?>
            	<H2>
								<table border='1' cellspacing='2' cellpadding='2'>
									<tr>
										<th>-</th>
										<th colspan="5">
				<?php 
				echo $nombre_mes." ".$numero_Año; 
				?></th>
										<th>+</th>
									</tr>
									<tr>
										<th>D</th>
										<th>L</th>
										<th>M</th>
										<th>X</th>
										<th>J</th>
										<th>V</th>
										<th>S</th>
									</tr>
									<tr>
					<?php
					for($i = 1; $i <= $cantidad_dias; $i++){
						if($i <= $saltear){
							echo '<td></td>';
						}else{
						$num_dia = $i-$saltear;
						echo "<td><A href='#' onClick='mostrar(".$num_dia.")'>".$num_dia."</A></td>";
						}
						if($i % 7 == 0){
							echo '</tr><tr>';
						}
					} 
					
					for($i = 1; $i <= $diferencia; $i++){
						echo '<td></td>';
					} 
					?>
                    </tr>
								</table>
							</H2>
						</div>
					</div>
					<div class="col_3 no_margin_right">

						<label for="Empleado">Horario:</label>
                            <?php
                           
								require_once('Horario.inc');
								
								$mysqli = new mysqli("localhost", "root", "", "diagrama");
								$resultado = $mysqli->query("Select id_Horario, Descripcion from T_Horario where Estado = 1;");
								
								echo "<select name='Horario' id='Horario'>";
								while ($Horario = $resultado->fetch_assoc()) 
								{ 
									echo "<option value='".$Horario[id_Horario]."'>".$Horario[Descripcion]."</option>"; 
								} 
								echo "</select>";
							?>
                        </div>
					<div class="clear h10"></div>

					<div class="clear"></div>
					<p>
						<input type="submit" name="Submit" value="Aceptar"
							class="submit_btn left" onclick="CrearHorario()" />
					</p>
					<p>
						<input type="submit" name="Reset" value="Cancelar"
							class="submit_btn right" onclick="Limpiar()" />
					</p>
				</form>

			</div>
		</div>

		<div class="content_wrapper">
			<h2>Informaci�n de Horarios</h2>
			<div class="img_border img_border_b" align='center'>
				<form id='Form2' name='grid' method="post" align='center'></form>
			</div>
		</div>
	</div>
    <?php 	
     if(isset($this->menu))
   	require $this->menu;
    ?>

	<div class="clear"></div>
</div>
</div>
<!-- END of templatemo_wrapper -->

