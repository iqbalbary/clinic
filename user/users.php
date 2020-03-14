<?php
//All User List
require_once '../session.php';
isAuthorize();
require_once '../header.php';

$userListArr = dataFetchUsingTable("user", array('*'));
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th> Status </th>
                        <th> Role </th>
                        <th> Verified </th>
                        <th> # </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($userListArr as $row) {
    ?>
                    <tr>
                        <td> <?php echo $row["USER_ID"]; ?></td>
                        <td> <?php echo $row["Name"]; ?> </td>
                        <td> <?php echo $row["Status"] ? "Active" : "In Active" ?></td>
                        <td> <?=$row["User_Role"] == 1 ? "Subscriber" : "Admin"?></td>
                        <td> <?php echo $row["Verified"] ? "Verified" : "Pendidng" ?> </td>
                        <td> <a href="<?php echo $base_url . "user/view-user.php?id=" . $row["USER_ID"]; ?>">User
                                detail</a>
                        </td>
                    </tr>
                    <?php
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once '../footer.php';
?>