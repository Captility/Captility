<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class CaptilityHelper extends AppHelper {

    var $helpers = array(
        'Time',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'));


    /**
     *
     * Helper Function to well format a Date and link to the Captility Calendar.
     * @param $dateExpression Date or strtotime-Expression fo Format
     * @param string $format Optional Format type, according to strtotime conventions. Default is: %A, %d.%m.%Y
     * @return Linled formated Date
     */
    public function linkDate($dateExpression, $format = '%A, %d.%m.%Y') {


        return $this->Html->link(

            $this->calcDate($dateExpression, $format), // Date for Link
            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($dateExpression))), // FullCalendar-Link
            array('escape' => false));
    }


    public function calcDate($dateExpression, $format = '%A, %d.%m.%Y') {

        if (empty($dateExpression)) return false;

        // FORMAT
        $formatedDate = $this->Time->nice(strtotime($dateExpression), 'CET', $format);

        return $formatedDate;

    }

    /**
     * Adding Times: 12:00:00 + 01:30:00
     * @param $time
     * @param $duration
     * @return mixed
     */
    public function durationToTime($time, $duration) {

        $durM = date('i', strtotime($duration));
        $durH = date('G', strtotime($duration));

        $time = date('H:i', strtotime($time . ' +' . $durH . ' hours +' . $durM . ' minutes'));

        return $time;
    }


    public function trimLink($string, $len = 50) {

        if (strlen($string) <= $len) {
            return $string;
        }
        $s2 = substr($string, 0, $len - 3);
        $s2 .= "...";
        return h($s2);
    }

}