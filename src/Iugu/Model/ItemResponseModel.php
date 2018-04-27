<?php 
namespace Iugu\Model;

class ItemResponseModel extends PopulateResponseFactory
{
    
    public $id;
    public $description;
    public $quantity;
    public $created_at;
    public $updated_at;
    public $price;
    
    public static function populateResponseBody($responseBody){
        return static::genericPopulateResponseBody(new self(), $responseBody);
    }
    
}