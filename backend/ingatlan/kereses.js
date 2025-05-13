function kategoriak_adatai(){
    fetch('./API/kategoriak.php')
        .then(adat => adat.json())
        .then(kategoriak => {
            //console.log(kategoriak);
            hely = document.getElementById("kategoriak")
            kategoriak.forEach(kategoria => {
                opcio = document.createElement('option')
                opcio.value = kategoria.id
                opcio.textContent = kategoria.nev
                hely.appendChild(opcio)
            })
        })
}

kategoriak_adatai();

document.getElementById("keresForm").addEventListener("submit", function (event) {
    event.preventDefault();
    adatok = new FormData(this)
    fetch("./API/kereses.php", {method: "POST", body: adatok})
    .then(valasz => valasz.json())
    .then(ingatlanok => {
        console.log(ingatlanok)
    })
})