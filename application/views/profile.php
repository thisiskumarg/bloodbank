<div class="col-sm-9">
    <div class="card text-center text-danger">
        <div class="card-header">
            <?php 
            if($roleid == '1')
            {
                echo 'Hospital Profile';
            }
            elseif($roleid == '2')
            {
                echo 'Receiver Profile';
            }
            ?>
        </div>
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
                        <label class="col-sm-4">NAME</label>
                        <div class="col-sm-8">
                            <?php echo $hn; ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">MOBILE</label>
                        <div class="col-sm-8">
                        <?php echo $hm; ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">EMAIL</label>
                        <div class="col-sm-8">
                        <?php echo $he; ?>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="<?php echo site_url('Welcome/editprofileform/'); ?>" class="btn btn-danger">EDIT PROFILE</a>
        </div>
    </div>
</div>
</div>