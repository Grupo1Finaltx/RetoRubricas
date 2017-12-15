	window.addEventListener("resize",function(){
		if (innerWidth>599) {
			document.getElementById("div_derecha").style.display="inline-flex";

		}
		else{
			document.getElementById("div_derecha").style.display="none";
			menu=false;
		}
});



var menu=false;
document.getElementById("boton_menu").addEventListener("click", function(){
	menu=!menu;
	if (menu) {
		document.getElementById("div_derecha").style.display="block";
	}
	else{
		document.getElementById("div_derecha").style.display="none";		
	}

});
