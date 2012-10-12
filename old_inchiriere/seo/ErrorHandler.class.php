<?php

class ErrorHandler {

    const EMAIL_LOG_MESSAGE = 1; // error status for setLog method

    static public function setLog($message, $importance = self::MESSAGE_NOT_IMPORTANT) {
        $query = "INSERT INTO logs(log_message, added) VALUES('" . mysql_real_escape_string($message) . "', NOW())";
        Db::insert($query);
    }

}