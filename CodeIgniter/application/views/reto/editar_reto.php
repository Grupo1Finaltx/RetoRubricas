<?php
$form = array(
	'name' => 'form_reto'
	);
$url = "'".base_url()."index.php/Reto'";
$js_cancel_button = 'onClick="location.href='.$url.'"';

$COD_Reto = array(
	'name' => 'COD_Reto',
	'value' => $retos->result()[0]->COD_Reto,
	'placeholder' => 'Código de Reto',
	'maxlength' => 10,
	'size' => 20
	);

$DESC_Reto = array(
	'name' => 'DESC_Reto',
	'value' => $retos->result()[0]->DESC_Reto,
	'placeholder' => 'Descripción de Reto',
	'maxlength' => 10,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Reto/actualizar/'.$retos->result()[0]->ID_Reto,$form);?>
	<?php echo form_label('Código de Reto: ','COD_Reto'); ?>
	<?php echo form_input($COD_Reto); ?>
	<br>
	<?php echo form_label('Descripción de Reto: ','DESC_Reto'); ?>
	<?php echo form_input($DESC_Reto); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

