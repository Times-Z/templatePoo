<?php 
namespace Core\HTML;


/**
 * Class FormBoostrap extends de Form
 * @package Core\HTML
 */
class BootstrapForm extends Form {

    /**
     *
     * @param string $html Entour le champs avec une div class form-group / inline
     * @param boolean $inline
     * @return string
     */
    protected function surround(string $html, $inline = false) :string {
        return ($inline !== false) ? "<div class=\"form-check form-check-inline\">{$html}</div>" : "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * Input text
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param boolean $required
     * @param boolean $value
     * @param boolean $disabled
     * @param boolean $pattern
     * @return string
     */
    public function text(string $name, string $label, string $placeholder = '', bool $required = false, bool $value = false, bool $disabled = false, bool $pattern = false) :string {
        $label = ($label !== '') ? '<label for="' . $name . '">' . $label . '</label>' : '';
        $value = ($value !== false) ? $value : $this->__getValue($name);
        $required = ($required !== false) ? 'required' : '';
        $disabled = ($disabled !== false) ? 'disabled' : '';
        $pattern = ($pattern !== false) ? $pattern : '';

        $input = '<input class="form-control" type="text" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $required . ' ' . $pattern . ' ' . $disabled . '>';

        return $this->surround($label . $input);
    }

    /**
     * Input textarea
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param boolean $required
     * @param boolean $value
     * @param boolean $disabled
     * @return string
     */
    public function textarea(string $name, string $label, string $placeholder = '', bool $required = false, bool $value = false, bool $disabled = false) :string {
        $label = ($label !== '') ? '<label for="' . $name . '">' . $label . '</label>' : '';
        $value = ($value !== false) ? $value : $this->__getValue($name);
        $required = ($required !== false) ? 'required' : '';
        $disabled = ($disabled !== false) ? 'disabled' : '';

        $input = '<textarea class="form-control" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" ' . $required . ' ' . $disabled . '>' . $value . '</textarea>';

        return $this->surround($label . $input);
    }

    /**
     * Input phone
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param boolean $required
     * @param boolean $value
     * @param boolean $disabled
     * @return string
     */
    public function phone(string $name, string $label, string $placeholder = '', bool $required = false, bool $value = false, bool $disabled = false) :string {
        $label = ($label !== '') ? '<label for="' . $name . '">' . $label . '</label>' : '';
        $value = ($value !== false) ? $value : $this->__getValue($name);
        $required = ($required !== false) ? 'required' : '';
        $disabled = ($disabled !== false) ? 'disabled' : '';

        $input = '<input class="form-control" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" type="phone" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $required . ' ' . $disabled . '>';

        return $this->surround($label . $input);
    }

    /**
     * Input email
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param boolean $required
     * @param boolean $value
     * @param boolean $disabled
     * @return string
     */
    public function email(string $name, string $label, string $placeholder = '', bool $required = false, bool $value = false, bool $disabled = false) :string {
        $label = ($label !== '') ? '<label for="' . $name . '">' . $label . '</label>' : '';
        $value = ($value !== false) ? $value : $this->__getValue($name);
        $required = ($required !== false) ? 'required' : '';
        $disabled = ($disabled !== false) ? 'disabled' : '';

        $input = '<input class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" type="email" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $required . ' ' . $disabled . '>';

        return $this->surround($label . $input);
    }

    /**
     * Input option
     *
     * @param string $value
     * @param string $name
     * @return string
     */
    public function option(string $value, string $name) :string {
        return '<option value="' . $value . '">' . $name . '</option>';
    }

    /**
     * Input Password
     * Sécu haute de base -> pattern min 8 carac min + maj + chiffre + carac spécial
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param boolean $secu
     * @param boolean $required
     * @return string
     */
    public function password(string $name, string $label, string $placeholder = '', bool $secu = true, bool $required = true) :string {
        $label = '<label for="' . $name . '">' . $label . '</label>';
        $required = ($required !== false) ? 'required' : '';
        $secu = ($secu === true) ? 'pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"' : '';

        $input = '<input id="' . $name . '" class="form-control" type="password" name="' . $name . '" placeholder="' . $placeholder . '" ' . $secu . ' ' . $required . '>';

        return $this->surround($label . $input);
    }

    /**
     * Input radio
     *
     * @param string $name
     * @param string $group
     * @param string $label
     * @param boolean $inline
     * @param boolean $checked
     * @param boolean $disable
     * @return string
     */
    public function radio(string $name, string $group, string $label, bool $inline = false, bool $checked = false, bool $disable = false) :string {
        $checked = ($checked !== false) ? 'checked' : '';
        $disable = ($disable !== false) ? 'disabled' : '';

        $input = '<input class="mr-2" type="radio" id="'. $name . '" name="' . $group . '"  value="' . $label . '"  ' . $checked . ' ' . $disable . '>';
        $label = '<label for="'. $name .'">'. $label . '</label>';

        return ($inline !== false) ? $this->surround($input . $label) : $this->surround($input . $label, true);
    }


    /**
     * Input Range
     *
     * @param string $name
     * @param string $label
     * @param int $min
     * @param int $max
     * @param int $step
     * @param boolean $disabled
     * @return string
     */
    public function slide(string $name, string $label, int $min, int $max, int $step, bool $disabled = false) :string {
        $label = '<label for="' . $name . '">' . $label . '</label>';
        $disabled = ($disabled !== false) ? 'disabled' : '';

        $input = '<input id="' . $name . '" class="form-control-range" type="range" id="' . $name . '" name="' . $name . '" min="' . $min . '" max="' . $max . '" value="' . $this->__getValue($name) . '" step="' . $step . '" ' . $disabled . '>';

        return $this->surround($label . $input);
    }


    /**
     * Input checkbox
     *
     * @param string $name
     * @param string $label
     * @param boolean $inline
     * @param boolean $disabled
     * @return string
     */
    public function check(string $name, string $label, bool $checked = false, bool $inline = false, bool $disabled = false) :string {
        $label = '<label for="' . $name . '">' . $label . '</label>';
        $checked = ($checked !== false) ? 'checked' : '';
        $disabled = ($disabled !== false) ? 'disabled' : '';

        $input = '<input id="' . $name . '" class="mr-2" type="checkbox" name="' . $name . '" id ="' . $name . '" value="' . $name . '" '. $checked . ' ' . $disabled . '>';

        return ($inline !== false) ? $this->surround($input . $label, true) : $this->surround($input . $label);
    }

    /**
     * Input Select
     *
     * @param string $name
     * @param string $label
     * @param array $options['key'=>'value']
     * @return string
     */
    public function select(string $name, string $label, array $options = []) :string {
        $label = '<label for"'. $name .'">' . $label . '</label>';
        $input = '<select id="' . $name . '" class="form-control" name="' . $name . '">';

        foreach ($options as $k => $v) {
            $attr = ($k == $this->__getValue($name)) ? 'selected' : '';
            $input .= ($k === 'disabled') ? '<option value=' . $k . ' ' . $attr . ' disabled >' . $v . '</option>' : '<option value=' . $k . ' ' . $attr . '>' . $v . '</option>';
        }
        $input .= '</select>';

        return $this->surround($label . $input);
    }

    /**
     * Input Button
     *
     * @param string $name
     * @param string $value
     * @param boolean $disabled
     * @param string $class
     * @return string
     */
    public function button(string $name, string $value, bool $disabled = false, string $class = "btn btn-primary") :string {
        $disabled = ($disabled !== false) ? 'disabled' : '';

        return $this->surround('<input id="' . $name . '" name="' . $name . '" class="' . $class . '" type="button" value="' . $value . '" ' . $disabled . '>');
    }

    
    /**
     * Input Upload file
     *
     * @param string $name
     * @param string $label
     * @param string $accept
     * @param boolean $disabled
     * @return string
     */
    public function upload(string $name, string $label, bool $accept = false, bool $multiple = false , bool $disabled = false) :string {
        $label = ($label !== '') ? '<label for="' . $name . '">' . $label . '</label>' : '';
        $disabled = ($disabled !== false) ? 'disabled' : '';
        $multiple = ($multiple !== false) ? 'multiple="multiple"' : '';

        $input = '<input id="' . $name . '" class="mr-2 form-control-file" type="file" id="' . $label . '" name="' . $name . '" ' . $multiple . ' accept="' . $accept . '" ' . $disabled . '>';

        return $this->surround($label . $input);
    }

    /**
     * Input Reset
     *
     * @param string $value
     * @param string $class
     * @param boolean $disabled
     * @return string
     */
    public function reset(string $value, string $class = "btn btn-primary", bool $disabled = false) :string {
        $disabled = ($disabled !== false) ? 'disabled' : '';

        $input = '<input class="' . $class . '" type="reset" value="' . $value . '" ' . $disabled . '>';

        return $this->surround($input);
    }

    /**
     * Input Submit
     *
     * @param string $name
     * @param string $value
     * @param boolean $space
     * @return string
     */
    public function submit(string $name, string $value, bool $space = false) :string {
        return $this->surround('<input type="submit" class="form-control btn btn-success ' . $space . '" name="' . $name . '" value="' . $value . '">');
    }

}



