<?php
$form = array(
	'name' => 'form_ciclo'
	);
$COD_Ciclo = array(
	'name' => 'COD_Ciclo',
	'placeholder' => 'Código de Ciclo',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1
	);
$DESC_Ciclo = array(	
	'name' => 'DESC_Ciclo',
	'placeholder' => 'Descripción de Ciclo',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1
	);


	if ($centros){
		$ID_Centro = array();
		foreach ($centros->result() as $centro) {
			$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
		}	
	}
	else{
		$ID_Centro = array(
    		0         => 'No hay Centros'
		);
	}

	if ($cursos){
		$ID_Curso = array();
		foreach ($cursos->result() as $curso) {
			$ID_Curso[$curso->ID_Curso] = $curso->COD_Curso;
		}	
	}
	else{
		$ID_Curso = array(
    		0         => 'No hay Cursos'
		);
	}	

?>

<div>
	<?php echo form_open('Ciclo/nuevo_ciclo',$form);?>
	<?php echo form_label('Centro: ','ID_Centro'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Centro', $ID_Centro,1);
	?>
	<br>

	<?php echo form_label('Curso: ','ID_Curso'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_Curso', $ID_Curso,1);
	?>
	<br>

	<?php echo form_label('Código de Ciclo: ','COD_Ciclo'); ?>
	<?php echo form_input($COD_Ciclo); ?>
	<br>
	<?php echo form_label('Descripción de Ciclo: ','DESC_Ciclo'); ?>
	<?php echo form_input($DESC_Ciclo); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>