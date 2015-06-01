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

var R = 6371000; // metres
var φ1 = lat1.toRadians();
var φ2 = lat2.toRadians();
var Δφ = (lat2-lat1).toRadians();
var Δλ = (lon2-lon1).toRadians();

var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
        Math.cos(φ1) * Math.cos(φ2) *
        Math.sin(Δλ/2) * Math.sin(Δλ/2);
var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

var d = R * c;