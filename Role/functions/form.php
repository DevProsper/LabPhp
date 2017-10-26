<?php 

function select($id, $options = array()){

	$return = "<select class='form-control' id='$id' name='$id'>";
	foreach ($options as $k => $v) {
		$selected = '';
		if (isset($_POST[$id]) && $k == $_POST[$id]) {
			$selected = 'selected="selected"';
		}
		$return .= "<option value='$k' $selected>$v</option>";
	}
	$return .= "</select>";
	return $return;
}
 
function input($name,$options= array()){
	$html =  ' ';
	$attr = ' ';
	$value = isset($_POST[$name]) ? $_POST[$name] : '';
	foreach ($options as $k => $v) {if($k != 'type'){
		$attr .= " $k=\"$v\"";
	}}
	if(!isset($options['type'])) {
		$html .= '<input type="text" value="'.$value.'" 
		id="'.$name.'" name="'.$name.'"'.$attr.'>';
	}elseif ($options['type'] == 'textarea') {
		$html .= '<textarea  id="'.$name.'" name="'.$name.'"'.$attr.'>'.$value.'</textarea>';
	}elseif ($options['type'] == 'email') {
		$html .= '<input type="email" value="'.$value.'" 
		id="'.$name.'" name="'.$name.'"'.$attr.'>';
	}elseif ($options['type'] == 'password') {
		$html .= '<input type="password" 
		id="'.$name.'" name="'.$name.'"'.$attr.'>';
	}elseif ($options['type'] == 'checkbox') {
		$html .= '<input  type="hidden" name="'.$name.'" '.$attr.' value="0">
		<input  type="checkbox" name="'.$name.'"'.$attr.' value="1" '.(empty($value)?'' : 'checked').'>';
	}elseif ($options['type'] == 'select') {
		$html .= "<select id='$name' name='$name'>";
		foreach ($options as $k => $v) {
			$selected = '';
			if (isset($_POST[$name]) && $k == $_POST[$name]) {
				$selected = 'selected="selected"';
			}
			$html .= "<option value='$k' $selected>$v</option>";
		}
		$html .= "</select>";
	}elseif ($options['type'] == 'radio') {
		$html .= '<input type="radio" name="'.$name.'" id="'.$name.'" value="1" '.(empty($value)?'' : 'checked').'>
		<input type="radio" name="'.$name.'" id="'.$name.'" value="1" '.(empty($value)?'' : 'checked').'>';
	}
	return $html;
}