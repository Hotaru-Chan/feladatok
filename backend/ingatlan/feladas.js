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
kategoriak_adatai()

mai_datum = new Date().toISOString().split('T')[0]
document.getElementById('hirdetesDatuma').value = mai_datum

document.getElementById('feladForm').addEventListener('submit', function(event){
    event.preventDefault(); //törli az alapeseménykezelőt a submit eseményre

    adatok = new FormData(this)
    fetch('./API/ingatlanok.php',{
        method: 'POST',
        body: adatok
    }
    )
    .then(valasz => valasz.json())
    .then(uzenet => alert(`Az ingatlan ${uzenet.id} azonosítón került az adatbázisba`))

})