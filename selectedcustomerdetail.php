<?php
include 'connection.php';
?>

<?php

if(isset($_POST['submit'])) {
    $from = $_GET["id"];
    $to = $_POST["to"];
    $amount = $_POST["amount"];
    
    $sql = "select * from customers where id=$from";
    $res = mysqli_query($conn,$sql);
    $sql1= mysqli_fetch_array($res);
    
    $sql = "select * from customers where id=$to";
    $res = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($res);
    
    if($amount < 0) {
      echo "<script> alert('negative value can not  be Transfered');</script>";
    } else if($amount == 0) {
      echo "<script> alert('Amount cannot be zero');</script>";

    } else if($amount > $sql1['balance']) {
      echo "<script> alert('amount is greate than current balance');</script>";
    } else {
         $newamount = $sql1['balance'] - $amount;
         $sql = "UPDATE customers set balance=$newamount where id=$from";
         mysqli_query($conn,$sql);
        
         $newamount = $sql2['balance'] + $amount;
         $sql = "UPDATE customers set balance=$newamount where id=$to";
         mysqli_query($conn,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO `transaction` (`sno`, `fromcustomer`, `tocustomer`, `amount`, `datetime`) VALUES 
        (NULL, '$sender', '$receiver', '$amount', current_timestamp())";
        $res = mysqli_query($conn,$sql);
        if($res) {
        echo "<script>
                  alert('sucess');
                  window.location='transactionhistory.php';
              </script>";
        }
        $newamount= 0;
        $amount = 0;
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Document</title>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  appearance: none;
  margin: 0;
}

        .section2 {
            width: 80%;
            padding: 10px 0px;
            margin: 3rem auto 0 auto;
            background-color: #6e393966;
            border: 1px solid black;
        }


</style>
</head>

<body>
<div class="bg">
<?php
include 'header.php';
?>
    <table>
       <tr>
           <th>Id</th>
           <th>Name</th>
           <th>Email</th>
           <th>Balance</th>      
        </tr>
        <?php
           $cid = $_GET['id'];
           $sql = "select * from customers where id=$cid";
           $result = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['balance'];?></td>
        </tr>
        <?php
           }
        ?>
    </table>
  <div class ="section2">
    <div class="row intro py-1">
        <div class="col-sm-12 col-md">
          <form action="" method="post" class="form">
          <h4 style="color: white;">Select the customer</h4>

          <select name="to" class="input" required>
          <option value="" selected disabled>choose customer</option>
          <?php
            $cid = $_GET['id'];
            $sql = "select * from customers where id!=$cid";
            $res = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($res)) {
          ?>
          <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?>-<?php echo $row['balance']?></option>
          <?php
          }
          ?>
          </select>
          <input type="number" name="amount" placeholder="enter amount" class="input" required>
          <button name="submit">Transfer</button>
          </form>
        </div>
      </div>
    </div>
</div>
</body>
</html>