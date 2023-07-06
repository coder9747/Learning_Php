<?php
include("./head.php");
include("./connect.php"); ?>
<h1 class="text-center">All Data</h1>
<table class="table container">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $sql = "select * from `info`";
         $result = mysqli_query($con,$sql) or die(mysqli_error($con));
         while($row = mysqli_fetch_assoc($result)){?>
        <tr>
            <th scope="row"><?php echo $row["id"]?></th>
            <td><?php echo $row["name"]?></td>
            <td>
                <img class="img" src="<?php echo $row["image"]?>" alt="">
            </td>
        </tr>
        <?php }?>
        
    </tbody>
</table>






