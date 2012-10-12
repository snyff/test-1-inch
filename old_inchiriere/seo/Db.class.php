<?php

class Db {

    const DB_HOST = 'localhost';
    const DB_NAME = 'itmarket_inchiriere';
    const DB_USER = 'itmarket_it';
    const DB_PASSWORD = 'J@slwwa5';

    static private $_conn;

    private function __construct() {
        
    }

    static private function connect() {
        $connection = mysql_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD) or ErrorHandler::setLog('Could not connect to db. Using:' . self::DB_HOST . ', ' . self::DB_NAME . ', ' . self::DB_USER . ', ' . self::DB_PASSWORD, ErrorHandler::EMAIL_LOG_MESSAGE);
        if (!$connection) {
            ErrorHandler::setLog('Could not connect to HOST. Using:' . self::DB_HOST . ', ' . self::DB_NAME . ', ' . self::DB_USER . ', ' . self::DB_PASSWORD, ErrorHandler::EMAIL_LOG_MESSAGE);
            die;
        }
        if (!mysql_select_db(self::DB_NAME, $connection)) {
            ErrorHandler::setLog('Could not connect to db. Using:' . self::DB_HOST . ', ' . self::DB_NAME . ', ' . self::DB_USER . ', ' . self::DB_PASSWORD, ErrorHandler::EMAIL_LOG_MESSAGE);
            die;
        }
        return $connection;
    }

    private static function setLog($message, $fatal = 0) {
        ErrorHandler::setLog($message, $fatal);
    }

    static public function insert($query) {
        if (!self::$_conn) {
            self::$_conn = self::connect();
        }
        try {
            mysql_query($query, self::$_conn);
        } catch (Exception $e) {
            echo $e->getMessage();
            self::setLog('INSERT QUERY FAIL: ' . $query, ErrorHandler::EMAIL_LOG_MESSAGE);
        }
    }

    static public function query($query) {
        if (!self::$_conn) {
            self::$_conn = self::connect();
        }
        $res = mysql_query($query, self::$_conn) or self::setLog('QUERY FAIL: ' . "\n\n\n" . mysql_real_escape_string($query) . "\n\n\n Error: " . mysql_error(), ErrorHandler::EMAIL_LOG_MESSAGE);
        return $res;
    }

    static public function fetch($res) {
        return mysql_fetch_assoc($res);
    }

    static public function getNumRows($res) {
        return mysql_num_rows($res);
    }

    static public function fetchOne($query) {
        if (!self::$_conn) {
            self::$_conn = self::connect();
        }
        $result = mysql_query($query, self::$_conn) or self::setLog('SELECT QUERY FAIL: ' . mysql_real_escape_string($query) . "\n\n\n Error: " . mysql_error(), ErrorHandler::EMAIL_LOG_MESSAGE);
        return mysql_fetch_assoc($result);
    }

    static public function fetchAll($query) {
        $result_array = $row = array();
        if (!self::$_conn) {
            self::$_conn = self::connect();
        }
        $result = mysql_query($query) or self::setLog('SELECT QUERY FAIL: ' . $query, ErrorHandler::EMAIL_LOG_MESSAGE);
        while ($row = mysql_fetch_assoc($result)) {
            $result_array[] = $row;
        }
        return $result_array;
    }

}