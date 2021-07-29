<div class="col-sm-8 mx-auto">
    <h3 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h3>
    <h2 class="text-center text-danger">LOGIN FORM</h2>
    <form action="<?php echo site_url('Welcome/signin'); ?>" method="post" class="col-sm-8 mx-auto my-5 text-danger">
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">E-Mail</label>
            <input type="email" name="ue" class="col-sm-8 form-control">
        </div>
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Password</label>
            <input type="password" name="up" class="col-sm-8 form-control">
        </div>
        <div class="text-center">
            <input type="submit" value="GET YOUR PROFILE" class="btn btn-danger mt-3">
        </div>
        <div class="row col-sm-12 mt-4">
            <h6 class="text-primary">If you have not registered then <a href="<?php echo site_url('Welcome/register'); ?>" class="text-danger">Register</a> yourself.</h6>
        </div>
    </form>
</div>