<?php
require_once 'config/database.php';
//work with session
if($_SESSION['sid']=='')
{
    header('location:index.php');
}
if(@$_GET['page_id']=='logout')
{
    session_destroy();
    header('location:index.php');
}
$admin_sid=$_SESSION['sid'];
$query="SELECT * FROM `admin` WHERE `admin_email`='$admin_sid'";
$admin_data=mysqli_query($dbcon,$query);
$admin_res=mysqli_fetch_array($admin_data);
//insert post
$query="INSERT INTO `post` (`post_id`, `post_title`, `post_msg`, `post_cat`) VALUES (NULL, 'welcome to my blog', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore aliquam quis dolor eius, magni veniam\r\n        aspernatur fuga natus laborum odit corrupti vel, explicabo sapiente illum cumque laboriosam sed, aperiam quos?\r\n        Iure voluptas quibusdam ab quas voluptatibus beatae, deserunt illum consequatur, sapiente, dolorum aliquid\r\n        incidunt voluptates nostrum veritatis. Error expedita tenetur nihil modi? Cupiditate, earum. Doloremque quasi\r\n        corporis recusandae quis omnis. Quae, voluptas, dolore, laudantium ipsum vero libero velit nam excepturi rerum\r\n        necessitatibus qui. Officia nam accusamus recusandae odit minus fugiat eos inventore quaerat, modi delectus\r\n        adipisci maxime? Dolore illo eaque a earum amet, animi aliquam perferendis dolorem, vero quia et.', 'uncategory')";
// view post data
$query="SELECT * FROM `post`";
$post_data=mysqli_query($dbcon,$query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--Header Section-->
    <div class="header bg2">
        <div class="head">
            <div class="head-left fl">
                <a href="admin.php"><?php echo $admin_res['admin_name'] ;?></a>
            </div>
            <div class="head-right fr">
                <ul>

                    <li><a href="../">Go To Main Site</a></li>
                    <li><a href="../">logout</a></li>
                </ul>

            </div>
            <div class="clr"></div>
        </div>
    </div>
    <!--Header Section-->

    <!--mid Section-->
    <div class="mid">
        <div class="mid-left fl">
            <!--nav Section-->
            <div class="nav">
                <ul>

                    <li><a href="?page_id=home">Home</a></li>
                    <li><a href="?page_id=add_post">Add Post</a></li>
                    <li><a href="?page_id=active_post">Active Post</a></li>
                    <li><a href="?page_id=view_post">View Post</a></li>
                    <li><a href="?page_id=update_post">Update Post</a></li>
                    <li><a href="?page_id=delete_post">Delete Post</a></li>
                    <li><a href="?page_id=user_setting">User Setting</a></li>
                    <li><a href="?page_id=theme">Change Theme</a></li>
                    <li><a href="?page_id=logout">Logout</a></li>

                </ul>
            </div>
            <!--nav Section-->

        </div>
        <div class="mid-right fr">
            <?php
            //print_r($_GET);
            @$pageid=$_GET['page_id'];
            //echo $pageid;
            switch($pageid)
            {
                case 'home':
                    include_once 'admin-card.php';
                    break;
                case 'add_post':
                    include_once 'add-post.php';
                    break;
                case 'active_post':
                    include_once 'post-varifi.php';
                    break;
                case 'view_post':        
                    include_once 'view-post.php';
                    break;
                case 'update_post':
                    include_once 'update-post.php';
                    break;
                case 'delete_post':
                    include_once 'delete-post.php';
                    break;
                case 'user_setting':
                    include_once 'admin-card.php';
                    break;
                case 'theme':
                    include_once 'theme.php';
                break;
                default :
                include_once 'admin-card.php';

            }

            
            ?>






        </div>
        <div class="clr"></div>
    </div>
    <!--mid Section-->
    <!--footer Section-->
    <div class="footer bg2">
        <h4>Copyright &copy; 2020-2021</h4>
    </div>
    <!--footer Section-->
</body>

</html>