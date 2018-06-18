<?php 
	require 'conexion.php';
	$tag = $_POST['tag'];

	if(isset($tag) && $tag!==""){
		if($tag == 'registrar'){
			$nuevo;
			$saldo= $_POST['saldo'];
			$operacion = $_POST['num_operacion'];
			$servicio = $_POST['servicio'];
			$tipo = $_POST['transaccion'];
			$monto = $_POST['monto'];
			$fecha = $_POST['fecha'];

			if($monto>0){
				switch ($tipo) {
						case 'D':
							if($saldo>$monto){
								$nuevo = $saldo - $monto;
								$registrar_tra = $conexion -> prepare("insert into operacion(num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual) values('".$operacion."','".$servicio."','".$tipo."','".$monto."','".$fecha."','".$saldo."','".$nuevo."')");
								$registrar_tra ->execute();
								print true;
							}else{
								print false;
							}
							break;
						case 'P':
							if($saldo>$monto){
								$nuevo = $saldo - $monto;
								$registrar_tra = $conexion -> prepare("insert into operacion(num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual) values('".$operacion."','".$servicio."','".$tipo."','".$monto."','".$fecha."','".$saldo."','".$nuevo."')");
								$registrar_tra ->execute();
								print true;
							}else{
								print false;
							}
							break;
						case 'C':
								$nuevo = $saldo + $monto;
								$registrar_tra = $conexion -> prepare("insert into operacion(num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual) values('".$operacion."','".$servicio."','".$tipo."','".$monto."','".$fecha."','".$saldo."','".$nuevo."')");
								$registrar_tra ->execute();
								print true;
							break;					
						case 'R':
							$nuevo = $saldo + $monto;
							$registrar_tra = $conexion -> prepare("insert into operacion(num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual) values('".$operacion."','".$servicio."','".$tipo."','".$monto."','".$fecha."','".$saldo."','".$nuevo."')");
							$registrar_tra ->execute();
							print true;
							break;
						}
			}else{
				print false;
			}
			
		}

		if($tag == 'buscarfecha'){
			$find_fecha = $_POST["fecha-find"];

			$buscar_fecha = $conexion ->prepare("select num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual from operacion 
				where fecha='".$find_fecha."'");
			$buscar_fecha -> execute();
			$resul_fecha = $buscar_fecha ->fetch_All();

			?>
			<table class="table-kasnet">
		 		<thead>
		 			<tr>
			 			<th>N° OPERACION</th>
			 			<th>TIPO OPERACION</th>
			 			<th>NOMBRE SERVICIO</th>
			 			<th>MONTO OPERACION</th>
			 			<th>FECHA</th>
			 			<th>SALDO ANTERIOR</th>
			 			<th>SALDO POS</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			<?php 
		 				foreach ($resul_fecha as $fila) {
		 					$logica = $fila["logica"];
		 					switch ($logica) {
		 						case 'D':
		 							$logica = "Deposito";
		 							break;
		 						case 'R':
		 							$logica = "Retiro";
		 							break;
		 						case 'P':
		 							$logica = "Pago";
		 							break;
		 						case 'C':
		 							$logica = "Deposito Papa";
		 							break;
		 					}
		 					print "<tr class='color-fila'>";
		 						print "<td>".$fila["num_operacion"]."</td>";
		 						print "<td>".$logica."</td>";
		 						print "<td>".$fila["nom_servicio"]."</td>";
		 						print "<td>".$fila["monto"]."</td>";
		 						print "<td>".$fila["fecha"]."</td>";
		 						print "<td>".$fila["saldo_antes"]."</td>";
		 						print "<td>".$fila["saldo_actual"]."</td>";
		 					print "</tr>";
		 				}
		 			 ?>
		 		</tbody>
	 		</table>
<?php 
		print true;
	}else{
		print false;
	}



	}
 ?>