<?php
    require_once 'Database/config.php'; 

    if (isset($_POST['update']))
    {
        //Get values from new POST
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $speciality = $_POST['speciality'];

        //Call the CRUD function
        $result = $crud->update_student($id, $fname, $lname, $dob, $speciality, $email, $phone);
        //Redirect to index.php
        if($result)
        {
            header("Location: record.php");
        }
        else
        {
            include 'Includes/error.php';
            header("Location: record.php");
        }
    }
    else{
        include 'Includes/error.php';
        header("Location: record.php");
    }
?>