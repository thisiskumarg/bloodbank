<div class="col-sm-12">
    <h2 class="text-center text-danger">AVAILABLE BLOOD SAMPLES</h2>
    <table class="table table-hover text-danger mt-4">
        <thead>
            <tr class="bg-danger text-white">
                <th scope="col">Hospital Name</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Blood Quantity (in Bottles)</th>
                <th scope="col">Location</th>
                <?php 
                if(!isset($_SESSION['uid']))
                {
                    echo '<th scope="col">Links</th>';
                }
                else
                {
                    if($roleid == '2')
                    {
                        echo '<th scope="col">Links</th>';
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($result as $row)
            {
                $bid = $row['bid'];
                $hn = $row['uname'];
                $bg = $row['btype'];
                $bq = $row['bquantity'];
                $l = $row['blocation'];
            ?>
            <tr>
                <td><?php echo $hn; ?></td>
                <td><?php echo $bg; ?></td>
                <td><?php echo $bq; ?></td>
                <td><?php echo $l; ?></td>
                <?php 
                if(!isset($_SESSION['uid']))
                {
                    echo '<td>
                        <a href="'.site_url('Welcome/login/').'" class="btn btn-outline-danger">REQUEST</a>
                    </td>';
                }
                else
                {
                    if($roleid == '2')
                    {
                        echo '<td>
                            <a href="'.site_url('Welcome/bloodrequestform/').$bid.'" class="btn btn-outline-danger">REQUEST</a>
                        </td>';
                    }
                }
                ?>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>

</div>