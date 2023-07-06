<?php include("./head.php");
if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $usermobile = $_POST["mobile"];
    $img = $_FILES["image"];
    include("./connect.php");
    $sql = "select * from `info` where mobile = '$usermobile'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($result))
    {
        echo "User Already Registered";
    }
    else
    {
        //registering new user
        $imgname = $img["name"];
        $img_tmp_name = $img["tmp_name"];
        $imgExt = strtolower(explode(".",$imgname)[1]);
        $extns = array("png","jpeg","jpg");
        if(in_array($imgExt,$extns))
        {
            $upload_folder = "images/".$imgname;
            move_uploaded_file($img_tmp_name,$upload_folder);
            $sql = "insert into `info`(name,mobile,image) values('$username','$usermobile','$upload_folder')";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($result)
            {
                echo "File Uploaded Succes";
            }
            else
            {
                echo "Server Error";
            }

        }   
        else
        {
            echo "File should be png or jpeg or jpg";
        }
    }
}


?>
<h1 class="text-center">Register</h1>

<form class="container" action="" enctype="multipart/form-data" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail12" class="form-label">Mobile</label>
        <input type="text" name="mobile" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <input type="file" name="image" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
</form>