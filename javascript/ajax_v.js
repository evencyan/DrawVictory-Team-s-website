function ver(){
    console.log('js调用成功')
    background()
    $.ajax({
        type:'post',
        cache: 'false',
        url:'../php/ver.php',
        dataType:'json',
        data:{
            vernumber:$('.word').val()
        },
        success:function(re){
            if(re.result == 'ok'){
                delAll()
                send()
            }else if(re.result == 'error'){
                tooltipBox('验证码错误')
                delete_v()
                verification()
            }else if(re.result=null){
                console.log('ok')
            }
        }
    })
}