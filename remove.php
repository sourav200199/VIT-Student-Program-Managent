<?php
    $title = "Delete Record";
    require_once 'Database/config.php'; 

    if(!$_GET['id'])
    {
        //echo 'Error';
        include 'Includes/error.php';
        header("Location: record.php");
    }
    else
    {
        //GET the id
        $id = $_GET['id'];

        //Call the delete function for 'id'
        $result = $crud->remove($id);

        //Redirect
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
?>