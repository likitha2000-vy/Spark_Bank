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
   <h1 style="color:black";> Transfer History</h1>
</div>
<table>
    <tr>
        <th>S.no</th>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount</th>   
        <th>Date & Time</th>   
    </tr>
    <?php
      $sql = "select * from transaction";
      $query = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($query)) {
    ?>
    <tr>
        <td><?php echo $row['sno'];?></td>
        <td><?php echo $row['fromcustomer'];?></td>
        <td><?php echo $row['tocustomer'];?></td>
        <td><?php echo $row['amount'];?></td>
        <td><?php echo $row['datetime'];?></td>
    </tr>
    <?php
      }
    ?>
</table>
</div>
</body>
</html>