

<?php 

$form = array(
	'name' => 'form_usuario_filtros'
	);


if ($centros){
	$ID_Centro = array();
	$ID_Centro[0]="Selecciona centro";
	foreach ($centros->result() as $centro) {
		$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
	}	
} 
echo form_dropdown('ID_Centro', $ID_Centro,'','id="select_usuario_centro"');
?>




<table id="tabla_usuarios" border="1">
	<caption>Gestión de usuarios</caption>
	<thead>
		<tr>
			<th>ID usuario</th>
			<th>Centro</th>
			<th>Tipo de usuario</th>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Email</th>
			<th>DNI</th>
			<th colspan="2">Acciones</th>
		</tr>
	</thead>
<tbody>


<?php 
if ($usuarios) {
	foreach ($usuarios->result() as $key){
		echo '<tr class="contenido">';
		echo'<td>'.$key->ID_Usuario.'</td>';
		echo'<td>'.$key->DESC_Centro.'</td>';
		echo'<td>'.$key->DESC_TUsuario.'</td>';
		echo'<td>'.$key->User.'</td>';
		echo'<td>'.$key->Nombre.'</td>';
		echo'<td>'.$key->Apellidos.'</td>';
		echo'<td>'.$key->Email.'</td>';
		echo'<td>'.$key->Dni.'</td>';
		$urleditar = "'usuario/editar/".$key->ID_Usuario."'"; 
			$urleliminar = "'usuario/borrar/".$key->ID_Usuario."'"; 
			printf('<td><input type="button" onclick="location.href=%s" value="Editar"></td>',$urleditar);
			printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$urleliminar);
		echo '</tr>';
	}
}

 ?>

</tbody>
</table>





<script>
	
		$("#select_usuario_centro").change(function(){
		$(".contenido").remove();

	    $.post({url: "<?php echo base_url(); ?>index.php/Usuario/usuarios_centro_json",
	        datatype:"json",
	        data:{'ID_Centro':$("#select_usuario_centro").val()},
	        success: function(devuelto){


	        var array=JSON.parse(devuelto);
	        for (var i = 0; i < array.length; i++) {
	        var url = "Usuario/borrar/"+array[i]['ID_Usuario']; 
			var url_editar="Usuario/editar/"+array[i]['ID_Usuario'];
	        $( "#tabla_usuarios" ).append( "<tr class='contenido'><td>"+array[i]['ID_Usuario']+"</td><td>"+array[i]['DESC_Centro']+"</td><td>"+array[i]['DESC_TUsuario']+"</td><td>"+array[i]['User']+"</td><td>"+array[i]['Nombre']+"</td><td>"+array[i]['Apellidos']+"</td><td>"+array[i]['Email']+"</td><td>"+array[i]['Dni']+"</td><td colspan='2'><a href="+url+"><input type='button' value='Borrar'></a><a href="+url_editar+"><input type='button' value='Editar'></a></td></tr>" );
	        } 

	    }});
	});
</script>