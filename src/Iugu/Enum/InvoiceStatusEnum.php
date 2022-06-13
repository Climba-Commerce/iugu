<?php 
namespace Iugu\Enum;

class InvoiceStatusEnum
{
    
    const PENDING                 = 'pending';
    const REFUNDED                = 'refunded';
    const CANCELED                = 'canceled';
    const EXPIRED                 = 'expired';
    const AUTHORIZED              = 'authorized';
    const IN_ANALYSIS             = 'in_analysis';
    const PAID                    = 'paid';
    const DONE                    = 'done';
    const PARTIALLY_PAID          = 'partially_paid';
    const IN_PROTEST              = 'in_protest';
    const PARTIALLY_REFUNDED      = 'partially_refunded';
    
    public static function getDescription($statusCode){
        
        switch($statusCode) {
            case static::PENDING:           return 'Pendente';
            case static::REFUNDED:          return 'Reembolsado';
            case static::CANCELED:          return 'Cancelado';
            case static::EXPIRED:           return 'Expirado';
            case static::AUTHORIZED:        return 'Autorizado';
            case static::IN_ANALYSIS:       return 'Em Análise';
            case static::PAID:              return 'Pago';
            case static::DONE:              return 'Concluído';
            case static::PARTIALLY_PAID:    return 'Pago Parcialmente';
            case static::IN_PROTEST:        return 'Em Protesto';
            case static::PARTIALLY_REFUNDED:        return 'Estornado Parcialmente';
        }
    
        return 'Desconhecido';
    
    }
    
    public static function generateList() {
        
        $reflect    = new \ReflectionClass('Iugu\Enum\InvoiceStatusEnum');
        $constantes = $reflect->getConstants();
        
        $list = array();
        foreach ($constantes as $value){
            $list[$value] = self::getDescription($value);
        }
        
        return $list;
        
    }
    
}