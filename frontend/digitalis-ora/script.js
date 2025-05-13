setInterval(showTime, 1000);

function showTime() {
    
    let pontosIdo = new Date();

    //idő
    let ora = pontosIdo.getHours();
    let perc = pontosIdo.getMinutes();
    let msperc = pontosIdo.getSeconds();

    //dátum
    let ev = pontosIdo.getFullYear();
    let honap = pontosIdo.getMonth()+1;
    let nap = pontosIdo.getDate();

    //délelőtt (DE) vagy délután (DU)
    let napszak = "DE";

    
    if (ora >= 12) {
        if (ora > 12) ora -= 12;
        napszak = "DU";
    } else if (ora == 0) {
        ora = 12;
        napszak = "DE";
    }

    //ha az idő vagy a dátum valamelyik eleme nem 2 számjegyű éle rak egy 0-t
    ora = ora < 10 ? "0" + ora : ora;
    perc = perc < 10 ? "0" + perc : perc;
    msperc = msperc < 10 ? "0" + msperc : msperc;
    honap = honap < 10 ? "0" + honap : honap;
    nap = nap < 10 ? "0" + nap : nap;

    //idő formátumának megszerkesztése
    let Ido = ora + ":" + perc + ":" + msperc + " " + napszak;
    document.getElementById("ido").innerHTML = Ido;

    //dátum formátumának megszerkesztése
    let Datum = ev + "." + honap + "." + nap + ".";
    document.getElementById("datum").innerHTML = Datum;
}

showTime();