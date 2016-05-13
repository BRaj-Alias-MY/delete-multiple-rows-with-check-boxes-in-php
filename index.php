<?php
$con = mysqli_connect('localhost','root','root','students') or mysqli_error($con);
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

	<title>Delete Multiple rows in mysql Database Using ajax php</title>

	<!--  -->

	<style>

	</style>

</head>

<body>

	<div class="container">
       
<table class="table table table-bordered">
  <thead class="thead-inverse">
    <tr>
      <th>S.no</th>
      <th> Name</th>
      <th>Maths</th>
      <th>Physics</th>
      <th>Computers</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $sql = "select * from studentmarks";
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($result))
      {?>
          
     
    <tr id="<?= $row[0];?>">
      
      <td><?= $row[0];?></td>
      <td><?= $row[1];?></td>
      <td><?= $row[2];?></td>
      <td><?= $row[3];?></td>
      <td><?= $row[4];?></td>
      
      <td>
        <input type="checkbox" class="ck" name="ckbox_delete" value="<?= $row[0];?>">
     </td>
    </tr>
      <?php }  ?>
    
  </tbody>
</table>
<div align="center">
       <button class="btn btn-success" name="btndelete" id="btndelete">Delete</button> 
</div>
        <div align="center"  id="msg"></div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
        $(document).ready(function(){
           $('#btndelete').on('click', function () {
               var row_id = [];
               $(':checkbox:checked').each(function(i){
                         row_id[i] = $(this).val();
                   
                       });
               if(row_id.length === 0)
                           {
                               alert("Please Select Checkbox");
                           }
               else{
                   if(confirm("Are you sure want to delete this?"))
                   {
                       //alert(row_id);
                       $.ajax({
                           url: 'delete.php',
                           method: 'POST',
                           data : {id:row_id},
                           success: function(data)
                           {
                               for(var i=0; i<row_id.length; i++)
                                   {
                                       $('tr#'+row_id[i]+'').css('backgroundColor','#ccc');
                                        $('tr#'+row_id[i]+'').fadeOut('slow');
                                   }
                                $('#msg').html('Deleted Sucessfully').fadeIn('slow');          
                               $('#msg').delay(5000).fadeOut('slow');
                               //alert("Deleted");
                           }
                          
                          
                             
                           });
                       
                   }
               else
               {
                   return false;
               }
               }
               
               
               
           });
            
        });
	</script>

</body>

</html>
