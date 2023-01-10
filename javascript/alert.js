//代码归DrawVictory Team绘赢团队所有
//DrawVictory Team ©2022 Copyright
//Dinosaur.YH  编写
var PromptBox = document.querySelector('.PromptBox')//定位再最上面的盒子
var btn = document.querySelector('.button')//触发按钮

function tooltipBox(information) {
    var div = document.createElement('div')//创建一个div节点
    div.innerHTML = information//加内容信息
    div.classList.add('prompt')//加样式
    PromptBox.insertBefore(div, PromptBox.children[0])//放进最上面的盒子里
    //放进里面1毫秒后 发生改变才会过度
    setTimeout(() => {
        div.classList.add('shown')
    }, 5);
    //过3秒后删除 发生改变
    setTimeout(() => {
        div.classList.remove('shown')
    }, 3000)
    //过3.5秒后删除
    setTimeout(() => {
        div.remove()
    }, 3500)
}