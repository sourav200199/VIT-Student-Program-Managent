<?php
    $title = "Edit Record";
    require_once 'Includes/header.php';
    require_once 'Database/config.php'; 

    $response = $crud->get_speciality();
    if(!isset($_GET['id']))
    {
        //echo 'Error';
        include 'Includes/error.php';
        header("Location: record.php");
    }
    else
    {
        $id = $_GET['id'];
        $student = $crud->get_student($id);

?>

    <h1 class="text-center">Update Record</h1>

    <form method="post" action="success1.php">
        <input type="hidden" name="id" value="<?php echo $student['student_id']?>">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" value="<?php echo $student['firstname'];?>" name="fname">
        </div>
        <br/>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" value="<?php echo $student['lastname'];?>" name="lname">
        </div>
        <br/> 
        <div class="form-group">
            <label for="lastname">Date of birth:</label>
            <input type="date" class="form-control" id="dob" value="<?php echo $student['dob'];?>" name="dob">
        </div>
        <br/>
        <div class="form-group">
            <label for="speciality">Speciality:</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php
                  while ($r = $response->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $r['speciality_id']?>" <?php if($r['speciality_id'] == $student['speciality_id']) echo 'Selected'; ?>>
                    <?php echo $r['name']; ?>
                </option>
                <?php  } ?>  
            </select>
        </div>
        <br/>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $student['email'];?>" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <br/>
        <div class="form-group">
            <label for="phone">Phone No.:</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" value="<?php echo $student['phone'];?>" name="phone">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <br/>
        <button type="submit" class="btn btn-success" name="update">Update Changes</button>
        <button type="reset" class="btn btn-primary" name="reset">Reset</button>
    </form>
    <?php }?>
<?php 
    require_once 'Includes/footer.php'; 
?>
    
