<?php
require 'vendor/autoload.php';
require 'db.php';
$app = new \Slim\App;

//1. INSERT A PATIENT

//POST - add a single user record

// $app->post('/insertpatient', function ($request, $response, $args) {

//     // $inputJSON = file_get_contents('php://input');
//     // $input = json_decode($inputJSON, TRUE);

//      $pName = $_POST['patientName'];
//      $pAge = $_POST['patientAge'];
//      $pAddress = $_POST['patientAddress'];
//      $pIC = $_POST['patientIC'];
//      $dateAdmission = $_POST['dateOfAdmission'];
//      $status = $_POST['patientStatus'];

 
//      $sql = "INSERT INTO patients(patientName,patientAge,patientAddress,patientIC,dateOfAdmission,patientStatus) VALUES ('$pName','$pAge','$pAddress','$pIC', '$dateAdmission', '$status')";
 
 
//      try{
//          // Get DB Object
//          $db = new db();
//          // Connect
//          $db = $db->connect();
//          $stmt = $db->query($sql);
//          $patient = $stmt->fetchAll(PDO::FETCH_OBJ);
//          $db = null;
//          echo json_encode($patient);
//      }catch (PDOException $e) {
//          $data = array(
//              "status" => "fail"
//          );
//          echo json_encode($data);
//      }
 
 
 
//  });

$app->post('/addtocart', function ($request, $response, $args) {
    

    // $name = $_POST['productName'];
    // $id = (int)$_POST['productID'];
    // $price = (int)$_POST['price'];
    // $quantity = (int)$_POST['quantity'];

    // $inputJSON = file_get_contents('php://input');
    // $input = json_decode($inputJSON, TRUE);

    $json=json_decode(stripslashes($_POST['data']), true);
    
    $sql = "INSERT INTO `cart` (`productName`, `productID`, `price`, `quantity`) VALUES ('ff', '1', '42', '2')";


    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $cart = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($cart);

    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }

 
 });

$app->get('/allproducts',function ($request,  $response, $args) {
    
    $sql = "SELECT * FROM product";

    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});

 



 

//2. SELECT ALL PATIENTS
$app->get('/allpatients', function ($request,  $response, $args) {

    $sql = "SELECT * FROM patients";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});


//2. SELECT PATIENT BY ID
$app->get('/product/{id}', function ($request,  $response, $args) {
    $id = $args['id'];

    $sql = "SELECT * FROM product WHERE id = $id";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $count = $stmt->rowCount();
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});



//PUT - updata/modify patient based on id
$app->put('/patient/{id}', function ($request,  $response, $args) {
   
    $id = $args['id'];
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);


    $pName = $input['patientName'];
    $pAge = $input['patientAge'];
    $pAddress = $input['patientAddress'];
    $pIC = $input['patientIC'];


    $sql = "UPDATE patients SET patientName = '$pName', patientAge = $pAge, patientAddress = '$pAddress', patientIC = '$pIC' WHERE patientID = $id";

    try{
       
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $patient = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($patient);
    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
 });


 //PUT - updata/modify patient profile based on id
$app->put('/patient/status/{id}', function ($request,  $response, $args) {
    //connect db
    //sql insert
    //return status (success/fail)
    $id = $args['id'];
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);


    $status = $input['patientStatus'];

    $sql = "UPDATE patients SET patientStatus = '$status' WHERE patientID = $id";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $count = $stmt->rowCount();
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $data = array(
            "status" => "success"
        );
        echo json_encode($data);
    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
 });





$app->get('/', function ($request,  $response, $args) {
    
    $response->getBody()->write("This is the root");
    return $response;
});








$app->run();