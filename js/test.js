$(function(){ 
    console.log(123);
    setLoginFrame();
      })

function setLoginFrame(){
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
}