<?php

require_once('lib/nusoap.php');

// read ID, Username and Password from config.ini
$config = parse_ini_file("config.ini");

// init soap client
$client = new nusoap_client("https://www.ewaygateway.com/gateway/ManagedPaymentService/test/managedCreditCardPayment.asmx", false);
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
	exit();
}

// set namespace
$client->namespaces['man'] = 'https://www.eway.com.au/gateway/managedpayment';
// set SOAP header
$headers = "<man:eWAYHeader><man:eWAYCustomerID>" . $config['eWAYCustomerID'] . "</man:eWAYCustomerID><man:Username>" . $config['UserName'] . "</man:Username><man:Password>" . $config['Password'] . "</man:Password></man:eWAYHeader>";
$client->setHeaders($headers);

$filename; // append results to original file
// from POST
$action = isset($_POST['action']) ? $_POST['action'] : '';
if ( $action == 'create_customer' ) {
    $requestbody = array(
        'man:Title' => $_POST['Title'],
        'man:FirstName' => $_POST['FirstName'],
        'man:LastName' => $_POST['LastName'],
        'man:Address' => $_POST['Address'],
        'man:Suburb' => $_POST['Suburb'],
        'man:State' => $_POST['State'],
        'man:Company' => $_POST['Company'],
        'man:PostCode' => $_POST['PostCode'],
        'man:Country' => $_POST['Country'],
        'man:Email' => $_POST['Email'],
        'man:Fax' => $_POST['Fax'],
        'man:Phone' => $_POST['Phone'],
        'man:Mobile' => $_POST['Mobile'],
        'man:CustomerRef' => $_POST['CustomerRef'],
        'man:JobDesc' => $_POST['JobDesc'],
        'man:Comments' => $_POST['Comments'],
        'man:URL' => $_POST['URL'],
        'man:CCNumber' => $_POST['CCNumber'],
        'man:CCNameOnCard' => $_POST['CCNameOnCard'],
        'man:CCExpiryMonth' => $_POST['CCExpiryMonth'],
        'man:CCExpiryYear' => $_POST['CCExpiryYear']
    );
    $soapaction = 'https://www.eway.com.au/gateway/managedpayment/CreateCustomer';
    $result = $client->call('man:CreateCustomer', $requestbody, '', $soapaction);
    $filename = 'CreateCustomer.htm';
} else if ( $action == 'update_customer' ) {
    $requestbody = array(
        'man:managedCustomerID' => $_POST['managedCustomerID'],
        'man:Title' => $_POST['Title'],
        'man:FirstName' => $_POST['FirstName'],
        'man:LastName' => $_POST['LastName'],
        'man:Address' => $_POST['Address'],
        'man:Suburb' => $_POST['Suburb'],
        'man:State' => $_POST['State'],
        'man:Company' => $_POST['Company'],
        'man:PostCode' => $_POST['PostCode'],
        'man:Country' => $_POST['Country'],
        'man:Email' => $_POST['Email'],
        'man:Fax' => $_POST['Fax'],
        'man:Phone' => $_POST['Phone'],
        'man:Mobile' => $_POST['Mobile'],
        'man:CustomerRef' => $_POST['CustomerRef'],
        'man:JobDesc' => $_POST['JobDesc'],
        'man:Comments' => $_POST['Comments'],
        'man:URL' => $_POST['URL'],
        'man:CCNumber' => $_POST['CCNumber'],
        'man:CCNameOnCard' => $_POST['CCNameOnCard'],
        'man:CCExpiryMonth' => $_POST['CCExpiryMonth'],
        'man:CCExpiryYear' => $_POST['CCExpiryYear'],
    );
    $soapaction = 'https://www.eway.com.au/gateway/managedpayment/UpdateCustomer';
    $result = $client->call('man:UpdateCustomer', $requestbody, '', $soapaction);
    $filename = 'UpdateCustomer.htm';
} else if ( $action == 'process_payment' ) {
    $requestbody = array(
        'man:managedCustomerID' => $_POST['managedCustomerID'],
        'man:amount' => $_POST['amount'],
        'man:invoiceReference' => $_POST['invoiceReference'],
        'man:invoiceDescription' => $_POST['invoiceDescription']
    );
    $soapaction = 'https://www.eway.com.au/gateway/managedpayment/ProcessPayment';
    $result = $client->call('man:ProcessPayment', $requestbody, '', $soapaction);
    $filename = 'ProcessPayment.htm';
} else if ( $action == 'query_payment' ) {
    $requestbody = array(
        'man:managedCustomerID' => $_POST['managedCustomerID']
    );
    $soapaction = 'https://www.eway.com.au/gateway/managedpayment/QueryPayment';
    $result = $client->call('man:QueryPayment', $requestbody, '', $soapaction);
    $filename = 'QueryPayment.htm';
} else if ( $action == 'query_customer' ) {
    $requestbody = array(
        'man:managedCustomerID' => $_POST['managedCustomerID']
    );
    $soapaction = 'https://www.eway.com.au/gateway/managedpayment/QueryCustomer';
    $result = $client->call('man:QueryCustomer', $requestbody, '', $soapaction);
    $filename = 'QueryCustomer.htm';
} else if ( $action == 'query_customer_ref' ) {
    $requestbody = array(
        'man:CustomerReference' => $_POST['CustomerReference']
    );
    $soapaction = 'https://www.eway.com.au/gateway/managedpayment/QueryCustomerByReference';
    $result = $client->call('man:QueryCustomerByReference', $requestbody, '', $soapaction);
    $filename = 'QueryCustomerByReference.htm';
} else {
    $filename = 'SampleModule.htm';
}

$fh = fopen($filename, 'r');
$html = fread($fh, filesize($filename));
fclose($fh);
echo $html;
if ($filename == 'SampleModule.htm') {
    exit();
}

if ($client->fault) {
	echo '<h2>Fault (Expect - The request contains an invalid SOAP body)</h2><pre>'; print_r($result); echo '</pre>';
} else {
	$err = $client->getError();
	if ($err) {
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		echo '<h2>Result</h2><pre>'; print_r($result); echo '</pre>';
	}
}
//echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
//echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
//echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';

?>