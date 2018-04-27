<?php 
namespace Iugu\Model;

class CreditCardModel
{
    
    /**
     * Ativo?
     * @var boolean
     */
    public $active;
    
    /**
     * Descrição que apareça na Fatura do Cartão do Cliente (Máx: 12 Caracteres)
     * @var string
     */
    public $soft_descriptor;
    
    /**
     * Parcelamento ativo?
     * @var boolean
     */
    public $installments;
    
    /**
     * Número máximo de parcelas (Nr entre 1 a 12)
     * @var integer
     */
    public $max_installments;
    
    /**
     * Número de parcelas sem cobrança de juros ao cliente (Nr entre 1 a 12). *somente contas antigas
     * @var integer
     */
    public $max_installments_without_interest;
    
    /**
     * Habilita o fluxo de pagamento em duas etapas (Autorização e Captura)
     * @var boolean
     */
    public $two_step_transaction;
    
    /**
     * Repasse de Juros de Parcelamento ativo? *somente contas antigas
     * @var boolean
     */
    public $installments_pass_interest;
	
}