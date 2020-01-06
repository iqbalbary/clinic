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
    <div class="form-group">
        <label for="Father_Name">Father Name</label>
        <input type="text" class="form-control"  required='true'  name="Father_Name" placeholder="Mr. X">
    </div>
    <div class="form-group">
        <label for="Mother_Name">Mother Name</label>
        <input type="text" class="form-control"  required='true'  name="Mother_Name" placeholder="Mis. Y">
    </div>
    <div class="form-group">
        <label for="Mother_Name">Short Description</label>
        <textarea  type="textarea" class="md-textarea form-control"  required='true'  name="Short_Description" placeholder="Short Description" rows="10"> </textarea>
    </div>
    <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>
<?php
require_once('../footer.php');