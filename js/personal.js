$(document).ready(function(){ 
    setLoginFrame();
	getPersonalContent();
  get_perosinal_function_1();
	})

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
function getPersonalContent(){
    var result ="";
    $.ajax({
    async:       false,
    url: './php/personal_page.php',                        // url位置
    type: 'post',                   // post/get
    data: {name:getCookie('name')},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
     }// 成功後要執行的函數
    })
    $("#personal_content").html(result);
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
      
  }
  
  function goSysNotify(){
    if(getCookie('name')){
      window.location.href="./sys_notify.php";
    }
    else{
      $( '.loginframe' ).dialog('open');
    }
  }
  function goPersonalPage(){
    if(getCookie('name')){
      window.location.href="./personal_page.php";
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

  function get_perosinal_function_1(){
    user_id=getCookie('name');
    var result ="";
    $.ajax({
    async:       false,
    url: './php/personal_page_function_1.php',                        // url位置
    type: 'post',                   // post/get
    data: {name:user_id},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
     }// 成功後要執行的函數
    })
    $("#personal_function_content").html(result);
  }
  function get_perosinal_function_2(){
    user_id=getCookie('name');
    var result ="";
    $.ajax({
    async:       false,
    url: './php/personal_page_function_2.php',                        // url位置
    type: 'post',                   // post/get
    data: {name:user_id},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
     }// 成功後要執行的函數
    })
    $("#personal_function_content").html(result);
  }
  function get_perosinal_function_3(){
    user_id=getCookie('name');
    var result ="";
    $.ajax({
    async:       false,
    url: './php/personal_page_function_3.php',                        // url位置
    type: 'post',                   // post/get
    data: {name:user_id},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
     }// 成功後要執行的函數
    })
    $("#personal_function_content").html(result);
  }