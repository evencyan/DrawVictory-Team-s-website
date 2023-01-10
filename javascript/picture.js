function picture(){
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
            div3.style.width="600px"
            div3.style.height="450px"
            div3.style.margin="auto"
            div3.style.left="0"
            div3.style.right="0"
            div3.style.top="0"
            div3.style.bottom="0"
            div3.style.backgroundColor="white"
            div3.style.zIndex="11"
            div3.style.borderRadius="8px"
            div3.innerHTML="<p style='position:absolute;right:10px;top:-12px;height:0px;width:20px;font-size:40px;font-weight:500;color:rgba(0,0,0,0.3);cursor:pointer;' onclick='delete_p()'>×</p>"
            document.body.appendChild(div3)
}
function delete_p(){
    //删除指定节点
    document.body.lastElementChild.previousElementSibling.remove()
    document.body.lastElementChild.remove()
}