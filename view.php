<?php
    $title = 'View Records'; 

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 
   
      // Get attendee by id
      if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        
    } else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    
?>
    <br>
    <br>
    <div class="container" style="display:flex; justify-content:center;">
    <div class="card" style="width: 20rem; height:20rem;">
        <div class="card-body">
        
            <h5 class="card-title">
                <?php echo $result['firstname'] . ' ' . $result['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name'];  ?>    
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $result['dateofbirth'];  ?>
            </p>
            <p class="card-text">
                Email Adress: <?php echo $result['email'];  ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $result['contact'];  ?>
            </p>

        </div>
    </div>
    </div><br><br>
    <div style="text-align:center;">
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
        <?php } ?>
    </div>   
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php require_once 'includes/footer.php'; ?>
    
    