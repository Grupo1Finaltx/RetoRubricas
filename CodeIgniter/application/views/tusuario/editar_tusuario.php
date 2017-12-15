<?php
$form = array(
	'name' => 'form_tusuario'
	);
$url = "'".base_url()."index.php/Tusuario'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$DESC_TUsuario = array(
	'name' => 'DESC_TUsuario',
	'value' => $tusuarios->result()[0]->DESC_TUsuario,
	'placeholder' => 'Descripción de tipo de usuario',
	'maxlength' => 50,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Tusuario/actualizar/'.$tusuarios->result()[0]->ID_TUsuario,$form);?>
	<?php echo form_label('Descripción de tipo de usuario: ','DESC_TUsuario'); ?>
	<?php echo form_input($DESC_TUsuario); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

