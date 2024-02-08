<?php
/* Obtener libreria */
require_once 'vendor/econea/nusoap/src/nusoap.php';
$namespace = "InsertProductSOAP";

/* Definir servidor SOAP */
$server = new soap_server();
$server->configureWSDL("InsertProduct", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

/* Definir servicio Obtener Todo*/
$server->wsdl->addComplexType(
    'GetProducts',
    'complexType',
    'struct',
    'all',
    '',
);

/* Definir respuesta Obtener Todo*/
$server->wsdl->addComplexType(
    'responseGetProducts',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Result' => array('name' => 'Result', 'type' => 'xsd:string')
    )
);

/* Obtener Todo*/
$server->register(
    'GetProductsService',
    array('GetProducts' => 'tns:GetProducts'),
    array('GetProducts' => 'tns:responseGetProducts'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Obtener todos los productos'
);

function GetProductsService() {
    require_once "config/conexion.php";
    require_once "models/Product.php";
    $product = new Product();
    $result = $product->Get_products();
    return array (
        "Result" => $result
    );
}

/* Definir servicio CREAR*/
$server->wsdl->addComplexType(
    'insertProduct',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'name' => array('name' => 'name', 'type' => 'xsd:string'),
        'description' => array('name' => 'description', 'type' => 'xsd:string'),
        'price' => array('name' => 'price', 'type' => 'xsd:decimal'),
        'stock' => array('name' => 'stock', 'type' => 'xsd:int'),
    )
);

/* Definir respuesta CREAR*/
$server->wsdl->addComplexType(
    'responseinsertProduct',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Result' => array('name' => 'Result', 'type' => 'xsd:boolean')
    )
);

/* Almacenar Producto CREAR*/
$server->register(
    'insertProductService',
    array('insertProduct' => 'tns:insertProduct'),
    array('insertProduct' => 'tns:responseinsertProduct'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Crear un nuevo producto'
);

function insertProductService($request) {
    require_once "config/conexion.php";
    require_once "models/Product.php";
    $product = new Product();
    $product->Insert_product($request['name'], $request['description'], $request['price'], $request['stock']);
    return array (
        "Result" => true
    );
}

/* Definir servicio EDITAR*/
$server->wsdl->addComplexType(
    'EditProduct',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'name' => array('name' => 'name', 'type' => 'xsd:string'),
        'description' => array('name' => 'description', 'type' => 'xsd:string'),
        'price' => array('name' => 'price', 'type' => 'xsd:decimal'),
        'stock' => array('name' => 'stock', 'type' => 'xsd:int'),
        'id' => array('name' => 'id', 'type' => 'xsd:int'),
    )
);

/* Definir respuesta EDITAR*/
$server->wsdl->addComplexType(
    'responseEditProduct',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Result' => array('name' => 'Result', 'type' => 'xsd:boolean')
    )
);

/* editar Producto EDITAR*/
$server->register(
    'EditProductService',
    array('EditProduct' => 'tns:EditProduct'),
    array('EditProduct' => 'tns:responseEditProduct'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Editar un producto'
);

function EditProductService($request) {
    require_once "config/conexion.php";
    require_once "models/Product.php";
    $product = new Product();
    $product->Edit_product($request['name'], $request['description'], $request['price'], $request['stock'],$request['id']);
    return array (
        "Result" => true
    );
}

/* Definir servicio ELIMINAR*/
$server->wsdl->addComplexType(
    'DeleteProduct',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('name' => 'id', 'type' => 'xsd:int'),
    )
);

/* Definir respuesta ELIMINAR*/
$server->wsdl->addComplexType(
    'responseDeleteProduct',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Result' => array('name' => 'Result', 'type' => 'xsd:boolean')
    )
);

/* eliminar Producto ELIMINAR*/
$server->register(
    'DeleteProductService',
    array('DeleteProduct' => 'tns:DeleteProduct'),
    array('DeleteProduct' => 'tns:responseDeleteProduct'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Eliminar un producto'
);

function DeleteProductService($request) {
    require_once "config/conexion.php";
    require_once "models/Product.php";
    $product = new Product();
    $product->Delete_product($request['id']);
    return array (
        "Result" => true
    );
}

/* Definir servicio Multiplicar 2 numeros*/
$server->wsdl->addComplexType(
    'Multiplicar2Numeros',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'num_1' => array('name' => 'num_1', 'type' => 'xsd:int'),
        'num_2' => array('name' => 'num_2', 'type' => 'xsd:int'),
    )
);

/* Definir respuesta Multiplicar 2 numeros*/
$server->wsdl->addComplexType(
    'responseMultiplicar2Numeros',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Result' => array('name' => 'Result', 'type' => 'xsd:int')
    )
);

/* Multiplicar 2 numeros*/
$server->register(
    'Multiplicar2NumerosService',
    array('Multiplicar2Numeros' => 'tns:Multiplicar2Numeros'),
    array('Multiplicar2Numeros' => 'tns:responseMultiplicar2Numeros'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Multiplicar 2 numeros'
);

function Multiplicar2NumerosService($request) {
    require_once "config/conexion.php";
    require_once "models/Product.php";
    $product = new Product();
    $result = $product->Multiplicar($request['num_1'], $request['num_2']);
    return array (
        "Result" => $result
    );
}

$POST_DATA = file_get_contents( 'php://input' );
$server->service($POST_DATA);
?>