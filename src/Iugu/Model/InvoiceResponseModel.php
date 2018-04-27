<?php 
namespace Iugu\Model;

class InvoiceResponseModel extends PopulateResponseFactory
{

    public $due_date;
    public $currency;
    public $discount_cents;
    public $email;
    public $items_total_cents;
    public $notification_url;
    public $return_url;
    public $status;
    public $tax_cents;
    public $updated_at;
    public $total_cents;
    public $total_paid_cents;
    public $paid_at;
    public $taxes_paid_cents;
    public $paid_cents;
    public $cc_emails;
    public $financial_return_date;
    public $payable_with;
    public $overpaid_cents;
    public $ignore_due_email;
    public $ignore_canceled_email;
    public $advance_fee_cents;
    public $commission_cents;
    public $early_payment_discount;
    public $secure_id;
    public $secure_url;
    public $customer_id;
    public $customer_ref;
    public $customer_name;
    public $user_id;
    public $total;
    public $taxes_paid;
    public $total_paid;
    public $total_overpaid;
    public $commission;
    public $fines_on_occurrence_day;
    public $total_on_occurrence_day;
    public $fines_on_occurrence_day_cents;
    public $total_on_occurrence_day_cents;
    public $advance_fee;
    public $paid;
    public $interest;
    public $discount;
    public $created_at;
    public $refundable;
    public $installments;
    public $transaction_number;
    public $payment_method;
    public $created_at_iso;
    public $updated_at_iso;
    public $occurrence_date;
    public $financial_return_dates;
    public $bank_slip;
    public $early_payment_discounts;
    
    /**
     * 
     * @var ItemResponseModel[] $items
     */
    public $items;
    
    /**
     * 
     * @var VariableResponseModel[] $variables
     */
    public $variables;
    
    /**
     * @var VariableResponseModel[] $custom_variables
     */
    public $custom_variables;
    
    /**
     * @var LogResponseModel[] $logs
     */
    public $logs;
    
    public static function populateResponseBody($responseBody){
        return static::genericPopulateResponseBody(new self(), $responseBody);
    }
    
}