document.getElementById('atlagForm').addEventListener('submit', function(event){

    event.preventDefault()

    //adatok átvétele a Form-ból
    adatok = new FormData(this) //adatok változóba 'tantargy' kulcson (name paraméter), kaptuk meg a tantárgy nevét

    fetch('./API/tanulok.php', {
        method: 'POST',
        body: adatok
    })
    .then(valasz => {
        if (!valasz.ok) {//HIBA van
            return valasz.json().then(hiba => {
                throw new Error(hiba.error || "Egyéb hiba lépett fel")
            })
        }
        //nincs HIBA
        return valasz.json()
    })
    .then(adatok => {
        console.log(adatok);
        str = `${adatok.tantargy_neve} tantárgyból az átlag: ${adatok.atlag}`
        alert(str)
    })
    .catch(hiba => alert(hiba.message))


})