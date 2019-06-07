<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base model
 * 
 * PHP version 5.4
 */
abstract class model
{
    /**
     * Get the POD database connection
     * 
     * @return mixed
     */
    protected static function getDB() 
    {
        static $db = null;

        if ($db === null) {

            try {

                $db = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8', Config::DB_USER, Config::DB_PASSWORD);

                // Throw an Exception when an error occors
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {

                echo $e->getMessage();
                
            }
        }
        return $db;
    }
}