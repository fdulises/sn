<?php

namespace lib;

abstract class db{
    static public $dbh;

    static public function connect(){
        self::$dbh = new \PDO(
            'mysql:host=localhost;port=3306;dbname=rsdb',
            'root',
            '',
            [
                \PDO::ATTR_PERSISTENT => false,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
        );
    }

    /*
    * Retorna un string con la consulta SQL reemplazando los parámetros
    */
    static public function getQueryString( string $query, array $params = [] ): string
    {
        $replacement = [];
        foreach ($params as $key => $value) {
            $replacement['/' . $key . '/'] = ( is_string($value) ) ? '"'. $value .'"' : $value;
        }
        return (string) preg_replace(array_keys($replacement), array_values($replacement), $query);
    }

    /*
    * Permite ejecutar consultas y retorna true o false dependiendo de la consulta
    */
    static public function executeQuery(string $query, array $params = []): bool{
        $dbquery = self::$dbh->prepare($query);
        return $dbquery->execute($params);
    }

    static public function sendQuery(string $query, array $params = []): \PDOStatement{
        $dbquery = self::$dbh->prepare($query);
        $dbquery->execute($params);
        return $dbquery;
    }

    /*
    * Permite ejecutar consultas SELECT y retorna un arreglo asociativo
    */
    static public function fetchQuery(string $query, array $params = []): array
    {
        $dbquery = self::$dbh->prepare($query);
        $result = $dbquery->execute($params);
        if( $result ) return $dbquery->fetchAll(\PDO::FETCH_ASSOC);
        return [];
    }

    /*
    * Permite ejecutar consultas SELECT y retorna la primera fila
    */
    static public function fetchFirst(string $query, array $params = []): array{
        $result = self::fetchQuery($query, $params);
        if( $result ) return $result[0];
        return [];
    }
}