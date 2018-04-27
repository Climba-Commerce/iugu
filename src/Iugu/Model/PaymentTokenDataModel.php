<?php 
namespace Iugu\Model;

class PaymentTokenDataModel
{
    
    /**
     * Obrigatório - Número do Cartão de Crédito
     * @var string
     */
    public $number;
    
    /**
     * Obrigatório - CVV do Cartão de Crédito
     * @var string
     */
    public $verification_value;
    
    /**
     * Obrigatório - Nome do Cliente como está no Cartão
     * @var string
     */
    public $first_name;
    
    /**
     * Obrigatório - Sobrenome do Cliente como está no Cartão
     * @var string
     */
    public $last_name;
    
    /**
     * Obrigatório - Mês de Vencimento no Formato "MM" (Ex: 01, 06, 12)
     * @var string
     */
    public $month;
    
    /**
     * Obrigatório - Ano de Vencimento no Formato "AAAA" (Ex: 2020, 2030, 2018)
     * @var string
     */
    public $year;
    
    
}