<?php

// Muestra el formulario donde creas un nuevo centro

$form = array(
	'name' => 'form_centro'
	);
$COD_Centro = array(
	'name' => 'COD_Centro',
	'placeholder' => 'Código de Centro',
	'maxlength' => 10,
	'size' => 20
	);
$DESC_Centro = array(	
	'name' => 'DESC_Centro',
	'placeholder' => 'Descripción de Centro',
	'maxlength' => 100,
	'size' => 30
	);
?>

<div>
	<?php echo form_open('Centro/nuevo_centro',$form);?>
	<?php echo form_label('Código de Centro: ','COD_Centro'); ?>
	<?php echo form_input($COD_Centro); ?>
	<br>
	<?php echo form_label('Descripción de Centro: ','DESC_Centro'); ?>
	<?php echo form_input($DESC_Centro); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

