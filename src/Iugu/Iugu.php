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
    
    /**
     * Se definido, irá salvar todos os logs de requisição/resposta passados pela biblioteca
     * @example nome_pasta/2018/04/30/iugu.log
     * @var string $logsName
     */
    private $logsName;
    
    protected $logger;
    
    public function __construct($accountId, $token, $logsName=false){
        $this->accountId    = $accountId;
        $this->token        = $token;
        $this->logsName     = $logsName;
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
    
    public function postRefundInvoice($invoiceId, $value = null){

        $data = array();

        if ($value){
            $data['json']   = array('partial_value_refund_cents' => $value);
        }

        return $this->send('POST', "invoices/$invoiceId/refund", $data);
        
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
     * @return bool|StandardResponse
     */
    public function getAccountInformations(){

        $data           = array();

        return $this->send('GET', 'accounts/'.$this->accountId, $data);

    }
    
    /**
     * Faz a população do json de acordo com os dados fornecidos para cada tipo de requisição
     */
    private function populateJson($objeto){
        
        $objeto->id = $this->accountId;
        $objeto->account_id = $this->accountId;
        
        return $objeto;
        
    }
    
    /**
     * @return string
     */
    private function generateAuthorizationCode(){
        return \base64_encode($this->token.':');
    }
    

    private function getLogger() {
    	if (!$this->logger) {
    		$this->logger = with(new \Monolog\Logger('Iugu'))->pushHandler(
				new \Monolog\Handler\RotatingFileHandler($this->logsName)
			);
    	}
    
    	return $this->logger;
    	
    }
    

    private function createGuzzleLoggingMiddleware($messageFormat) {
    	return \GuzzleHttp\Middleware::log(
    			$this->getLogger(),
    			new \GuzzleHttp\MessageFormatter($messageFormat)
    			);
    }
    
    private function createLoggingHandlerStack(array $messageFormats) {
    	
    	$stack = \GuzzleHttp\HandlerStack::create();
    
    	collect($messageFormats)->each(function ($messageFormat) use ($stack) {
    		$stack->unshift(
				$this->createGuzzleLoggingMiddleware($messageFormat)
			);
    	});
    	
		return $stack;
		
    }
    
    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return StandardResponse|boolean
     */
    private function send($method, $url, $data=array()){
        
        try {
            
            $data['headers']['Authorization'] 	= 'Basic '.$this->generateAuthorizationCode();
            
            $clientParams 						= array();
            $clientParams['base_uri'] 			= $this->baseUri;
            $clientParams['exceptions'] 		= false;
            
            if ($this->logsName){
	            $clientParams['handler'] 		= $this->createLoggingHandlerStack(['{method} {uri} HTTP/{version} {req_body}', 'Resposta: {code} - {res_body}']);
            }
            
            $client = new Client($clientParams);
            
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
