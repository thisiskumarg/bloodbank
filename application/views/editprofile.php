<div class="col-sm-9">
    <h3 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h3>
    <div class="card text-center text-danger">
        <div class="card-header">
            <?php 
            if($roleid == '1')
            {
                echo 'Edit Hospital Profile';
            }
            elseif($roleid == '2')
            {
                echo 'Edit Receiver Profile';
            }
            ?>
        </div>
        <form action="<?php echo site_url('Welcome/editprofile/'); ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <?php 
                    foreach($result as $row)
                    {
                        $hn = $row['uname'];
                        $hm = $row['umobile'];
                        $he = $row['uemail'];
                    ?>
                    <div class="col-sm-12">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">NAME</label>
                            <input type="text" name="ehn" value="<?php echo $hn; ?>" class="col-sm-8 form-control">
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">MOBILE</label>
                            <input type="tel" name="ehm" value="<?php echo $hm; ?>" class="col-sm-8 form-control">
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">EMAIL</label>
                            <input type="email" name="ehe" value="<?php echo $he; ?>" class="col-sm-8 form-control">
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer text-muted">
                <input type="submit" value="UPDATE PROFILE" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>
</div>