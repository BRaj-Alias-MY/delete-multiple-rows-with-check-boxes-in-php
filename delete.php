<?php
$con = mysqli_connect('localhost','root','root','students') or mysqli_error($con);
if(isset($_POST['id']))
{
    foreach($_POST['id'] as $id)
    {
        $sql = "delete from studentmarks where id='".$id."'";        
        $result = mysqli_query($con,$sql);
        if($result)
        {
            //echo "Deleted Sucessfully";
        }
    }
}
?>