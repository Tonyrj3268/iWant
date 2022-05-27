$(document).ready(function(){ 
    setLoginFrame();
	getPersonalContent();
  
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
      console.log(response);
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

  function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }