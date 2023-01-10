function send(){
    console.log('js文件调用成功')
    $.ajax({
     type:'post',
     url:'../php/register.php',
     dataType:'json',
     data:{
         number:$('.number').val(),
         email:$('.email').val(),
         password:$('.password').val(),
         password2:$('.password2').val()
     },
     success:function(res){
         console.log(res);
         if(res.result =='error1'){
            tooltipBox('用户名，邮箱或密码不能为空。');
            delAll()
         }else if(res.result =='error2'){
            tooltipBox('两次密码不一致。');
            delAll()
         }else if(res.result =='error3'){
            tooltipBox('用户名已存在。');
            delAll()
         }else if(res.result == 'error4'){
            tooltipBox('一个账户只能使用一个邮箱。');
            delAll()
         }
         else if(res.result == 'ok'){
         tooltipBox('注册成功，请到邮箱完成激活');
         delAll()
         }
     } 
    }) ;
 };
 