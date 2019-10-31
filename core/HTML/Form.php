<?php
namespace Core\HTML;

/**
 * Form class
 * @package Core\HTML
 */
class Form {

    protected $data;
    public $surround = 'p';

    public function __construct(array $data = []) {
        $this->data = $data;
    }

    /**
     * Get the value of form
     *
     * @param string $index The index of data ex = data['inputTest']
     * @return void
     */
    protected function __getValue(string $index) {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * Surround the html
     *
     * @param string $html
     * @return string
     */
    protected function __surround(string $html) :string {
        return "<{$this->surround}>{$html}</$this->surround}>";
    }

    
    /**
     * Input
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return string
     */
    public function input(string $name, string $label, array $options = []) :string {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->__surround('<input id="' . $label .'" type="' . $type .'" name="' . $name . '" value="' . $this->__getValue($name) . '">');
    }


    /**
     * Input submit
     *
     * @param string $name
     * @param string $value
     * @param string $space
     * @return string
     */
    public function submit(string $name, string $value, string $space = '') :string {
        return $this->__surround('<input class="' . $space . '" type="submit" name="' . $name . '" value="' . $value . '">');
    }

}