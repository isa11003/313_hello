function startGif() {
	var slider = document.getElementById("slider");
	var gif = document.getElementById("gifContainer");

	if (gif.style.display == "block"){
		gif.style.display = "none";
		slider.style.display = "block";
	}
	else {
		gif.style.display = "block";
		slider.style.display = "none";
	}
}