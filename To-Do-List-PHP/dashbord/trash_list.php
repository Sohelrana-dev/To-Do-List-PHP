<?php 
session_start();
require_once('includs/header.php');
$db_connect = mysqli_connect('localhost', 'root', '', 'intern');
$select_trash = "SELECT * FROM `users` WHERE deleted_at IS NOT NULL";
$final_quray =mysqli_query($db_connect, $select_trash);

?>

<div class="col-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Trash List</h4>
            <div class="btn btn-primary"><a href="admin_user_list.php" class="text-white">User List</a></div>
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
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                             foreach ($final_quray as $key => $data) {
                            ?>
                            <tr role="row" class="odd">
                                <td><?= $key+1 ?></td>
                                <td><?= $data['user_name'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="restore.php?id=<?php echo $data['id']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                class="fa fa-undo"></i></a>
                                        <a href="parmanent_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger shadow btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </td>
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