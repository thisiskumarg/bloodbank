<div class="col-sm-8 mx-auto">
    <h3 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h3>
    <h2 class="text-center text-danger">REGISTRATION FORM</h2>
    <p class="text-center text-danger">AS</p>

    <div class="row">
        <ul class="nav nav-pills mb-3 mx-auto" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">HOSPITAL</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">RECEIVER</a>
            </li>
        </ul>
    </div>

    <div class="tab-content mt-4" id="pills-tabContent">
        <div class="tab-pane fade show active mx-auto col-sm-10" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form action="<?php echo site_url('Welcome/hossignup'); ?>" method="post" class="text-danger">
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Hospital Name</label>
                    <input type="text" name="hn" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Hospital Mobile</label>
                    <input type="tel" name="hm" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Hospital Email</label>
                    <input type="email" name="he" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Hospital Password</label>
                    <input type="password" name="hp" class="col-sm-8 form-control">
                </div>
                <div class="text-center">
                    <input type="submit" value="REGISTER" class="btn btn-danger">
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="<?php echo site_url('Welcome/recsignup'); ?>" method="post" class="text-danger">
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Receiver Name</label>
                    <input type="text" name="rn" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Receiver Mobile</label>
                    <input type="tel" name="rm" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Receiver Email</label>
                    <input type="email" name="re" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Receiver Age</label>
                    <input type="tel" name="ra" class="col-sm-8 form-control">
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-sm-4">Receiver Blood Group</label>
                    <select name="rbg" class="col-sm-8 form-control">
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
                    <label class="col-form-label col-sm-4">Receiver Password</label>
                    <input type="password" name="rp" class="col-sm-8 form-control">
                </div>
                <div class="text-center">
                    <input type="submit" value="REGISTER" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
    <div class="row col-sm-12 mt-4">
        <h6 class="text-primary">If you have already registered then <a href="<?php echo site_url('Welcome/login'); ?>" class="text-danger">Login</a> yourself.</h6>
    </div>

</div>