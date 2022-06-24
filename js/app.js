function gotoregister(){
  window.location.href="./register.php";
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
function sendAskToPoster(to_user_id,stuff_id){
  if(getCookie('name')){
    $( '.askframe' ).dialog('open');
    $( '.askframe' ).attr('to_user_id',to_user_id);
    $( '.askframe' ).attr('stuff_id',stuff_id);
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}
function acceptAskToPoster(to_user_id,stuff_id){
  if(getCookie('name')){
    $( '.acceptframe' ).dialog('open');
    $( '.acceptframe' ).attr('to_user_id',to_user_id);
    $( '.acceptframe' ).attr('stuff_id',stuff_id);
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}

function chat(user_id){
  //是否要警告視窗
  if(getCookie('name')==user_id){
    window.location.href="./personal_page.php";
  }
  else{
    url="./chat.php?chatwith=";
    url+=user_id;
    window.location.href=url;
  }

}

function register_verify_account(){
  var tips='';
  console.log($(reg_account).val());
  $.ajax({
    async:       false,
    url: './php/register_account.php',                        // url位置
    type: 'post',                   // post/get
    data: {account: $(reg_account).val(),password:$(reg_password).val(),repassword:$(reg_repassword).val()},       // 輸入的資料    // 錯誤後執行的函數
    success: function (response) {
      tips = response;
     }// 成功後要執行的函數
})
  return tips;
}

function register_verify_email(){
  var tips='';
  $.ajax({
    async:       false,
    url: './php/register_email.php',                        // url位置
    type: 'post',                   // post/get
    data: {email: $(reg_email).val()},       // 輸入的資料    // 錯誤後執行的函數
    success: function (response) {
      tips = response;
     }// 成功後要執行的函數
})
  return tips;
}

function register(){
  var tips='';
  $.ajax({
    async:       false,
    url: './php/register_info.php',                        // url位置
    type: 'post',                   // post/get
    data: {account: $(reg_account).val(),password:$(reg_password).val(),repassword:$(reg_repassword).val(),email: $(reg_email).val(),name: $(reg_name).val(), department: $(reg_dep).val(), stu_ID: $(reg_stu_ID).val()},       // 輸入的資料    // 錯誤後執行的函數
    success: function (response) {
      console.log(response);
      tips = response;
     }// 成功後要執行的函數
})
return tips;
}

function uploadpic(element){
  var formData = new FormData();
  let img = document.getElementById('upfile')[0].files;
  console.log(document.getElementById('upfile')[0]);
  let selectItem = $('.itemframe').attr("item-index");
  formData.append('img',img[0]);
  formData.append('index',selectItem);
  $.ajax({
    //async:       false,
    url: './php/pic_store.php',                        // url位置
    type: 'post',                   // post/get
    data: formData,
    processData: false, // 告诉jQuery不要去处理发送的数据
    contentType: false, // 告诉jQuery不要去设置Content-Type请求头       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      console.log(response);
      const data = JSON.parse(response);
      if(data.error != 1){
        document.getElementById('pic').value='';
        let path = 'uploads/' + data.src;
        $('#stuff_img').attr('src',path);
        $('#stuff_img').fadeOut(1).fadeIn(1000);
      }
     }// 成功後要執行的函數
})
}
function loginframe_login(e){
  var name = $( "#account:text" );
  var  password = $( "#password:text" );
  var allFields = $( [] ).add( name ).add( password );
  allFields.removeClass( "ui-state-error" );
  var result = login();
  var val = name.val()
  if(result.res.trim() == "success"){
    $( '.loginframe' ).dialog("close");
    window.location.href='./home.php';
    setCookie("name",val);
    setCookie("user_incession",result.incession);
  }
  else {
    updateTips(result);
  }
}
function login(){
  var tips="";
  $.ajax({
    async:       false,
    url: './php/login.php',                        // url位置
    type: 'post',                   // post/get
    data: $('#form').serialize(),       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      const data = JSON.parse(response);
      tips = data;
     }// 成功後要執行的函數
})
  return tips;
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
    
    if(cval!=null){
      console.log(cval);
        console.log(exp.toGMTString());
       document.cookie= name + "="+cval+";expires="+exp.toGMTString();
    }
        
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

function setItemContainer(){
    $container = $('#item-container');
    $container.empty();
    //item div
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("item");
    itemDiv.innerHTML = getItemList();

    //add in list
    $container.append(itemDiv);
}

function getItemList(){
  let category = document.getElementById('change_category').selectedIndex;
  var result ="";
  $.ajax({
    async:       false,
    url: './php/collectItem.php',                        // url位置
    type: 'post',                   // post/get
    data: {category:category,status: document.querySelector('input[name="item-category"]:checked').value},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
    
     }// 成功後要執行的函數
})
return result;
}

function searchItemList(){
  let category = document.getElementById('change_category').selectedIndex;
  var result =[];
  $.ajax({
    async:       false,
    url: './php/searchItem.php',                        // url位置
    type: 'post',                   // post/get
    data: {category:category,status: document.querySelector('input[name="item-category"]:checked').value},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      console.log(response);
      result.push(response);
    
     }// 成功後要執行的函數
})
console.log(result);
return result;
}


function getEval(item_index){
  var result ="";
  $.ajax({
    async:       false,
    url: './php/get_evaluation.php',                        // url位置
    type: 'post',                   // post/get
    data: {stuff_id: item_index},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
     }// 成功後要執行的函數
})
return result;
}

function showItem(element){
  //console.log(element);
  var item_index = element.getAttribute("data-index");
  var postfrom = element.getAttribute("postfrom");
  var result = getItem(item_index);
  //console.log(result);
  $( '.itemframe' ).dialog('open');
  $('.item-content').html(result) ;
  $( '.itemframe' ).attr('item-index',item_index);
  if(getCookie('name')==postfrom){
    var edit = '';
    var check=getEval(item_index)
    edit+="<div style='overflow-y: auto;width:70%;height:190px;'><a>評價</a></br><hr>"
    if(check){
      edit+=check;
    }
    edit+="</div>";
    edit+=' <a class="item-content-btn item-content-btn-edit">編輯</a>';
    $('.item-content').html(result+edit) ;
    $('.item-content-btn-edit').on('click', function() { 
      
      document.getElementById("form").submit();
    })
  }
  else{
   
    var edit='';
    var check=getEval(item_index)
    edit+="<div style='overflow-y: auto;width:70%;height:190px;'><a>評價</a></br><hr>"
    if(check){
      edit+=check;
    }
    edit+="</div>";
    edit += '<a onclick="sendAskToPoster('+postfrom+','+item_index+')" class="item-content-btn item-content-btn-edit"">我要租借</a>';
    if($('.item-content > input[type=hidden]:nth-child(3)').val()=="borrow"){
      edit = '<a onclick="acceptAskToPoster('+postfrom+','+item_index+')" class="item-content-btn item-content-btn-edit"">我要借你</a>';
    }
    $('.item-content').html(result+edit) ;
  }
  $(".datepicker").datepicker({
    dateFormat: "yy-mm-dd", //修改顯示順序
    todayButton: true.valueOf,
    dayNamesMin : ['日', '一', '二', '三', '四', '五', '六'],
    minDate: 0, maxDate: "+1M +10D" 
  });
  $("#datetimepicker").datetimepicker({
    datepicker:false,
    format:'H:i',
   
    /*allowTimes:[
      '09:00',
      '11:00',
      '12:00',
      '21:00']*/
  });
}

function getItem(item_index){
  var result ="";
  $.ajax({
    async:       false,
    url: './php/getItem.php',                        // url位置
    type: 'post',                   // post/get
    data: {item:item_index},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
      //console.log(response);
     }// 成功後要執行的函數
})
  return result;
}

function goPersonalPage(){
  if(getCookie('name')){
    window.location.href="./personal_page.php";
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
}

function goAppendItem(){
  if(getCookie('name')){
    window.location.href="./new-post.php";
  }
  else{
    $( '.loginframe' ).dialog('open');
  }
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

function editItem(){
  var formData = new FormData();
  let topic = document.getElementById('topic').value;
  let content = document.getElementById('content').value;
  let img = document.getElementById('post-content')[5].files;
  let price = document.getElementById('price').value;
  let category = document.getElementById('stuff_select').value;
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
  formData.append('category',category);
  if(img !=null){
    console.log('have pic');
    formData.append('img',img[0]);
  }
  
  $.ajax({
    async:false,
    url: './php/edit_item.php',
    type: 'post',                 // post/get
    data: formData,
    processData: false, // 告诉jQuery不要去处理发送的数据
    contentType: false, // 告诉jQuery不要去设置Content-Type请求头       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
      if(result == "success"){
        window.location.href='./personal_page.php';
      }
      else {
        console.log(result);
        updateTips(result)
      }
     }// 成功後要執行的函數
})
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

function send_notify(to_user_id,stuff_id,notify_topic,notify_content){
      console.log(to_user_id);
      console.log(stuff_id);
      console.log(notify_topic);
      console.log(notify_content);
  
      $.ajax({
        async:false,
        url: './php/rent_stuff_notify.php',                        // url位置
        type: 'post',                   // post/get
        data: {to_user_id:to_user_id,
                stuff_id:stuff_id,
                notify_topic:notify_topic,
                notify_content:notify_content},
        error: function (xhr) {
          console.log('fail');
         },      // 錯誤後執行的函數
        success: function (response) {
          result = response;
          console.log(result);
          if(result == "success"){
            window.location.href="./personal_page.php";
          }
          else {
            updateTips(result)
          }
         }// 成功後要執行的函數
    })
  

}

function setLoginFrame(){
  var name = $( "#account:text" ),
  password = $( "#password:text" ),
  allFields = $( [] ).add( name ).add( password )
  
  

  $( '.loginframe' ).dialog({
    autoOpen: false,
    height: 450,
    width: 450,
    modal: true,
    
    close: function() {
      allFields.val( "" ).removeClass( "ui-state-error" );
    }
  });

  $( '.logoutframe' ).dialog({
    autoOpen: false,
    height: 300,
    width: 350,
    modal: true,
    close: function() {
      allFields.val( "" ).removeClass( "ui-state-error" );
    }
  });

  $( '.itemframe' ).dialog({
    autoOpen: false,
    height: 500,
    width: 800,
    modal: true,
    close: function() {
      allFields.val( "" ).removeClass( "ui-state-error" );
    }
  });

  $( '.askframe' ).dialog({
    autoOpen: false,
    height: 300,
    width: 350,
    modal: true,
    buttons: {
      "確認": function() {
        allFields.removeClass( "ui-state-error" );
        to_user_id=$( '.askframe' ).attr('to_user_id');
        stuff_id=$( '.askframe' ).attr('stuff_id');
        if(send_application(getCookie('name'),stuff_id)=="success"){
          send_notify(to_user_id,stuff_id,'有人想租用您的商品','向您的商品(編號:'+stuff_id+')提出申請，並將傳送訊息給您!請至<個人頁面><我的商品>按下確認按鈕!');
        }
        else{
          console.log("fail")
        }
        
      },
      "取消": function() {
        $( this ).dialog( "close" );
      }
    },
    close: function() {
      allFields.val( "" ).removeClass( "ui-state-error" );
    }
  });
  $( '.acceptframe' ).dialog({
    autoOpen: false,
    height: 300,
    width: 350,
    modal: true,
    buttons: {
      "確認": function() {
        allFields.removeClass( "ui-state-error" );
        to_user_id=$( '.acceptframe' ).attr('to_user_id');
        stuff_id=$( '.acceptframe' ).attr('stuff_id');
        if(send_application(getCookie('name'),stuff_id)=="success"){
          send_notify(to_user_id,stuff_id,'有人願意出借商品給您','願意接受您的申請(編號:'+stuff_id+')，請傳送訊息給他並確認交易內容!請至<個人頁面><我的商品>按下確認按鈕!');
        }
        else{
          console.log("fail")
        }
        
      },
      "取消": function() {
        $( this ).dialog( "close" );
      }
    },
    close: function() {
      allFields.val( "" ).removeClass( "ui-state-error" );
    }
  });

  /*$(".search-bar").change(function () {
    var searchText = $(this).val();//獲取輸入的搜尋內容
    var $searchLi = "";//預備物件，用於儲存匹配出的li
    if (searchText != "") {
    //獲取所有匹配的li
    $searchLi = $(".item").find('a:contains('  searchText  ')').parent();
    //將內容清空
    $("#content_news_list").html("");
    }
    //將獲取的元素追加到列表中
    $("#content_news_list").html($searchLi).clone();
    //判斷搜尋內容是否有效，若無效，輸出not find
    if ($searchLi.length <= 0) {
    $("#content_news_list").html("<li>not find</li>")
    }
    })
    $("input[type=submit]").click(function () {
    $("searchText").change();
    })*/

}

function readURL(input){

  if(input.files && input.files[0]){

    var imageTagID = input.getAttribute("targetID");

    var reader = new FileReader();

    reader.onload = function (e) {
       var img = document.getElementById(imageTagID);
       img.setAttribute("src", e.target.result);

    }

    reader.readAsDataURL(input.files[0]);

  }

}

function change_category(){
  let category = document.getElementById('change_category').selectedIndex;
  let status = document.querySelector('input[name="item-category"]:checked').value
  var result ="";
  $.ajax({
    async:       false,
    url: './php/change_category.php',                        // url位置
    type: 'post',                   // post/get
    data: {category: category,status:status},       // 輸入的資料
    error: function (xhr) {
      console.log('fail');
     },      // 錯誤後執行的函數
    success: function (response) {
      result = response;
      //console.log(response);
     }})// 成功後要執行的函數

  $container = $('#item-container');
    $container.empty();
    //item div
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("item");
    itemDiv.innerHTML = result;

    //add in list
    $container.append(itemDiv);
}

function send_application(user_id,stuff_id){
  var result='';
  console.log(user_id);
  console.log(stuff_id);
  $.ajax({
    async:       false,
    url: './php/send_application.php',                        // url位置
    type: 'post',                   // post/get
    data: {user_id: user_id,stuff_id:stuff_id},       // 輸入的資料
    error: function (xhr) {
      console.log('fail2');
     },      // 錯誤後執行的函數
    success: function (response) {
      console.log(response);
      result = response;
      //console.log(response);
     }})// 成功後要執行的函數
     return result;
}

$(function(){ 
  
 setItemContainer();
  setLoginFrame();
  get_sys_notice();
  get_msg_notice();

  
 })
 $(document).keypress(function(e) 
    { 
        switch(e.which) 
        { 
            // user presses the “a” 
            case 13:    
            var name = $( "#account:text" );
            allFields.removeClass( "ui-state-error" );
            var result = login();
            var val = name.val()
            if(result.res.trim() == "success"){
              $( '.loginframe' ).dialog("close");
              window.location.href='./home.php';
              setCookie("name",val);
              setCookie("user_incession",result.incession);
            }
            else {
              updateTips(result);
            }
            
              break;  

            
        } 
    });