<?php
$form = array(
	'name' => 'form_usuario'
	);
$url = "'".base_url()."index.php/Usuario'";
$js_cancel_button = 'onClick="location.href='.$url.'"';


$User = array(
	'name' => 'User',
	'value' => $usuario->result()[0]->User,
	'placeholder' => 'Nombre de usuario',
	'maxlength' => 50,
	'size' => 20
	);

$Password = array(
	'name' => 'Password',
	'placeholder' => 'Contraseña',
	'maxlength' => 50,
	'size' => 20
	);

$Nombre = array(
	'name' => 'Nombre',
	'value' => $usuario->result()[0]->Nombre,
	'placeholder' => 'Nombre',
	'maxlength' => 50,
	'size' => 20
	);

$Apellidos = array(
	'name' => 'Apellidos',
	'value' => $usuario->result()[0]->Apellidos,
	'placeholder' => 'Apellidos',
	'maxlength' => 50,
	'size' => 20
	);

$Email = array(
	'name' => 'Email',
	'value' => $usuario->result()[0]->Email,
	'placeholder' => 'Correo electronico',
	'maxlength' => 50,
	'size' => 20
	);

$Dni = array(
	'name' => 'Dni',
	'value' => $usuario->result()[0]->Dni,
	'placeholder' => 'DNI',
	'maxlength' => 50,
	'size' => 20
	);


if ($centros){
	$ID_Centro = array();
	foreach ($centros->result() as $centro) {
		$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
	}	
}

if ($tusuarios){
	$ID_TUsuario = array();
	foreach ($tusuarios->result() as $tusuario) {
		$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario;
	}	
}


?>

<div>
	<?php echo form_open('Usuario/actualizar/'.$usuario->result()[0]->ID_Usuario,$form);?>
	<?php echo form_label('Centro: '); ?>
	<?php echo form_dropdown('ID_Centro', $ID_Centro, $usuario->result()[0]->ID_Centro); ?>
	<br>
	<?php echo form_label('Tipo de usuario: '); ?>
	<?php echo form_dropdown('ID_TUsuario', $ID_TUsuario, $usuario->result()[0]->ID_TUsuario); ?>
	<br>
	<?php echo form_label('Usuario: '); ?>
	<?php echo form_input($User); ?>
	<br>
	<?php echo form_label('Contraseña: '); ?>
	<?php echo form_password($Password); ?>
	<br>
	<?php echo form_label('Nombre'); ?>
	<?php echo form_input($Nombre); ?>
	<br>
	<?php echo form_label('Apellidos'); ?>
	<?php echo form_input($Apellidos); ?>
	<br>
	<?php echo form_label('Correo electronico'); ?>
	<?php echo form_input($Email); ?>
	<br>
	<?php echo form_label('DNI'); ?>
	<?php echo form_input($Dni); ?>
	<br>




	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

