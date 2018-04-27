<?php 
namespace Iugu\Model;

class PopulateResponseFactory
{
	
    public static function mapObjects(){
    
        $objects                        = array();
        $objects['items']               = array('object' => new ItemResponseModel(),            'type' => 'array');
        $objects['custom_variables']    = array('object' => new VariableResponseModel(),        'type' => 'array');
        $objects['variables']           = array('object' => new CustomVariableResponseModel(),  'type' => 'array');
        $objects['logs']                = array('object' => new LogResponseModel(),             'type' => 'array');
    
        return $objects;
    
    }
    
    /**
     * @return self
     */
    public static function genericPopulateResponseBody($model, $responseBody){
        
        $objectsMap = static::mapObjects();
    
        foreach ($responseBody as $key => $value){
            if (property_exists($model, $key)){
                if (isset($objectsMap[$key])){
    
                    $object = $objectsMap[$key];
                    if ($object['type'] == 'array'){
    
                        $model->{$key} = array();
    
                        foreach ($value as $arrayKey => $arrayValue){
                            $model->{$key}[] = $object['object']->populateResponseBody($arrayValue);
                        }
    
                    }
    
                }else{
                    $model->{$key} = $value;
                }
            }
        }
    
        return $model;
    
    }
    
}