<?php 
require_once 'config.php';
if(isset($_POST['update']))
{
    header('location:update.php');
}
if(@$_GET['action']=='edit')
{
    $fid=$_GET['uid'];
    $query="SELECT * FROM `blog_user` WHERE `id`='$fid'";
    $data=mysqli_query($dbcon,$query);
    $res=mysqli_fetch_assoc($data);

    ?>
    <form method="post">
    <p><input type="text" name="uname" value="<?php echo $res['name'];?>" placeholder="Enter Your Name" required></p>
    <p><input type="text" name="uemail" value="<?php echo $res['email'];?>" placeholder="Enter Your Email" required></p>
    <p><input type="submit" name="update" value="Update Now"></p>
</form>
    <?php
}
else
{
    ?>
    <table border="1" width="100%">
<?php
$query="SELECT * FROM `blog_user`";
$data=mysqli_query($dbcon,$query);
while ($res=mysqli_fetch_assoc($data))
    {
        ?>
        <tr>
            <td height="40px"><?php echo $res['name'];?></td>
            <td><?php echo $res['email'];?></td>
            <td><?php echo $res['course'];?></td>
            <td><a href="update.php?uid=<?php echo $res['id'];?>&action=edit">Edit now</a></td>
        </tr>
    <?php
    }
?>
</table>
    <?php
}
?>
