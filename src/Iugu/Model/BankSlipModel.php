<?php 
namespace Iugu\Model;

class BankSlipModel
{
    
    /**
     * Ativo?
     * @var boolean
     */
    public $active;
    
    /**
     * Dias de Vencimento Extras no Boleto (Ex: 2)
     * @var integer
     */
    public $extra_due;
    
    /**
     * Dias de Vencimento Extras na 2a Via do Boleto (Ex: 1)
     * @var integer
     */
    public $reprint_extra_due;
    
    public $digitable_line;
    public $barcode_data;
    public $barcode;
	
}