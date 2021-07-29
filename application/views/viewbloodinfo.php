<div class="col-sm-9">
    <h2 class="text-center text-danger">VIEW BLOOD INFORMATION</h2>
    <h4 class="text-primary"><?php echo $this->session->flashdata('msg'); ?></h4>
    <form action="<?php echo site_url('Welcome/delbloodinfo'); ?>" method="post">
        <input type="submit" value="REMOVE" class="btn btn-danger">
        <table class="table table-hover text-danger mt-3">
            <thead>
                <tr class="bg-danger text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Total Quantity (in Bottles)</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $bid = $row['bid'];
                    $bg = $row['btype'];
                    $tq = $row['bquantity'];
                    $bl = $row['blocation'];
                ?>
                <tr>
                    <td><input type="checkbox" name="bloodid[]" value="<?php echo $bid; ?>"></td>
                    <td><?php echo $bg; ?></td>
                    <td><?php echo $tq; ?></td>
                    <td><?php echo $bl; ?></td>
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
    checkboxes=document.getElementsByName('bloodid[]');
    for(var i in checkboxes)
    checkboxes[i].checked=source.checked;
}
</script>

</div>