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
function goPersonalPage(){
  if(getCookie('name')){
    window.location.href="./personal_page.php";
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}
function fetch_user()
 {
  $.ajax({
    async:       false,
   url:"./php/get_fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }
function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div><a class=personal_page_title>訊息內容</a><div></div><hr class=personal_page_hr></div>';
  modal_content += '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="chat with '+to_user_name+'">';
  modal_content += '<div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-'+to_user_id+'" class="ui-dialog-title"></span></div>';
  modal_content += '<div style="background-color:white;height:400px; border:1px solid #ccc; overflow-y: scroll; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="chat-btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

function fetch_user_chat_history(to_user_id)
 {
 
  $.ajax({
   url:"./php/fetch_user_chat_history.php",
   method:"POST",
   data:{user_id:getCookie("name"),to_user_id:to_user_id},
   success:function(data){

    $('#chat_history_'+to_user_id).html(data);
    var showContent = $('#chat_history_'+to_user_id);
    showContent[0].scrollTop = showContent[0].scrollHeight;
   }
  })
 }
 
$(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  fetch_user();
  /*$("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width: 70%
  });
  $('#user_dialog_'+to_user_id).dialog('open');*/
 });

$(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
    url:"./php/send_chat.php",
    method:"POST",
    data:{to_user_id:to_user_id,name:getCookie("name"),chat_message:chat_message},
    success:function(data)
    {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
    fetch_user();
    update_chat_history_data();
    }
  })
  });

$(document).ready(function(){
setLoginFrame();
get_sys_notice();
fetch_user();
if(check_get()){
  var chatwith=check_get();
  make_chat_dialog_box(chatwith, chatwith);
}
else{
  var to_user_id = $("#user_details > table > tbody > tr:nth-child(2) > td:nth-child(2) > button").data('touserid');
  var to_user_name = $("#user_details > table > tbody > tr:nth-child(2) > td:nth-child(2) > button").data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
}

setInterval(function(){
  fetch_user();
  update_chat_history_data();
 }, 5000); 
});
function get_sys_notice(){
  var result ="";
  $.ajax({
    async:       false,
    url: './php/get_sys_notice.php',                        // url位置
    type: 'post',                   // post/get
    data: {user:getCookie('name')},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      
      result = response;
      console.log(result);
     }// 成功後要執行的函數
})
if(result>0){
  $('.sys_notice a').text(result);
  $('.sys_notice').attr({"style":"visibility:visible"});
}

}
function get_msg_notice(){
  var result ="";
  $.ajax({
    async:       false,
    url: './php/get_msg_notice.php',                        // url位置
    type: 'post',                   // post/get
    data: {user:getCookie('name')},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      
      result = response;
      console.log(result);
     }// 成功後要執行的函數
})
if(result>0){
  $('.msg_notice a').text(result);
  $('.msg_notice').attr({"style":"visibility:visible"});
}

}
function check_get(){
  var getUrlString = location.href;
  var url = new URL(getUrlString);
  var chatwith=url.searchParams.get('chatwith');
  if(chatwith){
    return chatwith;
  }
  else{return false;}
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
$(document).keypress(function(e) 
    { 
        switch(e.which) 
        { 
            // user presses the “a” 
            case 13:    
            var to_user_id = $('.send_chat').attr('id');
            var chat_message = $('#chat_message_'+to_user_id).val();
            
            if(chat_message.length>0){
              $.ajax({
                url:"./php/send_chat.php",
                method:"POST",
                data:{to_user_id:to_user_id,name:getCookie("name"),chat_message:chat_message},
                success:function(data)
                {
                $('#chat_message_'+to_user_id).val('');
                $('#chat_history_'+to_user_id).html(data);
                fetch_user();
                update_chat_history_data();
                }
              })
            }
            
              break;  

            
        } 
    });
    