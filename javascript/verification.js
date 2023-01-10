function verification(){
    var div2=document.createElement('div')
            //给当前div2对象设置样式
            div2.style.width="100%"
            div2.style.height="100%"
            div2.style.backgroundColor="rgba(0,0,0,0.3)"
            div2.style.position="absolute"
            div2.style.top="0px"
            div2.style.left="0px"
            div2.style.zIndex=10
            //把当前新节点追加到body中
            document.body.appendChild(div2)
            var div3=document.createElement('div')
            div3.style.position="absolute"
            div3.style.width="400px"
            div3.style.height="250px"
            div3.style.backgroundColor="white"
            div3.style.zIndex="11"
            div3.style.borderRadius="8px"
            div3.innerHTML="<script src='../javascript/ajax_v.js'></script><h1 id='p1'>|人机验证</h1><p id='p2'>为什么要进行人机验证？我们只是想确认您是否是机器人，避免向服务器发送重复的请求。</p><input id='word' type='text' class='word' placeholder='请输入验证码'><img class='code' src='../php/verification.php'><button id='bto' onclick='ver(),delete_v(),background()'>确定</button><p style='position:absolute;right:10px;top:-12px;height:0px;width:20px;font-size:40px;font-weight:500;color:rgba(0,0,0,0.3);cursor:pointer;' onclick='delete_v(),delete_s()'>×</p><a class='rep' onclick='delete_v(),verification()'>看不清？换一张</a>"
            document.body.appendChild(div3)


}
function delete_v(){
    //删除指定节点
    document.body.lastElementChild.previousElementSibling.remove()
    document.body.lastElementChild.remove()
}
function delete_s(){
    $.ajax({
        type:'post',
        cache: 'false',
        url:'../php/delete_s.php',
        dataType:'json',
        data:{
            
        }
})}
