document.getElementById('atlagForm').addEventListener('submit', function(event){
event.preventDefault()
    adatok = new FormData(this)
    fetch("./API/atlag.php", {
        method : 'POST', body: adatok
    }).then(valasz => {
        if (!valasz.ok) {
            return valasz.json().then(hiba => {
                throw new Error(hiba.error)
            })
        }
        return valasz.json()
    }).then(adat => {
        console.log(adat)
        str = `${adat.tantargy_neve} tantárgyból az átlag ${adat.atlag} `
        alert(str)
    })
    .catch(hiba => alert(hiba.message))
})