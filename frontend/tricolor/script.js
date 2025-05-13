const kitolt = document.querySelector('button[type="submit"]')  //kitöltés gomb
const elsoSav = document.getElementById ("egy")      //zászló felső/bal sávja, ami az "egy" id-t kapta
const masodikSav = document.getElementById ("ketto")  //zászló középső sávja, ami a "ketto" id-t kapta
const harmadikSav = document.getElementById ("harom")  //zászló alsó/jobb sávja, ami a "harom" id-t kapta
const csikos = document.getElementById("csikos")   //radio gombok a sávok elrendezéséhez
const savos = document.getElementById("savos")   //az id alapján vannak beolvasva, később ez dönti el, melyik legyen bejelölve
let zaszlo = document.getElementById("flag")   //zászló

//kitöltés
kitolt.addEventListener('click', function (event) {  //a kitöltés gomb megnyomására kiszínezi a kiválasztott sávot
    console.log("kitöltés")  //kiírja a consolra, ha sikeresen végre tudta hajtani a függvényt
    event.preventDefault()  //ne álljon vissza az eredeti színére, hogy változtatásig megmaradjanak a színek
    var kijelolt = document.querySelector("select").options[document.querySelector("select").selectedIndex]  //megnézi melyik sávot választottuk színezésre
    if(kijelolt.id == "elso"){ //ha a kiválasztott sáv az "elso" id-jű, felső/bal sáv
        elsoSav.style.backgroundColor = szin.value  //első sáv háttérszínének változtatása
    }
    else if(kijelolt.id == "masodik"){  //ha a kiválasztott sáv az "masodik" id-jű, középső sáv
        masodikSav.style.backgroundColor = szin.value  //második sáv háttérszínének változtatása
    }
    else{  //más esetben a megmaradt, alsó/jobb sáv
        harmadikSav.style.backgroundColor = szin.value   //harmadik sáv háttérszínének változtatása
    }

//sávok vízszintes és függőleges elrendezése a zászlóra kattintva    
})
let elrendezes = 1
zaszlo.onclick = () => {     //a zászlóra kattintva megváltoztatja az elrendezését
    if(elrendezes == 1) {
        zaszlo.classList.add("vertical")  //hozzáadja a vertical osztályt, ami függőlegesre állítja a sávok lerendezését
        elrendezes=0
        savos.checked = true    //csak a sávos radio gomb lehet bejelölve
        csikos.checked = false
    }
    else {
        zaszlo.classList.remove("vertical")  //elveszi a vertical osztályt, ami visszaállítja a sávokat vízszintesre
        elrendezes=1
        savos.checked = false
        csikos.checked = true   //csak a csíkos radio gom lehet bejelölve
    }
}

//sávok elrendezése a radio gombokkal
savos.onclick = () => {   //a sávos radio gombra kattintva hozzáadja a vertical osztályt és átrendezi a sávokat függőlegesre
    zaszlo.classList.add("vertical")
    elrendezes=0
    savos.checked = true  //csak a sávos radio gomb lehet bejelölve
    csikos.checked = false
}

csikos.onclick = () => {  //a csíkos radio gomra kattintva elveszi a vertical osztályt és visszaállítja a sávokat vízszintesre
    zaszlo.classList.remove("vertical")
    elrendezes=1
    savos.checked = false
    csikos.checked = true  //csak a csíkos radio gom lehet bejelölve
}