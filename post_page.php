<?php
$servername="localhost";
$username="root";
$password="";
try{
  $con=new PDO("mysql:host=$servername;dbname=P5",$username,$password);
}catch(PDOException $e){
  die("数据库连接失败".$e -> getMessage());
}
if(isset($_POST['num'])){
  $page_num=$_POST["num"];
}
$size=6;
$query_i=($page_num-1)*$size;
$result=$con->query('SELECT target,detail FROM consignation ORDER BY id desc LIMIT '.$query_i.','.$size);
while($row=$result->fetch()){
?>
<div class="consignation-item">
  <h3><?php echo $row['target'];?></h3>
  <p><?php echo $row['detail'];?></p>
</div>
<?php
}

$con=null;
?>
