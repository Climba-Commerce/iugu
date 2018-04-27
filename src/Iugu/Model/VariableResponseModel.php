<?php 
namespace Iugu\Model;

class VariableResponseModel extends PopulateResponseFactory
{
    
    public $name;
    public $value;
    
    public static function populateResponseBody($responseBody){
        return static::genericPopulateResponseBody(new self(), $responseBody);
    }
    
}