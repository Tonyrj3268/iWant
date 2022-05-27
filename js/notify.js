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
  var modal_content = '<div id="notify_'+notify_id+'" class="notify_dialog" title="系統通知">';
  modal_content += '<div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-'+notify_id+'" class="ui-dialog-title">系統通知</span></div>';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="notify_history" notify_id="'+notify_id+'" id="notify_history_'+notify_id+'">';
  if(notify_id){
    modal_content += fetch_notify_chat_history(notify_id);}
  else{
    modal_content += "請選擇信件";
  }
  modal_content += '</div>';
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
  console.log($(this).children("td"));
  $(this).children("td").css("font-weight","normal")
 });

$(document).ready(function(){
setLoginFrame()
fetch_user();
make_notify_dialog_box("");
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