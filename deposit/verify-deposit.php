<?php
// Add verify  Deposit 
require('../header.php');

if(!$isSession  ){
    header("Location: ".$base_url."index.php");
}
$userListData = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));

$userListArr = array();
foreach ($userListData as $data) {
    $userListArr[$data['USER_ID']] = $data;
}

$depositId = "";
if(isset($_GET['deposit-id'])){
	$depositId = $_GET['deposit-id'];
}
else{
	header("Location: ".$base_url."index.php");
}

$userDepositCondintion[] = array(
    'fieldName'=> 'Deposite_ID',
    'symbol' => " = ",
    'value' => $depositId
);


$depositDetailsDataArr = dataFetchUsingTable("deposite", array() , $userDepositCondintion);
$depositDetailsData = $depositDetailsDataArr[0];
$selectedUserIds = explode(",",$depositDetailsData["Profile_ID"]);
$selectedMonths = explode(",",$depositDetailsData["Month"]);

if(isset($_POST['Deposite_ID'])){
	$userDepositArr = array(
		"user_id" => "",
		"month" => "",
		"deposit_id"=> $depositId,
		"amount" => 5000,
		"late_fine" => 0
	);

	foreach ($selectedUserIds as  $selectedUserId) {
		$userDepositArr['user_id'] =  $selectedUserId;
		foreach ($selectedMonths as  $selectedMonth) {
			$userDepositArr['month'] =  $selectedMonth;
			$insertFlag=  insetrtDataFunc("user_deposite", $userDepositArr);
		}
	}


	$UserDepositUpdateArray =array(
		"Verification_ID" => $_SESSION["USER_ID"],
		"Verification" => 1
	);
	$updateFlag = updateData("deposite", $UserDepositUpdateArray, $userDepositCondintion );

    if($updateFlag){
    	$depositDetailsData["Verification_ID"]  = $_SESSION["USER_ID"];
    	$depositDetailsData["Verification"]  = 1;
    }

}

?>
<div  class="container">
	<form action="" method='post'>
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <div class="profile-data-container">
                <div class="custom-input">
                    <?php 
                        foreach ($selectedUserIds as $selectedUserId) { ?>
                    <div class="input-item-block">
                        <img src="<?php echo $base_url .'uploads/User/Image/' . trim($userListArr[$selectedUserId]['Image'] ? $userListArr[$selectedUserId]['Image'] :  'avater.jpg')  ?>">
                        <span> <?php echo $userListArr[$selectedUserId]['Name']; ?>  </span>
                        
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Amount">Amount</label>
            <p> <?php echo $depositDetailsData['Amount']; ?> </p>
        </div>
        <div class="form-group">
            <label for="late_fine">Late Fine</label>
            <p> <?php echo $depositDetailsData['late_fine']; ?> </p>
        </div>
        <div class="form-group">
            <label for="Month">Month</label>
            <div class="custom-input">
                <?php 
                    foreach ($selectedMonths as $selectedMonth) { ?>
                		<div class="input-item-block"> <?php echo $monthArray[$selectedMonth]; ?> </div>
            	<?php } ?>
            </div>
        </div>
        <div class="form-group">
        	<div class="image-label-block">
        		<label for="Deposite_Slip"> Deposite Slip </label>
            	<img src="<?php echo $base_url .'uploads/Deposite/Deposite_Slip/' . trim($depositDetailsData['Deposite_Slip'] ? $depositDetailsData['Deposite_Slip'] :  'avater.jpg')  ?>">
        	</div>
            
        </div>
        <div class="form-group">
            <label for="Short_Description">Short Description</label>
            <p> <?php echo $depositDetailsData['Short_Description']; ?> </p>
        </div>
        <?php if($depositDetailsData['Verification'] == 0){ ?>
        <button type="submit" class="btn btn-primary" value="<?php echo $depositDetailsData['Deposite_ID'];  ?>" name='Deposite_ID'>Verify</button>
    <?php } ?>
    </form>
</div>

<?php
require_once('../footer.php'); 
?>