<?php
//Edit user
//Normal User can edit select field, admin can edit all


require_once('../header.php');
?>
<div class="container">
<form action="" method='post'>
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control"  required='true'  name="Name" placeholder="Mr. X">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" required="required" class="form-control" name="Email"  placeholder="abc@bb.co">
    </div>
    <div class="form-group">
        <label for="Phone">Phone Number</label>
        <input type="text" required="required" class="form-control" name="Phone"  placeholder="+8801763015332">
    </div>
    <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>
<?php
require_once('../footer.php');