<div class="col-sm-9">
    <h2 class="text-center text-danger">YOUR REQUESTS</h2>
    <h4 class="text-primary"><?php echo $this->session->flashdata('msg'); ?></h4>
    <form action="<?php echo site_url('Welcome/recrdel'); ?>" method="post">
        <input type="submit" value="REMOVE" class="btn btn-danger">
        <table class="table table-hover text-danger mt-3">
            <thead>
                <tr class="bg-danger text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">Status</th>
                    <th scope="col">Hospital Name</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Blood Quantity (in Bottles)</th>
                    <th scope="col">Desired Quantity (in Bottles)</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $rid = $row['rid'];
                    $rstatus = $row['status'];
                    $hn = $row['uname'];
                    $bg = $row['btype'];
                    $bq = $row['bquantity'];
                    $dbq = $row['blood_quantity'];
                    $l = $row['blocation'];
                ?>
                <tr>
                    <td><input type="checkbox" name="recrid[]" value="<?php echo $rid; ?>"></td>
                    <td>
                    <?php 
                        if($rstatus == '0')
                        {
                            echo '<span class="text-primary">Pending</span>';
                        }
                        elseif($rstatus == '1')
                        {
                            echo '<span class="text-success">Accepted</span>';
                        }
                        elseif($rstatus == '2')
                        {
                            echo '<span class="text-info">Declined</span>';
                        }
                        ?>
                    </td>
                    <td><?php echo $hn; ?></td>
                    <td><?php echo $bg; ?></td>
                    <td><?php echo $bq; ?></td>
                    <td><?php echo $dbq; ?></td>
                    <td><?php echo $l; ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<script>
function selectAll(source)
{
    checkboxes=document.getElementsByName('recrid[]');
    for(var i in checkboxes)
    checkboxes[i].checked=source.checked;
}
</script>