<?php 
namespace Iugu\Model;

class DuplicateInvoiceModel
{
    
    /**
     * Nova data de vencimento no formato AAAA-MM-DD.
     * @var date
     */
    public $due_date;
    
    /**
     * Adicione, altere ou remova itens da nova fatura. Para remover, envie "id" do subitem + "_destroy=true"
     * @var ItemModel
     */
    public $items=array();
    
    /**
     * Ignora o envio do e-mail de cobrança da nova fatura.
     * @var boolean
     */
    public $ignore_due_email;
    
    /**
     * Ignora o envio do e-mail de cancelamento da fatura atual.
     * @var boolean
     */
    public $ignore_canceled_email;
    
    /**
     * Caso true, aplica multas da fatura original à segunda via.
     * @var boolean
     */
    public $current_fines_option;
    
    /**
     * Caso true, copia os descontos de pagamento antecipado da fatura original para a 2ª via.
     * @var boolean
     */
    public $keep_early_payment_discount;
    
}