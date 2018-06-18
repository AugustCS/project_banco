<?php 
	require 'conexion.php';
	$tag = $_POST['tag'];

	if(isset($tag) && $tag!==""){
		if($tag == 'buscar-fecha'){
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