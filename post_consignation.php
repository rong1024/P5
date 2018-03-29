<?php
$servername="localhost";
$username="root";
$password="";
try{
  $con=new PDO("mysql:host=$servername;dbname=P5",$username,$password);
}catch(PDOException $e){
  die("数据库连接失败".$e -> getMessage());
}
if(isset($_POST['target_item'])&&isset($_POST['detail_item'])){
  $target=$_POST["target_item"];
  $detail=$_POST["detail_item"];
  try{
    $sql="INSERT INTO consignation (target,detail) VALUES ('$target','$detail')";
    $con -> exec($sql);
  }catch(PDOEXception $e){
    die("插入数据失败".$e -> getMessage());
  }
  $result=$con->query('SELECT target,detail FROM consignation ORDER BY id desc LIMIT 0,6');
  foreach($result as $val){
  ?>
      <div class="consignation-item">
        <h3><?php echo $val['target'];?></h3>
        <p><?php echo $val['detail'];?></p>
      </div>
  <?php
  }
}
$con=null;
?>
