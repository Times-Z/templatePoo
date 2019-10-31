<?php 
namespace Core\HTML;

/**
 * Class FormBoostrap extends Form
 * @package Core\HTML
 */
class BootstrapForm extends Form {

    /**
     * Surround method
     *
     * @param string $html
     * @param boolean $inline
     * @return string
     */
    protected function surround(string $html, bool $inline = false) :string {
        if ($inline) {
            return "<div class=\"form-check form-check-inline\">{$html}</div>";
        } else {
            return "<div class=\"form-group\">{$html}</div>";
        }
    }

    /**
     * Input method
     *
     * @param string $name The name of input
     * @param string $label The label of input
     * @param array $options The option type like ['type'=>'textarea']
     * @param string $placeholder The placeholder of the field
     * @param string|boolean $pattern The pattern if you want or false if not
     * @param boolean $required Trur if you want an require intput
     * @param boolean $disable True if you want to disable the input
     * @param string $value String if you want to ad an manual value at the field
     * @return string
     */
    public function input(string $name, string $label, array $options = [], string $placeholder = '', $pattern = false, bool $required = false, bool $disable = false, $value = false) :string {
        $type = isset($options['type']) ? $options['type'] : 'text';

        if ($label !== '') {
            $label = '<label for="'. $name .'">' . $label . '</label>';
        } else {
            $label = '';
        }

        if ($required === true) {
            $required = 'required';
        } else {
            $required = false;
        }

        if ($pattern) {
            $pattern = 'patern="' . $pattern . '"';
        } else {
            $pattern = false;
        }

        if ($type === 'textarea') {
            if ($disable) {
                $input = '<textarea id="' . $name . '" name="' . $name . '" class="form-control" placeholder="' . $placeholder . '" disabled>' . $this->__getValue($name) . '</textarea>';
            } else {
                if ($value !== false) {
                    $input = '<textarea id="' . $name . '" name="' . $name . '" class="form-control" placeholder="' . $placeholder . '" ' .  $required . ' >' . $value  . '</textarea>';
                } else {
                    $input = '<textarea id="' . $name . '" name="' . $name . '" class="form-control" placeholder="' . $placeholder . '" ' .  $required . ' >' . $this->__getValue($name) . '</textarea>';
                }
            }
        } elseif($type === 'phone') {
            if ($disable) {
                $input = '<input type="phone" id="' . $name . '" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="' . $placeholder . '"  name="' . $name . '" class="form-control" value="' . $this->__getValue($name) . ' disabled>';
            } else {
                $input = '<input type="phone" id="' . $name . '" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="' . $placeholder . '"  name="' . $name . '" class="form-control" value="' . $this->__getValue($name) . '" ' .  $required . ' >';
            }
        } else {
            if ($disable) {
                $input = '<input class="form-control" type="' . $type . '" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" ' . $pattern . ' value="' . $this->__getValue($name) . '"  disabled>'; 
            } else {
                if ($value !== false) {
                    $input = '<input class="form-control" type="' . $type . '" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" ' . $pattern . ' value="' . $value . '" ' . $required . '  >';
                } else {
                     $input = '<input class="form-control" type="' . $type . '" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" ' . $pattern . ' value="' . $this->__getValue($name) . '" ' .  $required . '  >'; 
                }
            }
        }
        return $this->surround($label . $input);
    }

    /**
     * Just option for input select
     *
     * @param string $value
     * @param string $name
     * @return string
     */
    public function option(string $value, string $name) :string {
        $input = '<option value="' . $value . '">' . $name . '</option>';
        return $input;
    }

    /**
     * Input password
     * High security base => 1 upper case, 1 lower case, 1 number and 1 special character
     *
     * @param string $name The name of input
     * @param string $label The label of input
     * @param string $placeholder The placeholder of input
     * @param boolean $secu True high False no security
     * @param boolean $required True (default) if you want require the field
     * @return string
     */
    public function password(string $name, string $label, string $placeholder = "", bool $secu = true, bool $required = true) :string {
        $labelo = '<label for="' . $name . '">' . $label . '</label>';

        if ($required === true) {
            $required = 'required';
        } else {
            $required = false;
        }

        if ($secu === true) {
            $secu = 'pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"';
        } else {
            $secu = false;
        }

        $input = '<input id="' . $name . '" class="form-control" type="password" name="' . $name . '" placeholder="' . $placeholder . '" ' . $secu . ' ' . $required . '>';

        return $this->surround($labelo . $input);
    }

    /**
     * Radio Input
     *
     * @param string $name The uniq id of the input
     * @param string $group The group name of group input 
     * @param string $label_name The label of input
     * @param boolean $inline True if you want inline radio
     * @param boolean $check True if you want default check
     * @param boolean $disable True if you want disable
     * @return string
     */
    public function radio(string $name, string $group, string $label_name, bool $inline = false, bool $check = false, bool $disable = false) :string {
        if ($inline) {
            $label = '<label for="'. $name .'">'. $label_name . '</label>';
            if ($disable) {
                $input = '<input class="mr-2 form-control" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label_name . '" disabled >';
            } else {
                if ($check === true) {
                    $input = '<input class="mr-2 form-control" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label_name . '" checked>';
                } else {
                    $input = '<input class="mr-2 form-control" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label_name . '">';
                }
            }
            return $this->surround($input . $label, true);
        } else {
            $label = '<label for="'. $name .'">'. $label_name . '</label>';
            if ($disable) {
                $input = '<input class="mr-2" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label_name . '" disabled >';
            } else {
                if ($check === true) { 
                    $input = '<input class="mr-2" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label_name . '" checked>';
                } else {
                    $input = '<input class="mr-2" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label_name . '">';
                }
            }
            return $this->surround($input . $label);
        }
    }


    /**
     * Range input
     *
     * @param string $name The name of input
     * @param string $label The label name of input
     * @param int $min Range min value
     * @param int $max Range max value
     * @param int $step Range step value
     * @param boolean $disable True if you want to disable
     * @return string
     */
    public function slide(string $name, string $label, int $min, int $max, int $step, bool $disable = false) :string {
        $labelo = '<label for="' . $name . '">' . $label . '</label>';
        if ($disable) {
            $input = '<input id="' . $name . '" class="form-control-range" type="range" id="' . $name . '" name="' . $name . '" min="' . $min . '" max="' . $max . '" value="' . $this->__getValue($name) . '" step="' . $step . '" disabled>';
        } else {
            $input = '<input id="' . $name . '" class="form-control-range" type="range" id="' . $name . '" name="' . $name . '" min="' . $min . '" max="' . $max . '" value="' . $this->__getValue($name) . '" step="' . $step . '" >';
        }

        return $this->surround($labelo . $input);
    }


    /**
     * Input checkbox
     *
     * @param string $name The name of input
     * @param string $label The label name of input
     * @param boolean $checked True if you want to default check
     * @param boolean $inline True if you want to get inline checkbox input
     * @param boolean $disable True if you want to disable
     * @return string
     */
    public function check(string $name, string $label, bool $checked = false, bool $inline = false, bool $disable = false) :string {
        $label = '<label for="' . $name . '">' . $label . '</label>';
        if ($checked === true) {
            $checked = 'checked';
        }
        if ($disable) {
            $input = '<input id="' . $name . '" class="mr-2" type="checkbox" name="' . $name . '" id ="' . $name . '" value="' . $name . '" ' . $checked. 'disabled >';
        } else {
            $input = '<input id="' . $name . '" class="mr-2" type="checkbox" name="' . $name . '" id ="' . $name . '" value="' . $name . '" '. $checked . '>';
        }
        if ($inline) {
            return $this->surround($input . $label, true);
        } else {
            return $this->surround($input . $label);
        }
    }

    /**
     * Select input
     *
     * @param string $name The name of input
     * @param string $label The label name of input
     * @param array $options The input option like ['testKey'=>'testValue']
     * @return string
     */
    public function select(string $name, string $label, array $options = []) :string {
        $label = '<label for"'. $name .'">' . $label . '</label>';
        $input = '<select id="' . $name . '" class="form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attr = '';
            if ($k == $this->__getValue($name)) {
                $attr = 'selected';
            }
            if ($k === "disabled") {
                $input .= '<option value=' . $k . ' ' . $attr . ' disabled >' . $v . '</option>';
            } else {
                $input .= '<option value=' . $k . ' ' . $attr . '>' . $v . '</option>';
            }
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    /**
     * Button input
     *
     * @param string $name The name of input
     * @param string $value The value of input
     * @param boolean $disable True if you want disable the button
     * @param string $class default = btn btn-primary
     * @return string
     */
    public function button(string $name, string $value, bool $disable = false, string $class = "btn btn-primary") :string {
        if ($disable) {
            return $this->surround('<input id="' . $name . '" name="' . $name . '" class="' . $class . '" type="button" value="' . $value . '" disabled >');
        } else {
            return $this->surround('<input id="' . $name . '" name="' . $name . '" class="' . $class . '" type="button" value="' . $value . '">');
        }
        
    }

    
    /**
     * File upload input
     *
     * @param string $name The name of input
     * @param string $label The label name of input
     * @param string|boolean $accept Accept file like : 'image/jpg'
     * @param boolean $multiple False default, true for multiple files
     * @param boolean $disable True if you want disable the input
     * @return string
     */
    public function upload(string $name, string $label, $accept = false, bool $multiple = false ,  bool $disable = false) :string {

        if ($label !== '') {
            $labelo = '<label for="' . $name . '">' . $label . '</label>';
        } else {
            $labelo = '';
        }
        
        if ($disable) {
            $input = '<input id="' . $name . '" class="mr-2 form-control-file" type="file" id="' . $label . '" name="' . $name . '" accept="' . $accept . '" disabled >';
        } else {
            if ($multiple !== false) {
                $input = '<input id="' . $name . '" class="m-2 form-control-file" type="file" multiple="multiple" name="' . $name . '" accept="' . $accept . '">';;
            } else {
                $input = '<input class="m-2 form-control-file" type="file" id="' . $label . '" name="' . $name . '" accept="' . $accept . '" >';
            }
        }

        return $this->surround($labelo . $input);
    }

    /**
     * Input reset
     *
     * @param string $value The value of input
     * @param string $class Default = btn btn-primary
     * @param boolean $disable True if you want to disable the input
     * @return string
     */
    public function reset(string $value, string $class = "btn btn-primary", bool $disable = false) :string {
        if ($disable) {
            $input = '<input class="' . $class . '" type="reset" value="' . $value . '" disabled>';
        } else {
            $input = '<input class="' . $class . '" type="reset" value="' . $value . '">';
        }
        return $this->surround($input);
    }

    /**
     * Input submit
     *
     * @param string $name The name of input
     * @param string $value The value of input
     * @param string|boolean $space Add class space like 'mt-4'
     * @return string
     */
    public function submit(string $name, string $value, string $space = '') :string {
        return $this->surround('<input type="submit" class="form-control btn btn-success ' . $space . '" name="' . $name . '" value="' . $value . '">');
    }
	
}



