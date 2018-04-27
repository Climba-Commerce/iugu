<?php 
namespace Iugu\Model;

class InvoiceModel extends StandardModel
{
    
    /**
     * E-mail do cliente
     * @var string
     */
    public $email;
    
    /**
     * Endereços de E-mail para cópia separados por ponto e vírgula.
     * @var string
     */
    public $cc_emails;
    
    /**
     * Data do vencimento. (Formato: 'AAAA-MM-DD').
     * @var string
     */
    public $due_date;
    
    /**
     * Se true, garante que a data de vencimento seja apenas em dias de semana, e não em sábados ou domingos.
     * @var boolean
     */
    public $ensure_workday_due_date;
    
    /**
     * Itens da fatura. "price_cents" valor mínimo 100.
     * @var ItemModel[]
     */
    public $items = array();
    
    /**
     * Cliente é redirecionado para essa URL após efetuar o pagamento da Fatura pela página de Fatura da Iugu
     * @var string
     */
    public $return_url;
    
    /**
     * Cliente é redirecionado para essa URL se a Fatura que estiver acessando estiver expirada
     * @var string
     */
    public $expired_url;
    
    /**
     * URL chamada para todas as notificações de Fatura, assim como os webhooks (Gatilhos) são chamados
     * @var string
     */
    public $notification_url;
    
    /**
     * Booleano para Habilitar ou Desabilitar multa por atraso de pagamento
     * @var boolean
     */
    public $fines;
    
    /**
     * Determine a multa % a ser cobrada para pagamentos efetuados após a data de vencimento
     * @var integer
     */
    public $late_payment_fine;
    
    /**
     * Booleano que determina se cobra ou não juros por dia de atraso. 1% ao mês pro rata.
     * @var boolean
     */
    public $per_day_interest;
    
    /**
     * Valor dos Descontos em centavos
     * @var integer
     */
    public $discount_cents;
    
    /**
     * ID do Cliente
     * @var string
     */
    public $customer_id;
    
    /**
     * Booleano que ignora o envio do e-mail de cobrança
     * @var boolean
     */
    public $ignore_due_email;
    
    /**
     * Amarra esta Fatura com a Assinatura especificada. Esta fatura não causa alterações na assinatura vinculada.
     * @var string
     */
    public $subscription_id;
    
    /**
     * Método de pagamento que será disponibilizado para esta Fatura ("all", "credit_card" ou "bank_slip"). 
     * Obs: Caso esta Fatura esteja atrelada à uma Assinatura, a prioridade é herdar o valor atribuído na Assinatura; 
     * caso esta esteja atribuído o valor 'all', o sistema considerará o 'payable_with' da Fatura; 
     * se não, o sistema considerará o 'payable_with' da Assinatura.
     */
    public $payable_with;
    
    /**
     * Caso tenha o 'subscription_id', pode-se enviar o número de créditos a adicionar nessa Assinatura baseada em créditos, quando a Fatura for paga.
     * @var integer
     */
    public $credits;
    
    /**
     * Logs da Fatura
     * @var InvoiceLogModel[]
     */
    public $logs = array();
    
    /**
     * Variáveis Personalizadas
     * @var CustomVariableModel[]
     */
    public $custom_variables;
    
    /**
     * Ativa ou desativa os descontos por pagamento antecipado. Quando true, sobrepõe as configurações de desconto da conta.
     * @var boolean
     */
    public $early_payment_discount;
    
    /**
     * Quantidade de dias de antecedência para o pagamento receber o desconto (Se enviado, substituirá a configuração atual da conta)
     * @var InvoiceEarlyPaymentDiscountModel[]
     */
    public $early_payment_discounts;
    
    /**
     * Informações do cliente abaixo "payer" são obrigatórias para a emissão de boletos registrados ou necessárias para seu sistema de antifraude.
     * @var PayerModel
     */
    public $payer;
    
    
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