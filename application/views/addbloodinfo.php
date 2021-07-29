<div class="col-sm-9">
    <h4 class="text-primary"><?php echo $this->session->flashdata('msg'); ?></h4>
    <h2 class="text-center text-danger">ADD BLOOD INFORMATION</h2>
    <form action="<?php echo site_url('Welcome/addblood'); ?>" method="post" class="col-sm-10 text-danger mx-auto mt-4">
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Blood Group</label>
            <select name="bgh" class="col-sm-8 form-control">
                <option selected disabled>--- Choose Blood Group ---</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        <div class="row form-group">
            <label class="col-form-label col-sm-4">Blood Quantity (in Bottles)</label>
            <input type="text" name="bqh" class="col-sm-8 form-control">
        </div>
        <div class="row form-group">
            <label class="col-form-label col-sm-4">Location</label>
            <input type="text" name="loch" class="col-sm-8 form-control">
        </div>
        <div class="text-center">
            <input type="submit" value="ADD INFORMATION" class="btn btn-danger">
        </div>
    </form>
</div>