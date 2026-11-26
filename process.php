<?php 
include 'db.php';

if(isset($_POST['add_patient'])){
    $name = $_POST['name'];   
    $symptom = $_POST['symptom'];
    $status = $_POST['status'];

    $sqlQuery = "INSERT INTO patients (patient_name, symptom, status)
                VALUES ('$name', '$symptom', '$status')";

   if( $conn->query($sqlQuery)){
        header("Location: admin.php");
        exit();
   }
}

   if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    print_r($id);
    $sqlDelete = "DELETE FROM patients WHERE patient_id = $id";

    $conn->query($sqlDelete);

    
    header("Location: admin.php");
    exit();
   }
?>