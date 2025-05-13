// 15. Dobozok, JS az alapoktól, Kódbázis

/*
6. doboz:
Form submit eseményre módosítsuk a doboz tartalmát az input mezőbe írt értékkel
*/

const element6 = document.getElementById('element-six')
let box6 = document.getElementById('box-6')
box6.onsubmit = (event) => {
  event.preventDefault()
  element6.firstElementChild.innerHTML = box6.boxNumber.value

}
  // event.preventDefault() 
 
/*
7. doboz:
Keypress eseményre írjuk be a dobozba az adott karaktert, amit leütöttek
*/
const element7 = document.getElementById('element-seven')
let input7 = document.getElementById('box7-input')

input7.onkeypress = (event) => {
  element7.firstElementChild.innerHTML = event.key
}

/*
8. doboz:
Egérmozdítás eseményre írjuk be az egér pozíciójának x és y koordinátáját, 
a következő séma szerint: "X: {x-koordináta}, Y: {y-koordináta}"
*/

const element8 = document.getElementById('element-eight')
document.onmouseover = (event) => {
  let koordinatak = 'X: ' + event.clientX + ' Y: ' + event.clientY
  element8.firstElementChild.innerHTML = koordinatak

}

/*
9. doboz:
Submit eseményre módosítsuk a doboz tartalmát azzal az értékkel ami úgy áll elő, 
hogy végrehajtjuk a select inputban kiválasztott operációt,
a state-en és number inputba beírt értéken.

Az előállt végeredményt tároljuk el új state-ként!
*/

let state = 9;
const element9 = document.getElementById('element-nine')
let box9 = document.getElementById("box-9")

box9.onsubmit = (event) => {
  event.preventDefault();
  let operand = Number(box9.operand.value)
  let operator = box9.operator.value

  switch (operator) {
    case "mult":
      state = state * operand;
    break;
    case "div":
      state = state / operand;
    break;
    case "add":
      state = state + operand;
    break;
    case "sub":
      state = state - operand;
    break;
  }
  element9.firstElementChild.innerHTML = state;
};
