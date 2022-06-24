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
function test(){
    console.log("test");
}
function fetch_user()
 {
  $.ajax({
    async:       false,
   url:"./php/get_sys_notify.php",
   method:"POST",
   success:function(data){
    $('#sys_notify').html(data);
   }
  })
 }
function make_notify_dialog_box(notify_id)
 {
  var modal_content = '<div><a class=personal_page_title>系統通知</a><div></div><hr class=personal_page_hr></div>';
  modal_content += '<div id="notify_'+notify_id+'" class="notify_dialog" title="">';
  modal_content += '<div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-'+notify_id+'" class="ui-dialog-title"></span></div>';
  modal_content += '<div style="background-color:white;height:400px; border:1px solid #ccc; overflow-y: scroll; padding:16px;" class="notify_history" notify_id="'+notify_id+'" id="notify_history_'+notify_id+'">';
  if(notify_id){
    modal_content += fetch_notify_chat_history(notify_id);}
  else{
    modal_content += "請選擇信件";
  }
  modal_content += '</div>';
  modal_content += '<div class="form-group"></div>';
  modal_content+= '</div></div>';
  $('#sys_notify_details').html(modal_content);
  
 }

function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

function fetch_notify_chat_history(notify_id)
 {
 
  $.ajax({
   url:"./php/fetch_notify.php",
   method:"POST",
   data:{user_id:getCookie("name"),notify_id:notify_id},
   success:function(data){
    $('#notify_history_'+notify_id).html(data);
    /*var showContent = $('#chat_history_'+to_user_id);
    showContent[0].scrollTop = showContent[0].scrollHeight;*/
   }
  })
 }
 
$(document).on('click', '.notify', function(){
  var notify_id = $(this).attr('notify_id');
  make_notify_dialog_box(notify_id);
  fetch_user();
  $(this).children("td").css("font-weight","normal")
 });

$(document).ready(function(){
setLoginFrame()
fetch_user();
make_notify_dialog_box("");
  get_msg_notice();
/*setInterval(function(){
  fetch_user();
  update_chat_history_data();
 }, 5000); */
});

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