<?php 


class Forme extends Form{

    private $field;


    public function __construct($method){
        parent::__construct();
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
        $this->verifChamp();
        return $r;

    }


    public function verifChamp(){
        $field = $this->field;
        if (isset($_POST['submit'])) {
            $errors = [];
            if ($this->field == "") {
                $errors['erreur'] = "Ce champ ne doit pas etre vide";
            }
            if (!empty($errors)) {
               var_dump($errors);
            }
        }
    }
}
