<?php 
namespace Iugu\Model;

class PayerModel
{
    
    /**
     * CPF ou CNPJ
     * @var string
     */
    public $cpf_cnpj;
    
    /**
     * Nome
     * @var string
     */
    public $name;
    
    /**
     * Prefixo do número de telefone
     * @var string
     */
    public $phone_prefix;
    
    /**
     * Número de telefone
     * @var string
     */
    public $phone;
    
    /**
     * E-mail
     * @var string
     */
    public $email;
    
    /**
     * Endereço do cliente
     * @var PayerAddressModel
     */
    public $address;
    
}