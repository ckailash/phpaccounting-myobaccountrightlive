<?php

namespace PHPAccounting\MyobAccountRightLive\Helpers\Essentials;

class IndexSanityInsertionHelper
{
    public static function indexSanityInsert ($key, $data, $model, $method) {
        $value = IndexSanityCheckHelper::indexSanityCheck($key, $data);
        if($value !== '') {
            $model->$method($value);
        }
        return $model;
    }
}