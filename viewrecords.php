<?php
    $title = 'View Records'; 

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 

     $results = $crud->getAttendees();
?>
<br>
<br>

<div class="container shadow p-3 mb-5 bg-white rounded">
 <table class="table table-hover table-bordered" style="border:1px solid #ddd;text-align:center;">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th  scope="col">Email</th>
            <th scope="col">Specialty</th>
            <th scope="col">Actions</th>
            
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           <tr>
                <td><?php echo $r['attendee_id'] ?></td>
                <td><?php echo $r['firstname'].' '.$r['lastname'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><?php echo $r['name'] ?></td>
               
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
                </td>
           </tr> 
        <?php }?>
 </table>
</div>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
