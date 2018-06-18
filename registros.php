<?php 
	require 'conexion.php';
	$color = " ";
	$con_tran = $conexion ->prepare("select num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual from operacion");
	$con_tran ->execute();

	$resul_con = $con_tran->fetchAll();

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
 				foreach ($resul_con as $fila) {
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