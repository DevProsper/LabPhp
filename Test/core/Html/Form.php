<?php 

class Form{

	public $data;
    public $errors = [];

    public function __construct(){

    }

    function set($data){
        $this->data = $data;
    }
    function setErros($errors){
        $this->errors = $errors;
    }

    //Obtenir les erreurs
    function getError($errors){
        if (isset($this->data[$errors])) {
              return '<span class="error">'.$this->data[$errors].'</span>';
        }else{
            return '';
        }
    }


    public function input($field, $label=null, $attributes=array()){
        $r = '';
        if ($label != null) {
            $r = '<label for="form.'.$field.'">' .$label.'</label>';
        }
        $r .= '<input type="text" name="data['.$field.']" id="form.'.$field.'"';
        if (isset($this->data[$field])) {
            $r .= ' value="'.$this->data[$field].'"';
        }
        foreach ($attributes as $k => $v) {
            $r .= ' ' .$k. '="'.$v.'"';
        }
        $r .= '/>';
        $r .= $this->getError($field);
        return $r;
    }

    public function submit($name, $attributes=array()){
        $r = '';
        $r .= '<input type="submit" name="'.$name.'" value="'.$name.'"';
        foreach ($attributes as $k => $v) {
            $r .= ' ' .$k. '="'.$v.'"';
        }
        $r .= '/>';
        return $r;
    }


    function hidden($field, $value=''){
        $r = "";
        $value = (isset($this->data[$field])) ? $this->data[$field] : $value;
        $r .= '<input type="hidden" value="'.$value.'" name="data['.$field.']" class="field text medium">';
        $r .= $this->getError($field);
        return $r;
    }

    function create($method){
        $r = "";
        $r .= '<form method="'.$method.'">';
        return $r;
    }

    public function end(){
        $r = ""; 
        $r .= '</form>';
        return $r;
    }

    function file($field,$label){
        $r = '<label class="desc">'.$label.'</label>';
        $value = (isset($this->data[$field])) ? $this->data[$field] : '';
        $r .= '<input type="file" name="'.$value.'"/>';
        $r .= $this->getError($field);
        return $r;
    }

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

    function textarea($id){
		$value = isset($_POST[$id]) ? $_POST[$id] : '';
		return "<textarea type='text' class='form-control' id='$id' name='$id'>$value</textarea>";
	}
}
