<?php 
namespace Iugu\Model;

class AccountConfigurationModel extends StandardModel
{
	
    /**
     * Percentual de comissionamento enviado para a conta que gerencia o marketplace (Valor entre 0 e 70)
     * @var string
     */
    public $commission_percent;
    
    /**
     * Saque automático?
     * @var boolean
     */
    public $auto_withdraw;
    
    /**
     * Multas?
     * @var boolean
     */
    public $fines;
    
    /**
     * Juros de mora?
     * @var boolean
     */
    public $per_day_interest;
    
    /**
     * Valor da multa em % (Ex: 2)
     * @var integer
     */
    public $late_payment_fine;
	
    /**
     * Antecipação Automática. 
     * Só pode ser atribuído caso a conta tenha a funcionalidade de Novo Adiantamento habilitado (entre em contato com o Suporte para habilitar)
     * @var boolean
     */
    public $auto_advance;
    
    /**
     * Opções de Antecipação Automática. 
     * Obrigatório caso auto_advance seja true. 
     * Recebe os valores 'daily' (Antecipação diária), 
     * 'weekly' (Antecipação semanal, que ocorre no dia da semana determinado pelo usuário), 
     * 'monthly' (Antecipação mensal, que ocorre no dia do mês determinado pelo usuário) 
     * e 'days_after_payment' (Antecipação que ocorre em um número de dias após o pagamento especificado pelo usuário)
     * @var string
     */
    public $auto_advance_type;
	
    /**
     * Obrigatório caso auto_advance seja true e auto_advance_type diferente de 'daily'. 
     * Em caso de auto_advance_type = weekly, 
     * recebe valores de 0 a 6 (Número correspondente ao dia da semana que a antecipação será realizada, 
     * 0 para domingo, 
     * 1 para segunda e assim por diante). 
     * Em caso de auto_advance_type = monthly, recebe valores de 1 a 28 (Número correspondente ao dia do mês que a antecipação será realizada). 
     * Em caso de auto_advance_type = days_after_payment, recebe valores de 1 a 30 (Número de dias após o pagamento em que a antecipação será realizada)
     * @var integer
     */
    public $auto_advance_option;
    
    /**
     * Configurações de boleto bancário
     * @var BankSlipModel
     */
    public $bank_slip;
    
    /**
     * Configurações do Cartão de Crédito
     * @var CreditCardModel
     */
    public $credit_card;
    
    /**
     * Ativa ou desativa a notificação de pagamento
     * @var boolean
     */
    public $payment_email_notification;
    
    /**
     * Email que deve receber as notificações de pagamento (Obrigatório caso payment_email_notification seja true)
     * @var string
     */
    public $payment_email_notification_receiver;
    
    /**
     * Ativa ou desativa o desconto por pagamento antecipado
     * @var boolean
     */
    public $early_payment_discount;
    
    /**
     * Configuração do desconto a ser aplicado
     * @var array
     */
    public $early_payment_discounts;

    public $pix;
    
}