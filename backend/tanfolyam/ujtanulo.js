document.getElementById('felveszform').addEventListener('submit', function(event){
    event.preventDefault();
    //adatok átvétele a formból
    adatok = new FormData(this)
    fetch('./API/ujtanulok.php', {
        method: 'POST',
        body: adatok
    })
    .then(valasz => {
        if (!valasz.ok) {
            return valasz.json().then(hiba =>{
                throw new Error(hiba.error || "egyéb hiba lépett fel!")
            })
        }
        //nincs hiba
        return valasz.json()
    })
    .then(adatok =>{
        console.log(adatok)
        alert(`${adatok.tanulo.nev} tanulót felvettük az adatbázisba`)
    })
    .catch(hiba => alert(hiba.message))
    //.finally(window.location.href = 'tanulok.html')
})