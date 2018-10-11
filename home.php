<?php
    $sql = "Select * from user";
    $res = $conn->query($sql);
?>
<div class="row">
    <table class="table">
        <caption>All user</caption>
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="25%">Email</th>
                <th width="20%">Name</th>
                <th width="25%">Tel</th>
                <th width="25%">Address</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            while ($row = $res->fetch()) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['tel']; ?></td>
                <td><?php echo $row['address']; ?></td>
            </tr>
        <?php
                $i++;
            }
        ?>
        </tbody>
    </table>
</div>
