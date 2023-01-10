var PromptBox = document.querySelector('.bac')
function background(){
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
            div2.innerHTML="<img class='logo_wait' src='../picture/wait.gif' width='95px' style='z-index:18;'>"
            document.body.appendChild(div2)
}

//创建删除方法
function delAll(){
    //删除指定节点
    document.body.lastElementChild.remove()
}

