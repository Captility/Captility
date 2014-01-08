<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {


    public function isSemester($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('(WS\s?\d{4,4}\/?\d{2,4}|SS\s?\d{4,4})', $value);
    }


    function equalToField($check, $otherfield) {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value) {
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    }

    public function checkSupportedLanguage($check) {
        // $data array is passed using the form field name as the key
        $value = array_values($check);
        $value = $value[0];

        // if supported Languages are set...
        if(Configure::check('Captility.supportedLanguages')){

            // check foreach language if..
            foreach (Configure::read('Captility.supportedLanguages') as $language) {

                // selected language is supported
                if($language == $value) return true;
            }
        }

        return false;
    }

    /**
     * @param $data
     * @return bool
     * Usage: var $validate = array('myField1' => array('atLeastOne', 'myField2', 'myField3', 'myField4'), ...
     */
    function atLeastOneNotEmpty($data) {
        $args = func_get_args();  // will contain $data, 'myField2', 'myField3', ...

        foreach ($args as $name) {
            if (is_array($name)) {
                $name = current(array_keys($name));
            }
            if (!empty($this->data[$this->name][$name])) {
                return true;
            }
        }

        return false;
    }
}
