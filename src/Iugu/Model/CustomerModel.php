<?php 
namespace Iugu\Model;

class CustomerModel extends StandardModel
{
    
    /**
     * ID
     * @var string
     */
    public $id;
    
    /**
     * E-mail *
     * @var string
     */
    public $email;
    
    /**
     * Nome do cliente *
     * @var string
     */
    public $name;
    
    /**
     * Notas
     * @var string
     */
    public $notes;
    
    /**
     * Prefixo, apenas números - 3 dígitos (obrigatório caso preencha "phone")
     * @var integer
     */
    public $phone_prefix;
    
    /**
     * Número do Telefone - 9 dígitos
     * @var integer
     */
    public $phone;

    /**
     * CPF ou CNPJ do cliente. Obrigatório para emissão de boletos registrados.
     * @var string
     */
    public $cpf_cnpj;
    
    /**
     * Endereços de E-mail para cópia separados por vírgula
     * @var string
     */
    public $cc_emails;

    /**
     * CEP. Obrigatório para emissão de boletos registrados
     * @var string
     */
    public $zip_code;
    
    /**
     * Número do endereço (obrigatório caso "zip_code" seja enviado)
     * @var integer
     */
    public $number;
    
    /**
     * Rua. Obrigatório caso CEP seja incompleto.
     * @var string
     */
    public $street;
    
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
     * Bairro. Obrigatório caso CEP seja incompleto.
     * @var string
     */
    public $district;
    
    /**
     * Complemento de endereço. Ponto de referência.
     * @var string
     */
    public $complement;
    
    /**
     * Variáveis Personalizadas
     * @var CustomVariableModel[]
     */
    public $custom_variables=array();
    
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