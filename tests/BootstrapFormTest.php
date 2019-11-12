<?php

use Core\HTML\BootstrapForm;
use PHPUnit\Framework\TestCase;

final class BootstrapFormTest extends TestCase {

    public function testInput() {
        $form = new BootstrapForm();
        $config = $form->input('test', 'test', [], 'placeholder', false, false, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->input('test', 'test', ['type' => 'textarea'], 'placeholder', false, false, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->input('test', 'test', ['type' => 'textarea'], 'placeholder', true, false, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->input('test', 'test', ['type' => 'textarea'], 'placeholder', true, true, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->input('test', 'test', ['type' => 'textarea'], 'placeholder', true, true, true, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->input('test', 'test', ['type' => 'textarea'], 'placeholder', true, true, true, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->input('test', 'test');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testOption() {
        $form = new BootstrapForm();
        $config = $form->option('test', 'test');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testPassword() {
        $form = new BootstrapForm();
        $config = $form->password('test', 'test', 'placeholder', false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->password('test', 'test', 'placeholder', true, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->password('test', 'test', 'placeholder', true, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->password('test', 'test', '', true, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testRadio() {
        $form = new BootstrapForm();
        $config = $form->radio('test', 'test','test', false, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->radio('test', 'test','test', true, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->radio('test', 'test','test', true, true, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->radio('test', 'test','test', true, true, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testSlide() {
        $form = new BootstrapForm();
        $config = $form->slide('test', 'test', 0, 5, 1, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->slide('test', 'test', 0, 5, 1, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testCheck() {
        $form = new BootstrapForm();
        $config = $form->check('test', 'test', false, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->check('test', 'test', true, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->check('test', 'test', true, true, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->check('test', 'test', true, true, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testSelect() {
        $form = new BootstrapForm();
        $config = $form->select('test', 'test', []);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->select('test', 'test', ['testKey' => 'testValue']);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testButton() {
        $form = new BootstrapForm();
        $config = $form->button('test', 'test', false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->button('test', 'test', true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->button('test', 'test', false, 'success');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->button('test', 'test', true, 'success');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testUpload() {
        $form = new BootstrapForm();
        $config = $form->upload('test', 'test', false, false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->upload('test', 'test', 'images/jpeg', false, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->upload('test', 'test', 'images/jpeg', true, false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->upload('test', 'test', 'images/jpeg', true, true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testReset() {
        $form = new BootstrapForm();
        $config = $form->reset('test');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->reset('test', 'success', false);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $form->reset('test', 'success', true);

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testSubmit() {
        $form = new BootstrapForm();
        $config = $form->submit('test', 'test');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
        
        $config = $form->submit('test', 'test');

        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

}
