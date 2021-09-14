let mudança = document.getElementById("result");

function liga() {
    mudança.innerText = "Luz acesa";
    document.getElementById("luz1").src = "https://i.postimg.cc/zBtXzRZR/Lon.png";

    setInterval(sendToServer(5), 3000);
}

function desliga() {
    mudança.innerText = "Luz apagada";
    document.getElementById("luz1").src = "https://i.postimg.cc/v80VH51q/Loff.png";
    setInterval(sendToServer(2), 3000);
}

function sendToServer(state) {
    const http = new XMLHttpRequest();
    http.open("GET", "https://api.thingspeak.com/update?api_key=N6EMH81AMFX2G5E3&field1=0" + state);
    http.send();
    http.onload = console.log(http.responseText + " " + state);
}