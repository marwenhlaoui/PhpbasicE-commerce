function optionniveau(val){ 
	var tr_pri = document.getElementById('tr_pri');
	var tr_col = document.getElementById('tr_col');
	var tr_lyc = document.getElementById('tr_lyc');
	if (val == "lycé") { 
		tr_lyc.style.display = "block";
		tr_col.style.display = "none";
		tr_pri.style.display = "none";
	};
	if (val == "colège") { 
		tr_col.style.display = "block";
		tr_lyc.style.display = "none"; 
		tr_pri.style.display = "none";
	};
	if (val == "Primaire") { 
		tr_pri.style.display = "block";
		tr_lyc.style.display = "none";
		tr_col.style.display = "none"; 
	};
}