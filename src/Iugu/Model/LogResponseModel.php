<?php 
namespace Iugu\Model;

class LogResponseModel extends PopulateResponseFactory
{
    
    public $id;
    public $description;
    public $notes;
    public $created_at;
    
    public static function populateResponseBody($responseBody){
        return static::genericPopulateResponseBody(new self(), $responseBody);
    }
    
}