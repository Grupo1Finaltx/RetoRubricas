<?php

// Vista que m


$form = array(
	'name' => 'form_centro'
	);
$url = "'".base_url()."index.php/Centro'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$COD_Centro = array(
	'name' => 'COD_Centro',
	'value' => $centros->result()[0]->COD_Centro,
	'placeholder' => 'Código de Centro',
	'maxlength' => 10,
	'size' => 20
	);
$DESC_Centro = array(	
	'name' => 'DESC_Centro',
	'value' => $centros->result()[0]->DESC_Centro,
	'placeholder' => 'Descripción de Centro',
	'maxlength' => 100,
	'size' => 30
	);
?>

<div>
	<?php echo form_open('Centro/actualizar/'.$centros->result()[0]->ID_Centro,$form);?>
	<?php echo form_label('Código de Centro: ','COD_Centro'); ?>
	<?php echo form_input($COD_Centro); ?>
	<br>
	<?php echo form_label('Descripción de Centro: ','DESC_Centro'); ?>
	<?php echo form_input($DESC_Centro); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

