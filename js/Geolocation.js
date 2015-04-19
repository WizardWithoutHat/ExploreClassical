//Kode hivet fra w3schools.com d. 19/04/2015

//"demo" refererede i deres originale kode til en tom paragraph som de kunne printe resultatetet til.
var x = document.getElementById("demo");

//getLocation bruger HTML5s navigator til at finde geolocationen af brugeren. Dette gives i en "position" objekt
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

//positions objektet består af Latitude og longitude, som her printes til den paragraph nævnt tidligere.
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude; 
}