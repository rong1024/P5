function post(){
  var target=document.getElementById('target').value;
  var detail=document.getElementById('detail').value;
  if(target&&detail){
    $.ajax({
      type:"post",
      url:"post_consignation.php",
      data:{
        target_item:target,
        detail_item:detail
      },
      success:function(response){
        document.getElementById('consignation_content').innerHTML=response;
        $('#target').val("");
        $('#detail').val("");
      }
    });
  }else{
    alert("请将委托目标和细节填好");
  }
  return false;
  //防止页面跳转
}
function page(updown){
  var allNum;//定义总条数
  //ajax获取总页数
  $.ajax({
    type:"post",
    url:"post_allNum.php",
    async:false,
    success:function(response){
      allNum=response;
    }
  });
  page_max=Math.ceil(allNum/6);
  //判断是否第一页和最后一页
  if((page_num==1&&updown==-1)||(page_num==page_max&&updown==1)){
    return false;
  }
  if(updown=="header"){
    page_num=1;
  }else if(updown=="footer"){
    page_num=page_max;
  }else{
    page_num=page_num+updown;
  }
  $.ajax({
    type:"post",
    url:"post_page.php",
    data:{
      num:page_num
    },
    async:false,
    success:function(response){
      document.getElementById('consignation_content').innerHTML=response;
    }
  });
  document.getElementById('allpage_num').innerHTML="共"+page_max+"页";
  document.getElementById('current_page').innerHTML="当前页码："+page_num;
  return false;
  //防止页面跳转
}


var page_num=1;


