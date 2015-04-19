var x = document.getElementById('randomMusic');

//Music piece 1 - Cello Suite Thingy
var music1 = "https://embed.spotify.com/?uri=spotify%3Atrack%3A69YGQcPqbb7uwqNHKZcbiE";
//Music piece 2 - Four Seasons
var music2 = "https://embed.spotify.com/?uri=spotify%3Atrack%3A7t6k53HNAfWbzn94V83Tcb";
//Music piece 3 - Ave Maria
var music3 = "https://embed.spotify.com/?uri=spotify%3Atrack%3A2kfeWxnFx8aur6rCMiEt8P";
//Music piece 4 - Glenn Gould
var music4 = "https://embed.spotify.com/?uri=spotify%3Atrack%3A5GkvPnH2sZRda9YSk92dcO";
//Music piece 5 - Ode to Joy
var music5 = "https://embed.spotify.com/?uri=spotify%3Atrack%3A4YEmmjo2pHGrNdBJUMTvQp";

function pickNumber(){
	var number = Math.floor(Math.random()*10);

	if(number < 2){
		x.src = music1;
	} else if(number < 4){
		x.src = music2;
	} else if(number < 6){
		x.src = music3;
	} else if(number < 8){
		x.src = music4;
	} else {
		x.src = music5;
	}
}
