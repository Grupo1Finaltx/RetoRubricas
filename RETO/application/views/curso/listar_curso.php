<div>
<?php
		printf('Gestión de CURSOS');
		if ($cursos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primercurso = $cursos->result()[0];
			foreach ($primercurso as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($cursos->result() as $curso) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$curso->ID_Curso,$curso->ID_Curso);
				foreach ($curso as $detalle) {
					printf('<td>
					<a href="Curso/editar/%s">%s</a>
					</td>',$curso->ID_Curso,$detalle);
				}
				$url = "'curso/borrar/".$curso->ID_Curso."'"; 
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