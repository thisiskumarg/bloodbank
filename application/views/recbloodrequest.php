<div class="col-sm-7 mx-auto mt-3">
    <h4 class="text-primary"><?php echo $this->session->flashdata('msg'); ?></h4>
    <h2 class="text-center text-danger">REQUEST</h2>
    <?php 
    foreach($result as $row)
    {
        $bid = $row['bid'];
        $hn = $row['uname'];
        $bg = $row['btype'];
        $bq = $row['bquantity'];
        $l = $row['blocation'];
    }
    ?>
    <form action="<?php echo site_url('Welcome/bloodrequest/').$bid; ?>" method="post" class="text-danger mt-4">
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Hospital Name</label>
            <input type="text" value="<?php echo $hn; ?>" class="col-sm-8 form-control border-0">
        </div>
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Blood-Group</label>
            <input type="text" value="<?php echo $bg; ?>" class="col-sm-8 form-control border-0">
        </div>
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Blood Quantity (in Bottles)</label>
            <input type="text" value="<?php echo $bq; ?>" class="col-sm-8 form-control border-0">
        </div>
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Location</label>
            <input type="text" value="<?php echo $l; ?>" class="col-sm-8 form-control border-0">
        </div>
        <div class="row form-group">
            <label class="col-sm-4 col-form-label">Enter Your Quantity (in Bottles)</label>
            <input type="text" name="nbqr" class="col-sm-8 form-control">
        </div>
        <div class="text-center mt-4">
            <input type="submit" value="SEND REQUEST" class="btn btn-danger">
        </div>
    </form>
</div>