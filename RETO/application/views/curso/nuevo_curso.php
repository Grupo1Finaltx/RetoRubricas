<?php
$form = array(
	'name' => 'form_curso'
	);
$COD_Curso = array(
	'name' => 'COD_Curso',
	'placeholder' => 'Código de Curso',
	'maxlength' => 10,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Curso/nuevo_curso',$form);?>
	<?php echo form_label('Código de Curso: ','COD_Curso'); ?>
	<?php echo form_input($COD_Curso); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>