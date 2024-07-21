<?php
declare(strict_types=1);
namespace seadev\dao;

class Database {
    private static \PDO $db;

    public static function getConnection() : \PDO {
        if (!isset(self::$db)) {
            // Utilisation de __DIR__ pour obtenir le chemin du répertoire actuel de Database.php
            $paramIniPath = __DIR__ . '/param.ini';
            // echo "Path to param.ini: $paramIniPath<br>";

            if (file_exists($paramIniPath)) {
                // echo "param.ini exists.<br>";
                $param = parse_ini_file($paramIniPath, true);
                if (isset($param['BDD'])) {
                    $host = $param['BDD']['host'];
                    $port = $param['BDD']['port'];
                    $dbname = $param['BDD']['dbname'];
                    $username = $param['BDD']['username'];
                    $password = $param['BDD']['password'];
                } else {
                    throw new DaoException("Section BDD manquante dans param.ini", 8002);
                }
            } else {
                throw new DaoException("Parametre BDD indisponibles", 8001);
            }

            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
            self::$db = new \PDO($dsn, $username, $password);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$db->exec("SET NAMES 'UTF8'");
        }
        return self::$db;
    }
}
