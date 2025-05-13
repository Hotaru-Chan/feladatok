function kartyak(kartya) {
    fetch('https://jsonplaceholder.typicode.com/users')
    .then(x => x.json())  
    .then(kartya => {
        console.log(kartya);
        hely = document.getElementById("main");
        hely.innerHTML = "";

        kartya.forEach(adat => {
            let elem = document.createElement("ul");

            elem.innerHTML= `
              <li class="item" class="nev"><b>${adat.name}</b></li>
              <li class="item"><b>Felhasználónév:</b>  ${adat.username}</li>
              <li class="item"><b>E-mail:</b> ${adat.email}</li>
              <li class="item"><b>Telefonszám:</b> ${adat.phone}</li>
              <li class="item"><b>Cím:</b>  ${adat.address[0]+" "+adat.address[1]+" "+adat.address[0]}</li>
            `;
            console.log(elem)
            hely.appendChild(elem)
        });
    }
    )
}

kartyak();