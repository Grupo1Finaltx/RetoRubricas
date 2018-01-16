
<h1>Sube los usuarios mediante un archivo CSV</h1>
 <a href="<?php echo base_url();?>archivos/plantilla_usuarios.csv" download> Descargar Plantilla </a>
<form action="Usuario/usuarios_csv" enctype="multipart/form-data" method="post">
   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
   <input name="enviar" type="submit" value="Importar" />
</form>

<?php 
$form = array(
	'name' => 'form_usuario'
	);
$User = array(
	'name' => 'User',
	'placeholder' => 'Usuario',
	'maxlength' => 10,
	'size' => 20
	);

$Password = array(
	'name' => 'Password',
	'placeholder' => 'Contraseña',
	'maxlength' => 10,
	'size' => 20
	);

$Nombre = array(
	'name' => 'Nombre',
	'placeholder' => 'Nombre',
	'maxlength' => 10,
	'size' => 20
	);

$Apellidos = array(
	'name' => 'Apellidos',
	'placeholder' => 'Apellidos',
	'maxlength' => 10,
	'size' => 20
	);

$Email = array(
	'name' => 'Email',
	'placeholder' => 'Correo Electrónico',
	'maxlength' => 10,
	'size' => 20
	);

$Dni = array(
	'name' => 'Dni',
	'placeholder' => 'DNI',
	'maxlength' => 10,
	'size' => 20
	);

if ($centros) {
	$ID_Centro = array();
	foreach ($centros->result() as $key) {
		$ID_Centro[$key->ID_Centro] = $key->DESC_Centro;
	}
}


if ($tusuarios) {
	$ID_TUsuario = array();
	foreach ($tusuarios->result() as $key) {
		$ID_TUsuario[$key->ID_TUsuario] = $key->DESC_TUsuario;
	}
}
 ?>


<h1>Crear usuario manualmente</h1>
 	<?php echo form_open('Usuario/nuevo_usuario',$form);?>
	<?php echo form_label('Centro: ','COD_Centro'); ?>
	<?php echo form_dropdown('ID_Centro',$ID_Centro,1); ?>
	<br>

	<?php echo form_label('Tipo de usuario: ','ID_TUsuario'); ?>
	<?php echo form_dropdown('ID_TUsuario', $ID_TUsuario,1); ?>
	<br>
	<?php echo form_label('Usuario: '); ?>
	<?php echo form_input($User); ?>
	<br>

	<?php echo form_label('Contraseña: '); ?>
	<?php echo form_password($Password); ?>
	<br>
	<?php echo form_label('Nombre: '); ?>
	<?php echo form_input($Nombre); ?>
	<br>
	<?php echo form_label('Apellidos: '); ?>
	<?php echo form_input($Apellidos); ?>
	<br>
	<?php echo form_label('Correo Electrónico: '); ?>
	<?php echo form_input($Email); ?>
	<br>
	<?php echo form_label('DNI: '); ?>
	<?php echo form_input($Dni); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>