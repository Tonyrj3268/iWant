$(document).ready(function(){ 
    setLoginFrame();
	getPersonalContent();
  show_my_stuff();
  get_sys_notice();
  get_msg_notice();
	})
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
    url: './php/personal_page_function1_shopping.php',                        // url位置
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
    $(".mystuff").removeClass( "be-selected-cart" );
    $(".cart").addClass( "be-selected-cart" );
    
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
    $("#personal_page_function_1").removeClass( "be-selected-function" );
    $("#personal_page_function_3").removeClass( "be-selected-function" );
    $("#personal_page_function_2").addClass( "be-selected-function" );
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
    $("#personal_page_function_1").removeClass( "be-selected-function" );
    $("#personal_page_function_2").removeClass( "be-selected-function" );
    $("#personal_page_function_3").addClass( "be-selected-function" );
  }

  function update_info(){
    var formData = new FormData();
    let name = document.getElementById('personal_f3_personal_name').value;
    let img = document.getElementById('personal_f3_form')[1].files;
    let dep = document.getElementById('personal_f3_personal_dep').value;
    let others = document.getElementById('personal_f3_personal_others').value;
    formData.append('name',name);
    formData.append('dep',dep);
    formData.append('others',others);
    if(img !=null){
      console.log('have pic');
      formData.append('img',img[0]);
    }
    
    $.ajax({
      async:false,
      url: './php/update_user_info.php',                        // url位置
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
          //get_perosinal_function_3();
          window.location.href='./personal_page.php';
        }
        else {
          console.log(result);
          updateTips(result)
        }
       }// 成功後要執行的函數
  })
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

function write_evaluation(element){
  record_id=element.getAttribute("record_id");
  eval_content="<a>請輸入評分1~5:</a><input class=eval_score></input></br>";
  eval_content+="<a>請輸入評價:</a><input class=eval_content></input></br>";
  eval_content+="<a onclick=send_evaluation("+record_id+",$('.eval_score').val(),$('.eval_content').val())>確認</a><a onclick=back_evaluation(this)>取消</a>";
    element.parentElement.innerHTML=eval_content;
}

function back_evaluation(element){
  eval_content="<a onclick=write_evaluation(this)>撰寫評價</a>"
  element.parentElement.innerHTML=eval_content;
}

function send_evaluation(record_id,score,content){
  $.ajax({
    async:false,
    url: './php/send_evaluation.php',                        // url位置
    type: 'post',                   // post/get
    data: {record_id:record_id,score:score,content:content},

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

function show_my_stuff(){
  
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
    $("#personal_page_function_2").removeClass( "be-selected-function" );
    $("#personal_page_function_3").removeClass( "be-selected-function" );
    $("#personal_page_function_1").addClass( "be-selected-function" );
    $(".cart").removeClass( "be-selected-cart" );
    $(".mystuff").addClass( "be-selected-cart" );
}

function seller_accept(element){
  var r=confirm("確認接受訂單嗎?")
  var record_id=element.getAttribute("record_id");
  var who_change='seller';
  var result='';
  
  if (r==true)
    {
      $.ajax({
        async:       false,
        url: './php/change_order_status.php',                        // url位置
        type: 'post',                   // post/get
        data: {who_change:who_change,record_id:record_id},       // 輸入的資料
        error: function (xhr) {
          console.log('fail');
         },      // 錯誤後執行的函數
        success: function (response) {
          console.log(response);
          result = response;
         }// 成功後要執行的函數
        })
    }
    if(result=='success'){
      //send_notify(to_user_id,stuff_id,'賣家已接受您的訂單','賣家以接受您的訂單，請盡快與賣家聯絡!');
      window.location.href="./personal_page.php";

    }
}

function seller_reject(element){
  var r=confirm("拒絕此訂單嗎?")
  var record_id=element.getAttribute("record_id");
  var who_change='seller';
  var result='';
  if (r==true)
    {
      $.ajax({
        async:       false,
        url: './php/buyer_cancel.php',                        // url位置
        type: 'post',                   // post/get
        data: {who_change:who_change,record_id:record_id},       // 輸入的資料
        error: function (xhr) {
          console.log('fail');
         },      // 錯誤後執行的函數
        success: function (response) {
          result = response;
         }// 成功後要執行的函數
        })
    }
    if(result=='success'){
      //send_notify(to_user_id,stuff_id,notify_topic,notify_content);
      window.location.href="./personal_page.php";
    }
}

function seller_check_retake(element){
  var r=confirm("確認已收回商品嗎?")
  var record_id=element.getAttribute("record_id");
  var who_change='seller';
  var result='';
  if (r==true)
    {
      $.ajax({
        async:       false,
        url: './php/change_order_status.php',                        // url位置
        type: 'post',                   // post/get
        data: {who_change:who_change,record_id:record_id},       // 輸入的資料
        error: function (xhr) {
          console.log('fail');
         },      // 錯誤後執行的函數
        success: function (response) {
          result = response;
         }// 成功後要執行的函數
        })
    }
    if(result=='success'){
      //send_notify(to_user_id,stuff_id,notify_topic,notify_content);
      window.location.href="./personal_page.php";
    }
}

function buyer_cancel(element){
  var r=confirm("確定取消此訂單嗎?")
  var record_id=element.getAttribute("record_id");
  var who_change='buyer';
  var result='';
  if (r==true)
    {
      $.ajax({
        async:       false,
        url: './php/buyer_cancel.php',                        // url位置
        type: 'post',                   // post/get
        data: {who_change:who_change,record_id:record_id},       // 輸入的資料
        error: function (xhr) {
          console.log('fail');
         },      // 錯誤後執行的函數
        success: function (response) {
          result = response;
         }// 成功後要執行的函數
        })
    }
  if(result=='success'){
    //send_notify(to_user_id,stuff_id,notify_topic,notify_content);
    window.location.href="./personal_page.php";
  }
}

function buyer_return(element){
  var r=confirm("確認商品已歸還賣家嗎?")
  var record_id=element.getAttribute("record_id");
  var who_change='buyer';
  var result='';
  if (r==true)
    {
      $.ajax({
        async:       false,
        url: './php/change_order_status.php',                        // url位置
        type: 'post',                   // post/get
        data: {who_change:who_change,record_id:record_id},       // 輸入的資料
        error: function (xhr) {
          console.log('fail');
         },      // 錯誤後執行的函數
        success: function (response) {
          result = response;
          console.log(result);
         }// 成功後要執行的函數
        })
    }
    if(result=='success'){
      //send_notify(to_user_id,stuff_id,notify_topic,notify_content);
      window.location.href="./personal_page.php";
    }
}

function send_notify(to_user_id,stuff_id,notify_topic,notify_content){
  var topic=notify_topic;
  var content=notify_content;

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
      if(result == "success"){
        window.location.href="./personal_page.php";
      }
      else {
        console.log(result);
        updateTips(result)
      }
     }// 成功後要執行的函數
})

}