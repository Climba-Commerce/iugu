<?php 
namespace Iugu\Enum;

class ChargeStatusEnum
{
    
    const AUTHORIZED              = 1;
    const DENIED                  = 0;
    
    public static function getDescription($authorizationCode){
        
        switch($authorizationCode) {
            case static::AUTHORIZED:    return 'Autorizado';
            case static::DENIED:        return 'Negado';
        }
        
        return 'Desconhecido';
        
    }
    
    public static function generateList() {
    
        $reflect    = new \ReflectionClass('Iugu\Enum\ChargeStatusEnum');
        $constantes = $reflect->getConstants();
    
        $list = array();
        foreach ($constantes as $value){
            $list[$value] = self::getDescription($value);
        }
    
        return $list;
    
    }
    
}