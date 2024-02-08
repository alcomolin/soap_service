
# Servicio SOAP

Para consumir este servicio desde PHP es posible utilizar el siguiente cURL:



```javascript
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/soap_service/Product.php?wsdl',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ins="InsertProductSOAP">
   <soapenv:Header/>
   <soapenv:Body>
      <ins:GetProductsService soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
         <GetProducts xsi:type="ins:GetProducts"/>
      </ins:GetProductsService>
   </soapenv:Body>
</soapenv:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: text/xml',
    'SOAPAction: http://localhost/soap_service/Product.php/GetProductsService'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

```

