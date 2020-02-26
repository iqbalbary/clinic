<?php
//All User List
require_once('../header.php');
if (!$isSession) {
    header("Location: " . $base_url . "index.php");
}
$userListArr = dataFetchUsingTable("User", array('*'));
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
                            <td> <?php echo $row["Verified"] ? "Verified" : "Pendidng" ?> </td>
                            <td> <a href="<?php echo $base_url . "user/view-user.php?id=" . $row["USER_ID"]; ?>">User detail</a>
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
require_once('../footer.php');
?>