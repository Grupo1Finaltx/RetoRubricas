<div>
<?php
		printf('Gestión de RETOS');
		if ($retos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerreto = $retos->result()[0];
			foreach ($primerreto as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($retos->result() as $reto) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$reto->ID_Reto,$reto->ID_Reto);
				foreach ($reto as $detalle) {
					printf('<td>
					<a href="reto/editar/%s">%s</a>
					</td>',$reto->ID_Reto,$detalle);
				}
				$url = "'reto/borrar/".$reto->ID_Reto."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
		}
		else{
				printf('No hay Registros');
		}
		?>		
</div>