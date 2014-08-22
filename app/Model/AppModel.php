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
App::uses('CakeTime', 'Utility');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $actsAs = array('Containable', 'Linkable.Linkable');


    public function isSemester($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('(WS\s?\d{4,4}\/?\d{2,4}|SS\s?\d{4,4})', $value);
    }

    public function isUhrzeit($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('([0-9]{2}:[0-9]{2}\s*Uhr)', $value);
    }

    /**
     * @param $check
     * @param $otherfield
     * @return bool
     */
    public function equalToField($check, $otherfield) {
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
        if (Configure::check('Captility.supportedLanguages')) {

            // check foreach language if..
            foreach (Configure::read('Captility.supportedLanguages') as $language) {

                // selected language is supported
                if ($language == $value) return true;
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
        $args = func_get_args(); // will contain $data, 'myField2', 'myField3', ...

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

    /**
     * Checks if the value defined by the field name is a date set in the future.  This
     * automatically checks if the value is in proper date format.
     *
     * @param string $fieldName The name of the field to validate.
     * @param array $params Extra validation parameters.
     * @return bool True if value of the field name is a future date; false otherwise.
     * @see Validation::validateDate()
     */
    function validateFutureDate($fieldName, $params) {
        if ($result = $this->validateDate($fieldName, $params)) {

            return $result;
        }

        $date = strtotime($this->data[$this->name][$fieldName]);

        return $this->_evaluate($date > time(), "is not set in a future date", $fieldName, $params);
    }

    function validateAfterDate($afterDate, $beforeDate) {

        $date1 = strtotime($this->data[$this->alias][$beforeDate]);

        $date2 = strtotime($this->data[$this->alias][$afterDate]);

        return ($date1 <= $date2);

    }


    function validateAfterTime($check, $afterTime, $beforeTime) {

        $date1 = strtotime(date('Y-m-d') . ' ' . $this->data[$this->alias][$beforeTime]);

        $date2 = strtotime(date('Y-m-d') . ' ' . $this->data[$this->alias][$afterTime]);

        return ($date1 < $date2);
    }

    public function formatDatepickerToValid($dateString, $formatString = 'Y-m-d') {

        // - ...Mo,
        return CakeTime::format($formatString, substr($dateString, 4));
    }


    public function formatDateTimepickerToValid($dateString, $timeString, $formatString = 'Y-m-d H:i:s') {

        // - ...\sUhr
        return $this->formatDatepickerToValid($dateString . ' ' . substr($timeString, 0, -4), $formatString);
    }

    public function formatTimepickerToValid($timeString, $formatString = 'H:i:s') {

        // - ...\sUhr
        return CakeTime::format($formatString, substr($timeString, 0, -4));
    }


    public function validateFalse() {

        return false;
    }


    public function afterValidate($options = array()) {

        if (Configure::read('MODEL.INVALIDATE_ALL')) {

            foreach ($this->_schema as $key => $field) {

                $this->invalidate($key, 'Invalidation Rule was applied. Check bootstrap.php for invalidation rule.');
            }
        }

        return true;
    }


    /**
     * @return string Monday of current german Week.
     */
    public function getWeekStart($weekDay = null) {

        if (!isset($weekDay)) {

            $weekDay = date('Y-m-d 00:00:00');
        }


        // return date('Y-m-d 00:00:00', strtotime('Monday this week', $weekDay)
        //SUNDAY FIX FOR: https://bugs.php.net/bug.php?id=63740


        $dayIndexPhp = date('w', strtotime($weekDay)); // Week where Sunday = 0, Monday =1 ...

        $dayIndexGerman = ($dayIndexPhp == 0) ? 6 : -1 + $dayIndexPhp; // Week where Sunday = 7, Monday =0 ...

        $weekStart = date('Y-m-d 00:00:00', strtotime(('-' . $dayIndexGerman . ' days'), strtotime($weekDay)));

        return $weekStart;

    }

    public function getNextWeekStart($weekDay = null) {


        if (!isset($weekDay)) {

            $weekDay = date('Y-m-d 00:00:00', strtotime('+1 week'));

        }
        else {

            $weekDay = date('Y-m-d 00:00:00', strtotime('+1 week', strtotime($weekDay)));
        }

        return $this->getWeekStart($weekDay);

        // return date('Y-m-d 00:00:00', strtotime('Monday next week', $weekDay)
        //SUNDAY FIX FOR: https://bugs.php.net/bug.php?id=63740
    }

    /**
     * Encrypt String with Jijndael256 for DB serialisation with constant initialisation vector.
     * Rather unsafe encryption technique to encrypt minor important passwords like device-passwords,
     * which need to be decrypted for cronjobs. Do not use for user passwords!
     *
     * @param $plainField String as plain/ decrypted text
     * @return string Encrypted and base64 decoded string
     */
    public function encryptField($plainField) {

        return $encoded_pwd = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, Configure::read('Security.rijndaelKey'), $plainField,
            'cbc', base64_decode(Configure::read('Security.rijndaelIV'))));
    }

    /**
     * Decrypt String with Jijndael256 for DB serialisation with constant initialisation vector.
     * Rather unsafe encryption technique to encrypt minor important passwords like device-passwords,
     * which need to be decrypted for cronjobs. Do not use for user passwords!
     *
     * @param $encryptedField Encrypted string
     * @return string Decrypted plain text.
     */
    public function decryptField($encryptedField) {

        return $decoded_pwd = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, Configure::read('Security.rijndaelKey'), base64_decode($encryptedField),
            'cbc', base64_decode(Configure::read('Security.rijndaelIV'))));
    }


}
