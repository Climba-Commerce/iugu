<?php 
namespace Iugu\Model;

class ChargeModel extends StandardModel
{
    
    /**
     * Método de pagamento (Atualmente só suporta "bank_slip", que é boleto bancário. Não é preenchido se enviar parâmetro token)
     * @var string
     */
    public $method;
    
    /**
     * ID do Token. Não é preenchido caso o método de pagamento seja "bank_slip". Em caso de Marketplace, é possível enviar um token criado pela conta mestre.
     * @var string
     */
    public $token;
    
    /**
     * ID da Forma de Pagamento do Cliente. Em caso de Marketplace, é possível enviar um "customer_payment_method_id" de um Cliente criado pela conta mestre (não é preenchido caso Método de Pagamento seja "bank_slip" ou utilize "token")
     * @var string
     */
    public $customer_payment_method_id;
    
    /**
     * Se true, restringe o método de pagamento da cobrança para o definido em method.
     * @var boolean
     */
    public $restrict_payment_method;
    
    /**
     * ID do Cliente. Utilizado para vincular a Fatura a um Cliente
     * @var string
     */
    public $customer_id;
    
    /**
     * ID da Fatura a ser utilizada para pagamento
     * @var string
     */
    public $invoice_id;
    
    /**
     * E-mail do Cliente (não é preenchido caso seja enviado um "invoice_id")
     * @var string
     */
    public $email;
	
    /**
     * Número de Parcelas (2 até 12), não é necessário passar 1. Não é preenchido caso o método de pagamento seja "bank_slip"
     * @var integer
     */
    public $months;
    
    /**
     * Valor dos Descontos em centavos. Funciona apenas para Cobranças Diretas criadas com Itens.
     * @var integer
     */
    public $discount_cents;
    
    /**
     * Define o prazo em dias para o pagamento do boleto. Caso não seja enviado, aplica-se o prazo padrão de 3 dias corridos.
     * @var integer
     */
    public $bank_slip_extra_days;
    
    /**
     * Por padrão, a fatura é cancelada caso haja falha na cobrança, a não ser que este parâmetro seja enviado como "true". Obs: Funcionalidade disponível apenas para faturas criadas no momento da cobrança.
     * @var boolean
     */
    public $keep_dunning;
    
    /**
     * Itens de cobrança da Fatura que será gerada. "price_cents" valor mínimo 100.
     * @var ItemModel[]
     */
    public $items=array();
    
    /**
     * Informações do cliente "payer" são obrigatórias para a emissão de boletos registrados ou necessárias para seu sistema de antifraude.
     * @var PayerModel
     */
    public $payer;
    
}