fetch('./api/tanulok.php')
.then(valasz => {
    if (!valasz.ok) {
        throw new Error("Hiba lépett fel")
    }
    return valasz.json()
})
.then(tanulok => {
    console.log(tanulok)
    hely = document.getElementById('tanulok')
    tanulok.forEach(tanulo => {
        sor = document.createElement('tr')
        sor.innerHTML = `
        <td>${tanulo.id}</td>
        <td>${tanulo.nev}</td>
        <td>${tanulo.telefonszam}</td>
        <td>${tanulo.szuletesiido}</td>
        <td>${tanulo.email}</td>
        `;
        hely.appendChild(sor)
    })
})
.catch(hiba => alert(hiba.message))