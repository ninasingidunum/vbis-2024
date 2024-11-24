<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class ProductModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $type='';
    public string $brand ='';
    public string $description = '';
    public int $price;
    //public string $image='';

    public function tableName()
    {
        return "product";
    }

    public function readColumns()
    {
        return ["id","name","type","brand", "description","price","image"];
    }

    public function editColumns()
    {
        return ["name","type","brand", "description","price","image"];
    }

    public function validationRules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "type" => [self::RULE_REQUIRED],
            "brand" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
            "description" => [self::RULE_REQUIRED]
        ];
    }
}