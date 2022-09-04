<?php
    $title = "Index";
    require_once 'Includes/header.php';
    require_once 'Database/config.php'; 

    $response = $crud->get_speciality();
?>

    <h1 class="text-center">Registration Form</h1>
    <!-- Form contents -
        -First name
        -Last name
        -D.o.B.
        -Speciality
        -Email
        -Contact no.
    -->
    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="fname">
        </div>
        <br/>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lname">
        </div>
        <br/> 
        <div class="form-group">
            <label for="lastname">Date of birth:</label>
            <input type="date" class="form-control" id="dob" placeholder="Enter Date of birth" name="dob">
        </div>
        <br/>
        <div class="form-group">
            <label for="speciality">Speciality:</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php
                  while ($r = $response->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $r['speciality_id']?>"><?php echo $r['name']; ?></option>
                <?php  } ?>  
            </select>
        </div>
        <br/>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email id" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <br/>
        <div class="form-group">
            <label for="phone">Phone No.:</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter your phone number" name="phone">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <br/>
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
        <button type="reset" class="btn btn-primary" name="reset">Reset</button>
    </form>

<?php 
    require_once 'Includes/footer.php'; 
?>
    
