<?php
    $title = "Index";
    require_once 'Includes/header.php';
    require_once 'Database/config.php';
    
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      $response = $crud->get_student($id);
    }
    else
    {
        include 'Includes/error.php';
    }
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title">Name: 
            <?php
                echo $response['firstname'].' '.$response['lastname'];
            ?>
        </h3>
        <p class="card-text">
            <?php
                echo "Date Of Birth : ".$response['dob'];
            ?>
        </p>
        <p class="card-text">
            <?php
                echo "Speciality : ".$response['name'];
            ?>
        </p>
        <p class="card-text">
            <?php
                echo "Email ID: : ".$response['email'];
            ?>
        </p>
        <p class="card-text">
            <?php
                echo "Phone Number: ".$response['phone'];
            ?>
        </p>
    </div> 
</div>
<br>
<a href="update.php?id=<?php echo $response['student_id'];?>" class="btn btn-warning">Edit</a>
<a href="remove.php?id=<?php echo $response['student_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Del</a>
<?php 
    require_once 'Includes/footer.php'; 
?>