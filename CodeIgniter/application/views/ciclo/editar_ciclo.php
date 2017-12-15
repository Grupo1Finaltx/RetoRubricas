<?php
$form = array(
	'name' => 'form_ciclo'
	);
$url = "'".base_url()."index.php/Ciclo'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$COD_Ciclo = array(
	'name' => 'COD_Ciclo',
	'placeholder' => 'Código de Ciclo',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1,
	'value' => $ciclos->result()[0]->COD_Ciclo
	);
$DESC_Ciclo = array(	
	'name' => 'DESC_Ciclo',
	'placeholder' => 'Descripción de Ciclo',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1,
	'value' => $ciclos->result()[0]->DESC_Ciclo	
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
		$ID_Cursoo = array();
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
	<?php echo form_open('Ciclo/actualizar/'.$ciclos->result()[0]->ID_Ciclo);?>
	<?php echo form_label('Centro: ','ID_Centro'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Centro', $ID_Centro, $ciclos->result()[0]->ID_Centro);
	?>
	<br>

	<?php echo form_label('Curso: ','ID_Curso'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_Curso', $ID_Curso, $ciclos->result()[0]->ID_Curso);
	?>
	<br>

	<?php echo form_label('Código de Ciclo: ','COD_Ciclo'); ?>
	<?php echo form_input($COD_Ciclo); ?>
	<br>
	<?php echo form_label('Descripción de Ciclo: ','DESC_Ciclo'); ?>
	<?php echo form_input($DESC_Ciclo); ?>
	<br>	
	<?php echo form_submit('Actualizar','Actualizar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>