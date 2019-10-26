<?php
namespace Core\HTML;


/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form {

    /**
     * @var array Données utilisées par le formulaire
     */
    protected $data;

    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * @param array $data Données utilisées par le formulaire
     */
    public function __construct($data = array()) {

        $this->data = $data;

    }

    /**
     * @param $index string Index de la valeur a récupérer
     * @return string
     */
    protected function __getValue($index) {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param  $html string Code HTML à entourer
     * @return string
     */
    protected function __surround($html) {
        return "<{$this->surround}>{$html}</$this->surround}>";
    }

    
    /**
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->__surround('<input type="' . $type .'" name="' . $name . '" value="' . $this->__getValue($name) . '">');
    }


    /**
     * Input submit
     *
     * @param string $name
     * @param string $value
     * @param string $space
     * @return void
     */
    public function submit($name, $value, $space = '') {
        return $this->__surround('<input class="' . $space . '" type="submit" name="' . $name . '" value="' . $value . '">');
    }

}