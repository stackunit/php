<?php
extract($_POST);
$color=array("red","green","yellow","blue");
$banner=array("banner1.jpg","banner2.jpg","banner3.jpg");
if(isset($_POST['update']))
{
    if($title=="")
    {
        $msg="Plase Fill The Title";
        $title="Web Site Header";
    }
    else{
        $t_color=$color[$txt_color];
        $img=$banner[$bg_img];
    }

}
else 
{
    $title="Web Site Header";
    $head_bg="royalblue";
    $align="left";
    $t_color='white';
    $img="banner1.jpg";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Update App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .head {
            height: 80px;
            background-color:<?php echo  $head_bg;?> ;
        }

        .panel {
            width: 30%;
            height: 400px;
            border: 1px dashed royalblue;
            float:right;
            margin-top:10px;
        }

        .panel h2 {
            text-align: center;
            padding: 1.50%;
            background-color: royalblue;
            color: white;
        }
        .banner{
            width:69%;
            height:400px;
            float:left;
            margin-top:10px;
        }

        .panel p {
            text-align: center;
        }

        .txt {
            height: 40px;
            width: 90%;
            margin-top: 10px;
        }

        .btn {
            height: 40px;
            width: 70%;
            margin-top: 10px;
        }
        #radio{ margin-top:10px;}
    </style>
</head>

<body>
    <div class="head">
        <h1 style="color:<?php echo  $t_color;?>; line-height: 80px; margin-left: 2.50%; text-align:<?php echo $align;?>"><?php echo $title;?></h1>
    </div>
    <div class="banner">
        <img src="image/<?php echo $img;?>" width="100%" height="400px">
    </div>

    <div class="panel">
        <h2>Header Panel</h2>
        <form method="POST">
            <p><input type="text" name="title" placeholder="Enter Title" value="<?php echo $title;?>" class="txt"></p>
            <p><input type="color" name="head_bg" class="txt"></p>
            <p id="radio">
                <input type="radio" name="align" value="left"> Text Left
                <input type="radio" name="align" value="center"> Text Center
                <input type="radio" name="align" value="right"> Text Right
            </p>
            <p>
                <select name="txt_color" class="txt">
                    <option value="0">Text Theame 1</option>
                    <option value="1">Text Theame 2</option>
                    <option value="2">Text Theame 3</option>
                    <option value="3">Text Theame 4</option>

                </select>
            </p>
            <p>
                <select name="bg_img" class="txt">
                    <option value="0">banner 1</option>
                    <option value="1">banner 2</option>
                    <option value="2">banner 3</option>
                </select>
            </p>
            <p><input type="submit" name="update" value="Update Header" class="btn"></p>
            
            <p><?php echo @$msg;?></p>
        </form>
    </div>
</body>

</html>