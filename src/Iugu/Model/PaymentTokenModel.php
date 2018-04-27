<?php 
namespace Iugu\Model;

class PaymentTokenModel
{
    
    /**
     * Obrigatório - ID de sua Conta na Iugu
     * @var string
     */
    public $account_id;
    
    /**
     * Obrigatório - Método de Pagamento (atualmente somente credit_card)
     * @var string
     */
    public $method;
    
    /**
     * Valor true para criar tokens de teste. Use cartões de teste
     * https://support.iugu.com/hc/pt-br/articles/212456346-Usar-cart%C3%B5es-de-teste-em-modo-de-teste
     * @var boolean
     */
    public $test=false;
    
    /**
     * @var PaymentTokenDataModel
     */
    public $data;
    
}