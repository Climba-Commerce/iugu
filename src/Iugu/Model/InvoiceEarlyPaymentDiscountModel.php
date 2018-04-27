<?php 
namespace Iugu\Model;

class InvoiceEarlyPaymentDiscountModel
{
    
    public $days;
    public $percent;
    public $value_cents;
    
    /**
     * @return self
     */
    public static function populateResponseBody($responseBody){
        
        $model = new self();
        
        foreach ($responseBody as $key => $value){
            if (property_exists($model, $key)){
                $model->{$key} = $value;
            }
        }
        
        return $model;
        
    }
    
}