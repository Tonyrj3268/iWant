$(function(){ 

    setLoginFrame();
	})

function goSysNotify(){
  if(getCookie('name')){
    window.location.href="./sys_notify.php";
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}
function goMsg(){
  if(getCookie('name')){
    window.location.href="./chat.php";
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}
function sendAskToPoster(){
  if(getCookie('name')){
    window.location.href="./chat.php";
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}
    function setLoginFrame(){
        var name = $( "#account:text" ),
        password = $( "#password:text" ),
        allFields = $( [] ).add( name ).add( password )
        
      
        $( '.logoutframe' ).dialog({
          autoOpen: false,
          height: 300,
          width: 350,
          modal: true,
          close: function() {
            allFields.val( "" ).removeClass( "ui-state-error" );
          }
        });
      
         $("#accept_date").datepicker({
          dateFormat: "yy-mm-dd", //修改顯示順序
          todayButton: true.valueOf,
          dayNamesMin : ['日', '一', '二', '三', '四', '五', '六'],
          minDate: 0, maxDate: "+1M +10D" 
        });
        $("#accept_time").datetimepicker({
          datepicker:false,
          format:'H:i',
         
          /*allowTimes:[
            '09:00',
            '11:00',
            '12:00',
            '21:00']*/
        });  
      
      }
      function updateTips( t ) {
        tips = $(".validateTips" );
        tips
          .text( t )
          .addClass( "ui-state-highlight" );
      
        setTimeout(function() {
          tips
            .text("提示")
            .removeClass( "ui-state-highlight", 1500 );
        }, 5000 );
      }   
      function appendItem(){
        var formData = new FormData();
        let topic = document.getElementById('topic').value;
        let content = document.getElementById('content').value;
        let img = document.getElementById('post-content')[5].files;
        let price = document.getElementById('price').value;
        let place = document.getElementById('place').value;
        let rent_borrow = null;
        if(document.querySelector('input[name="rent_borrow"]:checked') == null){
          updateTips('請選擇租或借');
          return;
        }
        else{
          rent_borrow = document.querySelector('input[name="rent_borrow"]:checked').value;
        }
        formData.append('topic',topic);
        formData.append('content',content);
        formData.append('price',price);
        formData.append('place',place);
        formData.append('rent_borrow',rent_borrow);
        if(img !=null){
          console.log('have pic');
          formData.append('img',img[0]);
        }
        
        $.ajax({
          async:false,
          url: './php/postItem.php',                        // url位置
          type: 'post',                   // post/get
          data: formData,
          processData: false, // 告诉jQuery不要去处理发送的数据
          contentType: false, // 告诉jQuery不要去设置Content-Type请求头       // 輸入的資料
          error: function (xhr) {
            console.log('fail');
           },      // 錯誤後執行的函數
          success: function (response) {
            result = response;
            if(result == "success"){
              window.location.href='./index.php';
            }
            else {
              console.log(result);
              updateTips(result)
            }
           }// 成功後要執行的函數
      })
      }
      function setCookie(name,value)//设置cookie
  {
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ value + ";expires=" + exp.toGMTString();
  }

function getCookie(name)//拿到cookie
  {
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
      return unescape(arr[2]);
    else
      return null;
  }        

function delCookie(name)//删除cookie
  {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
       document.cookie= name + "="+cval+";expires="+exp.toGMTString();
  }
      