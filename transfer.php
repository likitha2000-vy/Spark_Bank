<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Document</title>
</head>
<body>
<div class="bg">
<?php
include 'header.php';
?>
<div class="text">
   <h1 style="color:black";>Transfer Money</h1>
</div>
<table>
   <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Balance</th>
      <th>Operation</th>
   </tr>
        
   <?php 
      $sql = "select * from customers";
      $result = mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($result)) {
   ?>
   <tr>
      <td><?php echo $rows['id'];?></td>
      <td><?php echo $rows['name'];?></td>
      <td><?php echo $rows['email'];?></td>
      <td><?php echo $rows['balance'];?></td>
      <td><a href="selectedcustomerdetail.php?id= <?php echo $rows['id'] ;?>">Transfer</a></td> 
   </tr>
   <?php
      }
   ?>
</table>
   </div>
</body>
</html>