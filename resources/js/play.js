import './app'

const moneyTreeButton = document.getElementById('toggle_money_tree')
const moneyTree = document.getElementById('money_tree')

window.openMoneyTree = function() {
    moneyTreeButton.setAttribute('onclick', 'closeMoneyTree()')
    moneyTreeButton.src = '/assets/img/close.png'
    moneyTreeButton.alt = 'Schließen'
    moneyTree.style.bottom = '0'
}

window.closeMoneyTree = function() {
    moneyTreeButton.setAttribute('onclick', 'openMoneyTree()')
    moneyTreeButton.src = '/assets/img/list.png'
    moneyTreeButton.alt = 'Spielfortschritt'
    moneyTree.style.bottom = "-100%"
}

const logo = document.getElementById('logo')
const question = document.getElementById('question')
const answers = document.getElementsByClassName('answer')
let correctAnswer = 0;
let hubDisplay = logo
let percentages = new Array(4)
let keep = -1
let level = 0
let processing = false
let quotes = [
    'Es könnte alles sein. %?',
    'Vielleicht ist es %. Ich bin mir aber absolut nicht sicher.',
    '% ergibt für mich noch den meisten Sinn...',
    'Ich würde zu % tendieren.',
    'Antwort %, oder?',
    'Ich bin ziemlich sicher, dass es % ist!',
    'Das müsste % sein!',
    'Antwort % natürlich!'
]

// window.onload = () => { update() }

// window.update = function() {
//     question.innerHTML = '<span>' + questions[level][0] + '</span>'
//
//     for (let i = 0; i < answers.length; i++) {
//         answers[i].innerHTML = '<span>' + questions[level][i + 1] + '</span>'
//         answers[i].addEventListener('click', check)
//     }
//
//     moneyTree.getElementsByTagName('tr')[14 - level].classList.add('current_level')
// }

window.check = function() {
    if (processing) return
    processing = true
    this.style.backgroundImage = "url('assets/img/orange_button.png')"
    this.style.color = 'black'

    for (let answer of answers) answer.classList.add('disabled')

    setTimeout(() => {
        if (Array.from(this.parentNode.children).indexOf(this) === correctAnswer) {
            this.style.backgroundImage = "url('assets/img/green_button.png')"
            question.innerHTML = '<span>' + moneyTree.getElementsByTagName('tr')[14 - level].getElementsByTagName('td')[1].innerHTML + '</span>'

            if (level < 14) {
                setTimeout(() => {
                    for (let answer of answers) answer.classList.remove('disabled')

                    if (hubDisplay !== logo) {
                        hubDisplay.style.opacity = '0'
                        hubDisplay = logo
                        hubDisplay.style.opacity = '1'
                    }

                    moneyTree.getElementsByTagName('tr')[14 - level].classList.remove('current_level')
                    this.removeAttribute('style')
                    keep = -1
                    level++
                    processing = false
                    update()
                }, 1500)
            }
        }
        else {
            answers[correctAnswer - 1].style.backgroundImage  = "url('assets/img/green_button.png')"
            answers[correctAnswer - 1].style.color = 'black'
        }
    }, 1500)
}

window.fiftyFifty = function() {
    joker5050();
    if (processing) return
    const fiftyFiftyButton = document.getElementById('fifty_fifty')
    let rand = Math.floor(Math.random() * 3) + 1;
    keep = (correctAnswer + rand) % 4

    fiftyFiftyButton.removeAttribute('onclick')
    fiftyFiftyButton.style.display = 'none'

    for (let i = 0; i < 4; i++) {
        if (i === keep || i === correctAnswer) continue
        answers[i].innerHTML = ''
        answers[i].classList.add('disabled')
        answers[i].removeEventListener('click', check)
        percentages[i] = 0
    }
}

window.callFriend = function() {
    phoneJoker();
    if (processing) return
    calcTendencies()
    const hint = document.getElementById('friends_opinion')
    const callFriendButton = document.getElementById('call_friend')
    const tendency = Math.max(...percentages)
    const letter = String.fromCharCode(65 + percentages.indexOf(tendency))

    hubDisplay.style.opacity = '0'
    callFriendButton.removeAttribute('onclick')
    callFriendButton.style.display = 'none'
    hint.innerHTML = '„' + quotes[Math.floor((tendency - 21) * .1)].replace('%', letter) + '“'
    hubDisplay = hint
    hint.style.opacity = '1'
}

window.askAudience = function(){
    audienceJoker();
    if (processing) return
    calcTendencies()
    const hints = document.getElementById('audience_opinion')
    const hint = hints.getElementsByTagName('div')
    const askAudienceButton = document.getElementById('ask_audience')

    hubDisplay.style.opacity = '0'
    askAudienceButton.removeAttribute('onclick')
    askAudienceButton.style.display = 'none'

    for (let i = 0; i < hint.length; i++) {
        hint[i].style.height = percentages[i] + '%'
        hint[i].innerHTML = '<span>' + percentages[i] + '%</span>'
    }

    hubDisplay = hints
    hints.style.opacity = '1'
}

window.calcTendencies = function() {
    console.log(correctAnswer + " " + level);
    let rightAnswer = correctAnswer
    let maxTend = Math.ceil(level < 7 ? -1.1726 * level * level + .8393 * level + 99.958 : -2.14891 * level + 63.4181)
    let minTend = maxTend - level - 4
    percentages[rightAnswer] = Math.floor(Math.random() * (maxTend - minTend + 1) + minTend)
    let remaining = 100 - percentages[rightAnswer]

    if (keep === -1) {
        for (let i = 1; i < 3; i++) {
            let res = percentages[(rightAnswer + i) % 4] = Math.floor(Math.random() * (remaining + 1))
            remaining -= res
        }
        percentages[(rightAnswer + 3) % 4] = remaining
    }
    else {
        let res = percentages[keep] = Math.floor(Math.random() * (remaining + 1))
        remaining -= res
        let split = Math.ceil(remaining * .5)
        percentages[rightAnswer] += split
        remaining -= split
        percentages[keep] += remaining
    }
}

window.submitWithValue = function(value) {
    const form = document.getElementById('form');
    // form.append(`<input type="hidden" name="answer" value="${value}" />`);
    document.getElementById('answer').value = value;
    form.submit();
    //TODO: check if Jokers were used
}

window.setCorrectAnswer = function(answer, stage){
    correctAnswer = answer;
    level = stage;
}
