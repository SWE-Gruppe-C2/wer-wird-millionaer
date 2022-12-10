const moneyTreeButton = document.getElementById('toggle_money_tree')
const moneyTree = document.getElementById('money_tree')
const logo = document.getElementById('logo')
const question = document.getElementById('question')
const answers = document.getElementsByClassName('answer')
let hubDisplay = logo
let percentages = new Array(4)
let keep = -1
let level = 0
let processing = false
let questions = [
    [ 'Wer kann vielleicht schwimmen, aber nicht fliegen?', 'Stockenten', 'Pfeifenten', 'Krickenten', 'Studenten', 4 ],
    [ 'Beschäftigt der fünfmalige Tour-de-France-Sieger Hinault entsprechende Hausangestellte, dann arbeiten bei ... ?', 'Focks Tärrier', 'Dallma Tiener', 'Re Pinnscher', 'Bernard Diener', 4 ],
    [ 'Lässt man sich auf eine Beziehung mit einer Schönheitskönigin ein, hat man sozusagen ...?', 'ein Ungleich-Gewicht', 'ein Über-Maß', 'ein Miss-Verhältnis', 'eine Schief-Lage', 3 ],
    [ 'Gesundheitsbewusste Strandurlauber sind auch beim ... ?', 'Nünftig vernünftig', 'Sonnen besonnen', 'Sichtig umsichtig', 'Sam achtsam', 2 ],
    [ 'Wer einen Kellner sucht, findet ihn buchstäblich im ... ?', 'September', 'Oktober', 'November', 'Dezember', 2 ],
    [ 'In welcher Sendung kamen unter anderem Jeanette Biedermann, Mark Forster und Lena Meyer-Landrut ins Tauschgeschäft?', 'Sing meinen Song', 'Koch mein Leibgericht', 'Verführ meine Frau', 'Bewohn mein Haus', 1 ],
    [ 'Was so mancher selbst im nüchternen Zustand nicht hinbekommt: Korrekt schreibt sich der beliebte Cocktail ... ?', 'Caipirnja', 'Cajpirinha', 'Caipirinha', 'Cajpiriña', 3 ],
    [ 'Wobei wird vor einem sogenannten Rebound-Effekt gewarnt, der nicht selten zu einer Abhängigkeit führt?', 'Haarspray', 'Nasenspray', 'Deospray', 'Pfefferspray', 2 ],
    [ 'Die Darstellung welcher Figur wurde schon zweimal mit einem Schauspiel-Oscar prämiert?', 'Dr. Hannibal Lecter', 'Forrest Gump', 'Joker', 'Truman Capote', 3 ],
    [ 'Alfred Gislason ist seit Februar 2020 bereits der zweite Isländer im Amt des deutschen Männer-Nationaltrainers im ... ?', 'Basketball', 'Volleyball', 'Handball', 'Tennis', 3 ],
    [ 'Wo befinden sich einige der höchsten Alpengipfel?', 'Monte-Rosa-Massiv', 'Monte-Purpur-Höhenzug', 'Monte-Lila-Gebirge', 'Monte-Magenta-Kette', 1 ],
    [ 'Wo wurde der Schriftsteller geboren, der für den Roman “Herkunft” 2019 mit dem Deutschen Buchpreis ausgezeichnet wurde?', 'Rhodesien', 'Jugoslawien', 'Ceylon', 'Tibet', 2 ],
    [ 'Was war hierzulande bis in die 1950er noch gang und gäbe?', 'Beamtinnenkommunion', 'Krankenschwesternkollekte', 'Lehrerinnenzölibat', 'Sekretärinnenbeichte', 3 ],
    [ 'Das naturgegebene Schicksal welcher Pflanze sieht vor, dass die Blüte bei den meisten Arten unweigerlich zum Tod führt?', 'Bambus', 'Ginkgo', 'Rhododendron', 'Eukalyptus', 1 ],
    [ 'Die klassische, genormte Europalette EPAL 1 besteht aus 78 Nägeln, neun Klötzen und insgesamt wie vielen Brettern?', 'neun', 'zehn', 'elf', 'zwölf', 3 ]
]
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

window.onload = () => { update() }

function update() {
    question.innerHTML = '<span>' + questions[level][0] + '</span>'

    for (let i = 0; i < answers.length; i++) {
        answers[i].innerHTML = '<span>' + questions[level][i + 1] + '</span>'
        answers[i].addEventListener('click', check)
    }

    moneyTree.getElementsByTagName('tr')[14 - level].classList.add('current_level')
}

function openMoneyTree() {
    moneyTreeButton.setAttribute('onclick', 'closeMoneyTree()')
    moneyTreeButton.src = 'img/close.png'
    moneyTreeButton.alt = 'Schließen'
    moneyTree.style.bottom = '0'
}

function closeMoneyTree() {
    moneyTreeButton.setAttribute('onclick', 'openMoneyTree()')
    moneyTreeButton.src = 'img/list.png'
    moneyTreeButton.alt = 'Spielfortschritt'
    moneyTree.style.bottom = "-100%"
}

function check() {
    if (processing) return
    processing = true
    this.style.backgroundImage = "url('img/orange_button.png')"
    this.style.color = 'black'

    for (let answer of answers) answer.classList.add('disabled')

    setTimeout(() => {
        if (Array.from(this.parentNode.children).indexOf(this) === questions[level][5]) {
            this.style.backgroundImage = "url('img/green_button.png')"
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
            answers[questions[level][5] - 1].style.backgroundImage  = "url('img/green_button.png')"
            answers[questions[level][5] - 1].style.color = 'black'
        }
    }, 1500)
}

function fiftyFifty() {
    if (processing) return
    const fiftyFiftyButton = document.getElementById('fifty_fifty')
    keep = (questions[level][5] + Math.floor(Math.random() * 3)) % 4

    fiftyFiftyButton.removeAttribute('onclick')
    fiftyFiftyButton.style.display = 'none'

    for (let i = 0; i < 4; i++) {
        if (i === keep || i === questions[level][5] - 1) continue
        answers[i].innerHTML = ''
        answers[i].classList.add('disabled')
        answers[i].removeEventListener('click', check)
        percentages[i] = 0
    }
}

function callFriend() {
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

function askAudience() {
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

function calcTendencies() {
    let rightAnswer = questions[level][5] - 1
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
