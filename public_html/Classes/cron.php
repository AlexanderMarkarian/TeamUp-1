<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cron
 *
 * @author rostom
 */
class cron {

    private $_mysqli;
    private $_db;
    public $_functions;
    public $_result;
    public $_object;
    public $_data = array();

    /*
     * @ auth: Rostom
     * Constructor magic function
     * @param n/a
     * Instance of db class
     * DO NOT MODIFY
     * RS 03082016
     */

    public function __construct() {
        $this->_db = db_connect::getInstance();
        $this->_mysqli = $this->_db->getConnection();
        $this->_fucntions = new functions();
    }

    /*
     * @auth:Rostom
     * @modified from : Ibrhim
     * Desc: Calls the api via curl
     * @param: $url , $ssl(default=false) ,$ret_transfer(default=false), $option[]
     * Cron Job will run @11:21 PM Every Day 2123**** (cron code)
     */

    public function GetDataFromApi($url, $ssl = false, $ret_transfer = false, array $option) {

        $ch = curl_init();
        curl_setopt($ch, $option['0'], $ssl);
        curl_setopt($ch, $option['1'], $ret_transfer);
        curl_setopt($ch, $option['2'], $url);
        $result = curl_exec($ch);
        $this->_result = $result;
    }

    /*
     * @auth: Rostom
     * Desc: returns results
     * Cron Job will run @11:21 PM Every Day 2123**** (cron code)
     */

    public function SetDataFromApi() {

        return $this->_result;
    }

    /*
     * @auth: Rostom
     * Desc: Decodes the jason data from API
     * Cron Job will run @11:21 PM Every Day -->Unix time Code: 2123**** 
     */

    public function DecodeDataFromCurl() {

        $obj = json_decode($this->SetDataFromApi());
        $this->_object = $obj;
    }

    /*
     * @auth: Rostom
     * Desc: Returns the decoded values
     * Cron Job will run @11:21 PM Every Day 2123**** (cron code)
     */

    public function ReturnDecodedObject() {
        return $this->_object;
    }

    /*
     * @auth: Rostom
     * Desc: Does the back of the day before from the table
     * Cron Job will run @11:21 PM Every Day 2123**** (cron code)
     * After the back up we will use deletall function from class functions.php to delete 
     * the old data
     * then
     * we will use insertall function from function.php to insert the new data 
     */

    public function DoBackUpOldData(array $data, $newFile, $file_extension) {

        $filename = ABSOLUTH_PATH_CRON_BKP . $newFile . "_" . date('Ymd') . "." . $file_extension;
        $json_data = json_encode($data);
        $linecount = 0;
        if (file_exists($filename)) {

            $filename = ABSOLUTH_PATH_CRON_BKP . $newFile . "_" . date('Ymd') . "." . $file_extension;
        }
        $backup_data = $filename;
        $log = fopen($backup_data, 'w') or die("Cannot open file:" . $backup_data);
        fwrite($log, $json_data);
        fclose($log);
    }

}
