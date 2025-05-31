fetch('./API/jegyek.php')
.then(valasz => {
    if(!valasz.ok){
        throw new Error('Hiba lépett fel!')
    }
    //nincs hiba
    return valasz.json()
})
.then(ertekelesek => {
    console.log(ertekelesek)
    hely = document.getElementById('tanulok')
    ertekelesek.forEach(ertekeles => {
        sor = document.createElement('tr')
        sor.innerHTML = `
            <td>${ertekeles.nev}</td>
            <td>${ertekeles.tantargy}</td>
            <td>${ertekeles.erdemjegy}</td>
        `
        hely.appendChild(sor)
    })
})
.catch(hiba => alert(hiba.message))