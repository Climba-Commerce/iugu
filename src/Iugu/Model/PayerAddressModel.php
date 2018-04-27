<?php 
namespace Iugu\Model;

class PayerAddressModel
{
    
    /**
     * Rua
     * @var string
     */
    public $street;
    
    /**
     * Número
     * @var string
     */
    public $number;
    
    /**
     * Bairro
     * @var string
     */
    public $district;
    
    /**
     * Cidade
     * @var string
     */
    public $city;
    
    /**
     * Estado
     * @var string
     */
    public $state;
    
    /**
     * Cep
     * @var string
     */
    public $zip_code;
    
    /**
     * Complemento
     * @var string
     */
    public $complement;
    
}