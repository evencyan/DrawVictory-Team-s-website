//代码归DrawVictory Team绘赢团队所有
//DrawVictory Team ©2022 Copyright
//Dinosaur.YH  编写
function init () {
    function typeLoop() {
      textUtils.typeText('我们是一群热爱游戏的学生开发者')
        .then(() => utils.wait(4000))
        .then(() => textUtils.removeText(26))
        .then(() => textUtils.typeText('创意无限'))
        .then(() => utils.wait(4000))
        .then(() => textUtils.removeText(4))
        .then(() => textUtils.typeText('只为做出更好的游戏'))
        .then(() => utils.wait(4000))
        .then(() => textUtils.removeText(9))
        .then(typeLoop)
    }
    utils.wait(1000).then(() => {
      textUtils.clearText()
      textUtils.typeText('Hello.(￣▽￣)').then(typeLoop)
    })
  }
  
  const textNode = document.getElementById('type-text')
  let text = ''
  
  const utils = {
    genRandomInterval: () => {
      const randomMsInterval = 100 * Math.random()
      const msInterval = randomMsInterval < 50 ? 10 : randomMsInterval
      return msInterval
    },
    wait: (time) => {
      return new Promise(resolve => {
        setTimeout(resolve, time)
      })
    }
  }
  
  const characterUtils = {
    pushCharacter: (character) => {
      text += character
      textUtils.updateText()
    },
    popCharacter: () => {
      text = text.slice(0, text.length -1)
      textUtils.updateText()
    },
    typeCharacter: (character) => {
      return new Promise(resolve => {
        const msInterval = utils.genRandomInterval()
        characterUtils.pushCharacter(character)
        utils.wait(msInterval).then(resolve)
      })
    },
    removeCharacter: () => {
      return new Promise(resolve => {
        const msInterval = utils.genRandomInterval()
        characterUtils.popCharacter()
        utils.wait(msInterval).then(resolve)
      })
    }
  }
  
  const textUtils = {
    updateText: () => {
      textNode.innerText = text
    },
    clearText: () => {
      text = ''
      textUtils.updateText()
    },
    typeText: (text) => {
      return new Promise(resolve => {
        (function _type (index) {
          characterUtils.typeCharacter(text[index]).then(() => {
            if (index + 1 < text.length) {
              _type(index + 1)
            } else {
              resolve()
            }
          })
        })(0)
      })
    },
    removeText: (amount) => {
      return new Promise(resolve => {
        (function _remove (index) {
          characterUtils.removeCharacter().then(() => {
            if (index + 1 < amount) {
              _remove(index + 1)
            } else {
              resolve()
            }
          })
        })(0)
      })
    }
  }
  
  init()