<div>
<?php
		printf('Gestión de CENTROS');
		if ($centros){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primercentro = $centros->result()[0];
			foreach ($primercentro as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($centros->result() as $centro) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$centro->ID_Centro,$centro->ID_Centro);
				foreach ($centro as $detalle) {
					printf('<td>
					<a href="Centro/editar/%s">%s</a>
					</td>',$centro->ID_Centro,$detalle);
				}
				$url = "'centro/borrar/".$centro->ID_Centro."'"; 
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