<?php
$servername="localhost";
$username="root";
$password="";
try{
  $con=new PDO("mysql:host=$servername;dbname=P5",$username,$password);
}catch(PDOException $e){
  die("数据库连接失败".$e -> getMessage());
}
$result=$con->query('SELECT target,detail FROM consignation ORDER BY id desc');
$rows=$result->fetchAll(PDO::FETCH_ASSOC);//获取所有结果集
echo count($rows);
$con=null;
?>
