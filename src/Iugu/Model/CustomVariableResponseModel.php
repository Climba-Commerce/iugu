<?php 
namespace Iugu\Model;

class CustomVariableResponseModel extends PopulateResponseFactory
{
    
    public $id;
    public $variable;
    public $value;
    
    public static function populateResponseBody($responseBody){
        return static::genericPopulateResponseBody(new self(), $responseBody);
    }
    
}