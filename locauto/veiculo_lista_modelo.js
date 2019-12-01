<script type="text/javascript">
	function populate(marca,modelo)
	{
	var marca = document.getElementById(marca);
	var modelo = document.getElementById(modelo);
	modelo.innerHTML = "";
	if(marca.value == "Audi")
	{
		var optionArray = ["|","a1sportback|A1 Sportback","a3sportback|A3 Sportback","a3sedan|A3 Sedan","rs3|RS3","a4sedan|A4 Sedan","a4limitededition|A4 Limited Edition","a5sportback|A5 Sportback","a6sedan|A6 Sedan"];
	}
	else if(marca.value == "BMW")
	{
		var optionArray = ["|","bmwserie1hatch|BMW Serie 1 Hatch","bmwserie3sedan|BMW Serie 3 Sedan","bmwserie4cabrio|BMW Serie 4 Cabrio","bmwserie5sedan|BMW Serie 5 Sedan","bmwz4|BMW Z4"];
	} 
	else if(marca.value == "Chevrolet")
	{
		var optionArray = ["|","joy|Joy","onix|Onix","joyplus|Joy Plus","cobalt|Cobalt","cruze|Cruze","spin|Spin","equinox|Equinox"];
	} 
	else if(marca.value == "Fiat")
	{
		var optionArray = ["|","fiatargo|Fiat Argo","fiatcronos|Fiat Cronos","fiatmobi|Fiat Mobi","fiatpalio|Fiat Palio","fiatuno|Fiat Uno"];
	}
	else if(marca.value == "Ford")
	{
		var optionArray = ["|","fordecosport|Ford Eco Sport","fordka|Ford Ka","fordranger|Ford Ranger","fordfocushatch|Ford Focus Hatch","fordfusion|Ford Fusion"];
	}
	else if(marca.value == "Honda")
	{
		var optionArray = ["|","hondaaccord|Honda Accord","hondacity|Honda City","hondacivic|Honda Civic","hondacrv|Honda CRV","hondafit|Honda Fit"];
	}
	else if(marca.value == "Hyundai")
	{
		var optionArray = ["|","hyundaiazera|Hyundai Azera","hyundaicreta|Hyundai Creta","hyundaielantra|Hyundai Elantra","hyundaihb20|Hyundai HB20","hyundaihb20s|Hyundai HB20S"];
	}
	else if(marca.value == "Jeep")
	{
		var optionArray = ["|","fjeepcompass|Jeep Compass","jeepgrandcherokee|Jeep Grand Cherokee","jeeprenegade|Jeep Renegade","jeepwrangler|Jeep WRangler"];
	}
	else if(marca.value == "MercedesBenz")
	{
		var optionArray = ["|","mercedesbenzclassec|Mercedes Benz Classe C","mercedesbenzclassea|Mercedes Benz Classe A","mercedesbenzclasseb|Mercedes Benz Classe B","mercedesbenzclassecls|Mercedes Benz Classe CLS"];
	}
	else if(marca.value == "Nissan")
	{
		var optionArray = ["|","nissanmarch|Nissan March","nissanversa|Nissan Versa","nissansentra|Nissan Sentra","nissanleaf|Nissan Leaf"];
	}
	else if(marca.value == "Peugeot")
	{
		var optionArray = ["|","peugeot208|Peugeot 208","peugeot2008|Peugeot 2008","peugeot3008|Peugeot 3008","peugeot5008|Peugeot 5008"];
	}
	else if(marca.value == "Renault")
	{
		var optionArray = ["|","renaultduster|Renault Duster","renaultsandero|Renault Sandero","renaultkwid|Renault Kwid","renaultlogan|Renault Logan","renaultcaptur|Renault Captur"];
	}
	else if(marca.value == "Volkswagen")
	{
		var optionArray = ["|","gol|Gol","fox|Fox","novopolo|Novo Polo","golf|Golf","voyage|Voyage"];
	}
			
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		modelo.options.add(newOption);
	}
}
</script>