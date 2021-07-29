<div class="col-sm-9">
    <h2 class="text-center text-danger">VIEW ALL REQUESTS</h2>
    <table class="table table-hover text-danger mt-3">
        <thead>
            <tr class="bg-danger text-white">
                <th scope="col">Status</th>
                <th scope="col">Receiver Name</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Desired Quantity (in Bottles)</th>
                <th scope="col">Receiver Mobile</th>
                <th scope="col">Receiver Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($result as $row)
            {
                $rid = $row['rid'];
                $rstatus = $row['status'];
                $rn = $row['uname'];
                $bg = $row['btype'];
                $dbq = $row['blood_quantity'];
                $rm = $row['umobile'];
                $re = $row['uemail'];
            ?>
            <tr>
                <td>
                    <?php 
                    if($rstatus == '0')
                    {
                        echo '<span class="text-primary">New</span>';
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
                <td><?php echo $rn; ?></td>
                <td><?php echo $bg; ?></td>
                <td><?php echo $dbq; ?></td>
                <td><?php echo $rm; ?></td>
                <td><?php echo $re; ?></td>
                <td>
                    <a href="<?php echo site_url('Welcome/hastatus/').$rid; ?>" class="btn btn-danger">ACCEPT</a>
                    <a href="<?php echo site_url('Welcome/hdstatus/').$rid; ?>" class="btn btn-outline-danger">DECLINE</a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>