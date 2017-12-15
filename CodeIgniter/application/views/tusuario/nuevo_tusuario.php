<?php
$form = array(
	'name' => 'form_tusuario'
	);
$COD_Curso = array(
	'name' => 'DESC_TUsuario',
	'placeholder' => 'Descripción',
	'maxlength' => 50,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Tusuario/nuevo_tusuario',$form);?>
	<?php echo form_label('Descripción de tipo de usuario: ','DESC_TUsuario'); ?>
	<?php echo form_input($COD_Curso); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>