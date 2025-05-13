// Belső állapot
let state = {
  circle: 0,
  square: 0,
  rectangle: 0,
};

// 1. Selectáld ki id alapján a form elementet és submit eseményre köss be funkcionalitást
let forma = document.getElementById('shapes')

forma.onsubmit = (event) => {
  event.preventDefault()

  // 2. Az esemény bekövetkezésekor olvasd ki az input mezőkben lévő adatokat
  let valasztottForma = event.target.elements.selectedShape.value
  let muvelet = event.target.elements.action.value
  console.log(valasztottForma)
  console.log(muvelet)

  // 3. Az adatok alapján módosítsd az alkalmazás belső állapotát
  if (muvelet == "increment"){state[valasztottForma]++}
  else {state[valasztottForma]--}

  ertek()
}

// 4. A belső állapot alapján rajzold újra a formákat
function ertek() {
  document.getElementById("sh-circle").innerHTML = state.circle
  document.getElementById("sh-square").innerHTML = state.square
  document.getElementById("sh-rectangle").innerHTML = state.rectangle
}