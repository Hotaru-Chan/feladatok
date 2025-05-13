// 13-14. Dobozok, JS az alapoktól, Kódbázis

/*
1. doboz:
Kattintásra adjunk hozzá egy "blur" nevű class attribútumot, majd újabb kattintásra vegyük
le róla azt.
*/

const element1 = document.getElementById('element-one')
let blurred = false
element1.onclick = () => {
    blurred = !blurred
    console.log(blurred)
    if(blurred) {element1.classList.add('blur')}
    else {element1.classList.remove('blur')}
}

/*
2. doboz:
Ha az egérrel fölé megyünk változzon meg a háttérszíne pirosra, ha levesszük róla az egeret
változzon vissza az eredeti színére.
*/

const element2 = document.getElementById('element-two')
element2.onmouseover = () => {element2.style.backgroundColor = 'red'}
element2.onmouseout = () => {element2.style.backgroundColor = ''}

/*
3. doboz:
Dupla kattintással sorsoljon egy számot 1 és 20 között és módosítsa a kapott számmal a doboz tartalmát. 
*/

const element3 = document.getElementById('element-three')
element3.ondblclick = () => {
    element3.firstElementChild.innerHTML = (Math.round(Math.random()*20))
}

/*
4. doboz:
Kattintásra tűnjön el, majd egy 1 másodperces várakozás után ismét jelenjen meg.
*/

const element4 = document.getElementById('element-four')
element4.onclick = () => {
    element4.classList.add('hidden')
    setTimeout(() => {element4.classList.remove('hidden')}, 1000)
}

/*
5. doboz:
Kattintásra alakítsa kör alakúra az összes dobozt.
*/

const element5 = document.getElementById('element-five')
var osszes = document.querySelectorAll('.shape')
element5.onclick = () => {
    for (x of osszes){
        x.style.borderRadius = '50%'
    }
}
