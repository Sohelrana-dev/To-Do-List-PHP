<?php 
session_start();
require_once('includs/header.php');
    $user_id = $_GET['id'];
    $db_connect = mysqli_connect('localhost','root','','intern');
    $all_data = "SELECT * FROM `users` WHERE id = $user_id";
    $mysql_qury = mysqli_query($db_connect, $all_data);
    $fetch_assoc = mysqli_fetch_assoc($mysql_qury);

?>

<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h2>User Update</h2>
        </div>
        <div class="card-body">
            <form action="update_store.php" method="post">
                <input type="number" hidden name="user_id" value="<?php echo $user_id ?>">
                <div class="mb-3">
                    <label for="" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="user_name"
                        value="<?php echo $fetch_assoc['user_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $fetch_assoc['email']; ?>">
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
require_once('includs/footer.php');
?>