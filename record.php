<?php
    $title = "Index";
    require_once 'Includes/header.php';
    require_once 'Database/config.php'; 

    $response = $crud->get_record();
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Joining ID</th>
      <th scope="col">Name</th>
      <th scope="col">Speciality</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($s = $response->fetch(PDO::FETCH_ASSOC))
      {
    ?>
    <tr>
        <td><?php echo $s['student_id'];?></td>
        <td><?php echo $s['firstname']." ".$s['lastname'];?></td>   
        <td><?php echo $s['name'];?></td>   
        <td>
          <a href="student_view.php?id=<?php echo $s['student_id'];?>" class="btn btn-primary">View</a>
          <a href="update.php?id=<?php echo $s['student_id'];?>" class="btn btn-warning">Edit</a>
          <a href="remove.php?id=<?php echo $s['student_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Del</a>
        </td>
    </tr>
    <?php }?>
  </tbody>
</table>

<?php 
    require_once 'Includes/footer.php'; 
?>