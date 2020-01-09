<?php
//Add Deposit Form

require_once('../header.php');
if(!$isSession ){
    header("Location: ".$base_url."index.php");
}

?>
<div  class="container">
	<form action="" method='post'>
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <input type="text" class="form-control" required='true' name="Profile_ID" placeholder="1">
        </div>
        <div class="form-group">
            <label for="Amount">Amount</label>
            <input type="Number" required="required" class="form-control" required="true" name="Amount"  placeholder="5000">
        </div>
        <div class="form-group">
            <label for="Month">Month</label>
            <input type="text" required="required" class="form-control" required="true" name="Month" placeholder="Jan">
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>

<?php


require_once('../footer.php');