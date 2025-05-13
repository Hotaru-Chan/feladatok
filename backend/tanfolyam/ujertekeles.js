document.getElementById('ertekelForm').addEventListener('submit', function(event){

    //alapfunkció törlése
    event.preventDefault()

    //kinyerni az adatokat a Form-ból
    adatok = new FormData(this) //az adatok változóban létrejön három kulcs: 'tantargy', 'tanuloId', 'jegy' a megfelelő value értékekkel

    fetch('./API/ujertekeles.php', {
        method: 'POST',
        body: adatok
    })
    .then(valasz => {
        if (!valasz.ok) {//HIBA
            return valasz.json().then(hiba => {
                throw new Error(hiba.error || "Egyéb hiba lépett fel!")
            })
        }
        //nincs hiba
        return valasz.json()
    })
    .then(adat => {
        console.log(adat);
        str = `${adat.tanulo.nev} tanuló ${adat.tanulo.tantargy} tantárgyból, kapott érdemjegye: ${adat.tanulo.jegy}, rögzítve`
        alert(str)
    })
    .catch(hiba => alert(hiba.message))
}) 