<?php
//error_reporting(0);
$num1=10;
$num2=20;
echo $num1+$num2;
echo '<hr>';
//array 
$arr=["num1"=>100,"num2"=>200];
echo $arr['num1']+$arr['num2'];
echo "<pre>";
print_r($_POST);
echo "</pre>";
//Notice: Undefined index: number2 solve this using @
/*
this is module one with single event
@$formdata1=$_POST['number1'];
@$formdata2=$_POST['number2'];
echo '<h1>';
echo $formdata1+$formdata2;
echo '</h1>';
this is module Two with multiple event
Notice Undefined variable: formdata1 
*/
/*
@$formdata1=$_POST['number1'];
@$formdata2=$_POST['number2'];

if(isset($_POST['add']))
{

    echo '<h1>';
    echo $formdata1+$formdata2;
    echo '</h1>';
}
else if($_POST['sub'])
{
    echo '<h1>';
    echo $formdata1-$formdata2;
    echo '</h1>';
}
*/
/*
if(isset($_POST['show']))
{
    extract($_POST);
    if($sel=='add')
    {
        $msg=$number1+$number2;
    }
    else if($sel=='sub')
    {
        $msg=$number1-$number2;
    }
    else if($sel=='multi')
    {
        $msg=$number1*$number2;
    }
    else if($sel=='divi')
    {
        $msg=$number1/$number2;
    }
    else
    {
        $msg="no result Found";
    }

}
*/
extract($_POST);
switch(@$sel)
{
    case 'add':
        $msg=$number1+$number2;
        break;
        case 'sub':
            $msg=$number1-$number2;
            break;
}
/*
html get== $_GET[]
html post==$_POST[]
*/
?>
<form method="post">
    <p><input type="text" name="number1" value="<?php echo @$formdata1;?>" placeholder="Enter Number One"></p>
    <p><input type="text" name="number2" value="<?php echo @$formdata2;?>" placeholder="Enter Number Two"></p>
    <p><select name="sel">
        <option>add</option>
        <option>sub</option>
        <option>multi</option>
        <option>divi</option>
    </select></p>
    <p><input type="submit" name="show" value="Show result"></p>
    <!--
    <p><input type="submit" name="add" value="Add Two Number"></p>
    <p><input type="submit" name="sub" value="Subtract Two Number"></p>
    -->
</form>
<h1>
<?php echo @$msg;?>
</h1>