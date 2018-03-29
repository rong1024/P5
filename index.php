<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
<link rel="stylesheet" href="css\reset.css">
<link rel="stylesheet" href="css\main.css">
<script src="jquery-3.3.1.min.js"></script>
<script src="main.js"></script>
</head>
<body>
  <div class="wrap">
    <div class="inform">
      <img src="images\intro_img1.png" alt="" class="icon">
      <div class="inform-content">欢迎来到怪盗团的据点 !!</div>
    </div>
    <div class="container">
      <header>
        <ul class="nav clearfix">
          <li class="consignation"><a href=""></a></li>
          <li class="thanks"><a href=""></a></li>
          <li class="feats"><a href=""></a></li>
        </ul>
      </header>
      <div class="consignation-list">
        <div class="consignation-content clearfix" id="consignation_content">
          <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="P5";
            try{
              $con=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            }catch(PDOException $e){
              echo "数据库连接失败，原因是：".$e->getMessage();
            }
              $query_i=0;//记录请求的索引
              $size=6;
              $result=$con->query('SELECT target,detail FROM consignation ORDER BY id desc LIMIT '.$query_i.','.$size);
            while($row=$result->fetch()){//读取直到最后一行数据
            ?>
              <div class="consignation-item">
                <h3><?php echo $row['target'];?></h3>
                <p><?php echo $row['detail'];?></p>
              </div>
            <?php
            }

            ?>

        </div>
        <div class="btnlist">
          <ul class="clearfix">
            <li onclick="page('header')">首页</li>
            <li onclick="page(-1)">前一页</li>
            <li onclick="page(1)">后一页</li>
            <li onclick="page('footer')">末页</li>
          </ul>
          <div class="pagebox">
            <span id="current_page">当前页码：1</span>
            <?php
            $result=$con->query('SELECT target,detail FROM consignation ORDER BY id desc');
            $rows=count($result->fetchAll());
            $page_max=ceil($rows/6);
            ?>
            <span id="allpage_num">共 <?php echo $page_max; ?> 页</span>
            <?php
              $con=null;
            ?>
          </div>
        </div>
      </div>
      <div class="consignation-new">
        <form action="" method="post" onsubmit="return post()">
          <h2>新的委托</h2>
          <div class="target-box">
            <span>目标：</span><input type="text" name="target" id="target">
          </div>
          <div class="detail-box">
            <span>细节描述：</span>
            <textarea name="detail" rows="8" cols="80" id="detail"></textarea>
          </div>
          <input type="submit" value="提交" class="btn-submit">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
