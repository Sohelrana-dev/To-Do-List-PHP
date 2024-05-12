<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:../login.php");
}
require_once('includs/header.php');

$user_id = $_SESSION['user_id'];
$db_connect = mysqli_connect('localhost','root','','intern');
$all_data = "SELECT * FROM `users` WHERE deleted_at IS NULL AND id != $user_id";
$mysql_qury = mysqli_query($db_connect, $all_data);


?>

<div class="col-8">
    <div class="card">
        <div class="card-header">
            <h2>User List</h2>
            <div class="btn btn-primary"><a href="trash_list.php" class="text-white">Trash List</a></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                    <table id="example3" class="display min-w850 dataTable no-footer" role="grid"
                        aria-describedby="example3_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label=": activate to sort column descending"
                                    style="width: 35.25px;">SL
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Name: activate to sort column ascending" style="width: 172.734px;">
                                    Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Department: activate to sort column ascending"
                                    style="width: 208.234px;">
                                    Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Action: activate to sort column ascending" style="width: 67.9688px;">
                                    Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                    aria-label="Action: activate to sort column ascending" style="width: 67.9688px;">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                             foreach ($mysql_qury as $key => $data) {
                            ?>
                            <tr role="row" class="odd">
                                <td><?= $key+1 ?></td>
                                <td><?= $data['user_name'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td><?= $data['type'] ?></td>
                                <?php 
                                if($data['type'] != 'sub_admin'){
                                    ?>
                                    <td>
                                    <div class="d-flex">
                                        <a href="user_update.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="soft_delete.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>

                                    <?php
                                }
                                ?>
                            </tr>

                            <?php  
                              }
                             ?>
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="example3_info" role="status" aria-live="polite">Showing 1 to 10
                        of 30entries</div>
                </div>
                <div> 
                    <a href="switch_user.php" class="btn btn-primary">Add Role</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h2>Registration Form</h2>
        </div>
        <div class="card-body">
            <form action="admin_user_add.php" method="post">
                <?php 
                        if(isset($_SESSION['email_duplicate'])){
                            ?>
                <div class="alert bg-danger text-white"> <?php echo $_SESSION['email_duplicate']; ?> </div>
                <?php
                unset($_SESSION['email_duplicate']);
                        }
                        ?>
                <div class="mb-3">
                    <label for="" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="user_name" placeholder="enter your name">
                    <?php 
                            if(isset($_SESSION['name_err'])){
                                echo $_SESSION['name_err'];
                                unset($_SESSION['name_err']);
                            }
                            ?>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="enter email">
                     <?php 
                            if(isset($_SESSION['email_err'])){
                                echo $_SESSION['email_err'];
                                unset($_SESSION['email_err']);
                            }
                            ?>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="enter password">
                      <?php 
                            if(isset($_SESSION['password_err'])){
                                echo $_SESSION['password_err'];
                                unset($_SESSION['password_err']);
                            }
                            ?>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
require_once('includs/footer.php')
?>