<?php
namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity{
    protected $id;

    public function getId():int {return $this->id;}

    public function __set($name, $value) {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source):string{
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        }else {
            $this->insert($mappedProperties);
        }
    }

    private function update($mappedProperties):void{
        $column2params = [];
        $params2value = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value){
            $param = ':param'.$index;
            $column2params[] = $column.' = '.$param;
            $params2value[$param] = $value;
            $index++;
        }
        $sql = 'UPDATE '.static::getTableName().' SET '.implode(', ',$column2params).' WHERE id = '.$this->id;

        $db = Db::getInstance();
        $db->query($sql, $params2value, static::class);
    }
    private function insert($mappedProperties):void{

        $filterProps = array_filter($mappedProperties);
        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filterProps as $column => $value){
            $columns[] = "`$column`";
            $paramName = ":$column";
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }
        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);

        $sql = "INSERT INTO ".static::getTableName()." ($columnsViaSemicolon) VALUES ($paramsNamesViaSemicolon);";
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
        $this->refresh();

    }

    public function delete(){
        $db = Db::getInstance();
        $sql = 'DELETE FROM `'.static::getTableName().'` WHERE id = :id;';
//        var_dump($sql);
        $db->query($sql, [':id' => $this->id]);
        $this->id = null;
    }

    private function refresh(){
        $lastInsert = self::getById($this->id);
        $stage = get_object_vars($lastInsert);
        foreach ($stage as $item => $value) {
            $this->$item = $value;
        }
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    public static function findAll():array {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `'.static::getTableName().'`;', [], static::class);
    }

    public static function getById($id) {
        $db = Db::getInstance();
        $entities = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE id=:id', [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    public static function findOneByColumn(string $columnName, $value):?self{
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE `' . $columnName . '` = :value LIMIT 1;',
            [':value' => $value],
            static::class
        );
        if ($result === []){
            return null;
        }
        return $result[0];
//        return $result[0];
    }

    abstract protected static function getTableName():string;
}