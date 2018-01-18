function startGif() {
	var slider = document.getElementById("slider");
	var gif = document.getElementById("gifContainer");

	if (gif.style.display == "none"){
		gif.style.display = "block";
		slider.style.display = "none";
	}
	else {
		gif.style.display = "none";
		slider.style.display = "block";
	}
}