<?php
    $title = "Success";
    require_once 'Includes/header.php';
    require_once 'Database/config.php';
    
    if (isset($_POST['submit'])){
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $speciality = $_POST['speciality'];
         //Call function to insert and track if success
         $issuccess = $crud->insert($fname, $lname, $dob, $speciality, $email, $phone);
    
        if($issuccess){
            echo "<h1 class='text-center text-success'>You have been registered!<br/>Congratulations!!!</h1>";
        }
        else{
            include 'Includes/error.php';
        }
    }
?>

<?php
    require_once 'Includes/footer.php'; 
?>