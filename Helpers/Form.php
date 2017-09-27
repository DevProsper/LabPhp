<?php
class Form{

    public $data;
    public $errors;

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

    function input($field, $label=null, $attributes=array()){
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

    function hidden($field, $value=''){
        $r = "";
        $value = (isset($this->data[$field])) ? $this->data[$field] : $value;
        $r .= '<input type="hidden" value="'.$value.'" name="data['.$field.']" class="field text medium">';
        $r .= $this->getError($field);
        return $r;
    }

    function file($field,$label){
        $r = '<label class="desc">'.$label.'</label>';
        $value = (isset($this->data[$field])) ? $this->data[$field] : '';
        $r .= '<input type="file" name="'.$value.'"/>';
        $r .= $this->getError($field);
        return $r;
    }

    function select($field, $label, $option){
        $r = '<label class="desc">'.$label.'</label>';
        $value = (isset($this->data[$field])) ? $this->data[$field] : '';
        $r .= '<select name="data['.$field.']"/>';
        foreach ($option as $k => $v) {
            if ($k==$this->data[$field]) {
                $r .= '<option value="'.$k.'" selected="selected">'.$v.'</option>';
            }else{
                $r .= '<option value="'.$k.'">'.$v.'</option>';
            }
        }
        $r .= '</select>';
        $r .= $this->getError($field);
        return $r;
    }
}
