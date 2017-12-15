<?php
$form = array(
	'name' => 'form_reto'
	);

$COD_Reto = array(
	'name' => 'COD_Reto',
	'placeholder' => 'Código de Reto',
	'maxlength' => 10,
	'size' => 20
	);

$DESC_Reto = array(
	'name' => 'DESC_Reto',
	'placeholder' => 'Descripción de Reto',
	'maxlength' => 10,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Reto/nuevo_reto',$form);?>

	<?php echo form_label('Código de Reto: ','COD_Reto'); ?>
	<?php echo form_input($COD_Reto); ?>
	<br>

	<?php echo form_label('Descripción de Reto: ','DESC_Reto'); ?>
	<?php echo form_input($DESC_Reto); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>