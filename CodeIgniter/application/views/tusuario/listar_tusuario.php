<div>
<?php
		printf('Gestión de tusuarios');
		if ($tusuarios){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primertusuario = $tusuarios->result()[0];
			foreach ($primertusuario as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($tusuarios->result() as $tusuario) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$tusuario->ID_TUsuario,$tusuario->ID_TUsuario);
				foreach ($tusuario as $detalle) {
					printf('<td>
					<a href="tusuario/editar/%s">%s</a>
					</td>',$tusuario->ID_TUsuario,$detalle);
				}
				$url = "'tusuario/borrar/".$tusuario->ID_TUsuario."'"; 
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