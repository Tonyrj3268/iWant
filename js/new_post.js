
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
  function sendAskToPoster(){
    if(getCookie('name')){
      window.location.href="./chat.php";
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
      if(cval!=null)
         document.cookie= name + "="+cval+";expires="+exp.toGMTString();
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
      url: './php/edit_item.php',                        // url位置
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
  
  function setLoginFrame(){
    var name = $( "#account:text" ),
    password = $( "#password:text" ),
    allFields = $( [] ).add( name ).add( password )
    
    
  
    $( '.loginframe' ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "登入": function() {
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
        },
        "取消": function() {
          $( this ).dialog( "close" );
        }
      },
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

     $('.shareClose').on('click', function() { 
      panel = $(this).attr('data-close-panel'); 
      $(panel+' .shareFade').fadeOut(100, function() { 
       $(panel).animate({ 
        'width': 'hide' 
       }, 1000); 
      }); 
     }); 
  
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
  
  $(function(){ 
    
    setLoginFrame();
      })