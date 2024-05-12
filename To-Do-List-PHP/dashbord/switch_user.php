<?php 
session_start();
require_once('includs/header.php');
$user_id = $_SESSION['user_id'];
$db_connect = mysqli_connect('localhost','root','','intern');
$all_data = "SELECT * FROM users";
$mysql_qury = mysqli_query($db_connect, $all_data);

?>

<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h2>User List</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>SL</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php 
                foreach($mysql_qury as $key => $data){
                ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $data['user_name']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                </tr>
                <?php 
                }
                ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h2>Role</h2>
        </div>
        <div class="card-body">
            <form action="switch_user_post.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Type</label>
                    <input type="text" class="form-control" name="type">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Permission</label>
                    <select name="user_id" id="" class="form-control">
                        <option value="">Select User Name</option>
                        <?php 
                        foreach($mysql_qury as $data){
                        ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['user_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
require_once('includs/footer.php');
?>