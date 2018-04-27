<?php
namespace Iugu;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Iugu\Model\AccountConfigurationModel;
use Iugu\Model\ChargeModel;
use Iugu\Model\CustomerModel;
use Iugu\Model\DuplicateInvoiceModel;
use Iugu\Model\InvoiceModel;
use Iugu\Model\PaymentTokenModel;
use Iugu\Model\StandardResponse;

class Iugu
{
    
    private $baseUri = 'https://api.iugu.com/v1/';
    private $accountId;
    private $token;
    
    public function __construct($accountId, $token){
        $this->accountId    = $accountId;
        $this->token        = $token;
    }
    
    public function postCharge(ChargeModel $charge){
        
        $data           = array();
        $data['json']   = $this->populateJson($charge);
        
        return $this->send('POST', 'charge', $data);
        
    }
    
    public function postInvoice(InvoiceModel $invoice){
        
        $data           = array();
        $data['json']   = $this->populateJson($invoice);
        
        return $this->send('POST', 'invoices', $data);
        
    }
    
    public function postDuplicateInvoice($idOldInvoice, DuplicateInvoiceModel $duplicateInvoice){
        
        $data           = array();
        $data['json']   = $duplicateInvoice;
        
        return $this->send('POST', "invoices/$idOldInvoice/duplicate", $data);
        
    }
    
    public function postRefundInvoice($invoiceId){
        
        return $this->send('POST', "invoices/$invoiceId/refund");
        
    }
    
    public function postCaptureInvoice($invoiceId){
        
        return $this->send('POST', "invoices/$invoiceId/capture");
        
    }
    
    public function postPaymentToken(PaymentTokenModel $paymentToken){
        
        $data           = array();
        $data['json']   = $this->populateJson($paymentToken);
        
        return $this->send('POST', 'payment_token', $data);
        
    }
    
    public function postCustomer(CustomerModel $customer){
        
        $data           = array();
        $data['json']   = $this->populateJson($customer);
        
        return $this->send('POST', 'customers', $data);
        
    }
    
    public function putCustomer($customerId, CustomerModel $customer){
        
        $data           = array();
        $data['json']   = $this->populateJson($customer);
        
        return $this->send('PUT', "customers/$customerId", $data);
        
    }
    
    public function getCustomer($customerId){
        
        return $this->send('GET', "customers/$customerId");
        
    }
    
    public function getInvoice($invoiceId){
        
        return $this->send('GET', "invoices/$invoiceId");
        
    }
    
    /**
     * @param AccountConfigurationModel $accountConfiguration
     * @return \Iugu\Model\StandardResponse|boolean
     */
    public function postAccountConfiguration(AccountConfigurationModel $accountConfiguration){
        
        $data           = array();
        $data['json']   = $this->populateJson($accountConfiguration);
        
        return $this->send('POST', 'accounts/configuration', $data);
        
    }
    
    /**
     * Faz a população do json de acordo com os dados fornecidos para cada tipo de requisição
     */
    private function populateJson($objeto){
        
        $objeto->id = $this->accountId;
        
        return $objeto;
        
    }
    
    /**
     * @return string
     */
    private function generateAuthorizationCode(){
        return \base64_encode($this->token.':');
    }
    
    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return StandardResponse|boolean
     */
    private function send($method, $url, $data=array()){
        
        try {
            
            $data['headers']['Authorization'] = 'Basic '.$this->generateAuthorizationCode();
            
            $client = new Client(['base_uri' => $this->baseUri, 'exceptions' => false]);
            
            return $this->generateStandardResponse($client->request($method, $url, $data));
            
        } catch (\Exception $e) {
            return false;
        }
        
    }
    
    /**
     * @param Response $response
     * @return \Iugu\Model\StandardResponse
     */
    private function generateStandardResponse(Response $response){
        
        $standardResponse                   = new StandardResponse();
        $standardResponse->statusCode       = $response->getStatusCode();
        $standardResponse->responseBody     = \json_decode($response->getBody(), true);
        
        return $standardResponse;
        
    }
	
}
