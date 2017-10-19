<?php
namespace AppBundle\Entity;

class AbstractEntity
{
    public function fieldData($params) {
        foreach ($params as $key=>$value) {
            $this->$key = $value;
        }
    }
}