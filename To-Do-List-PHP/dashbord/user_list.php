<?php 
session_start();
require_once('includs/header.php');

$user_id = $_SESSION['user_id'];
$db_connect = mysqli_connect('localhost','root','','intern');
$all_data = "SELECT * FROM `users` WHERE id != $user_id";
$mysql_qury = mysqli_query($db_connect, $all_data);
?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">User List</h4>
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
                                <!-- <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </td> -->
                            </tr>

                            <?php  
                                                  }
                                                ?>
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="example3_info" role="status" aria-live="polite">Showing 1 to 10
                        of 30
                        entries</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require_once('includs/footer.php');
?>