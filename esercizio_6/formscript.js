// JavaScript source code
var nazioni = ["", "Austria", "Belgio", "Bulgaria", "Danimarca", "Estonia", "Finlandia", "Francia", "Germania", "Grecia",
    "Islanda", "Italia", "Lettonia", "Liechtenstein", "Lituania", "Lussemburgo", "Malta", "Norvegia", "Paesi Bassi", "Polonia",
    "Portogallo", "Republica Ceca", "Romania", "San Marino", "Slovacchia", "Slovenia", "Spagna", "Svezia", "Ungheria", "Svizzera"];
var paese;

function inserimento() {
    paese = nazioni;
    var casella = document.getElementById("nz2");
    var options;
    for (var i = 0; i < 29; i++) {
        options = document.createElement("option");
        options.text = paese[i];
        options.value = paese[i];
        casella.add(options);
    }
    options.selectedIndex = 0;
    //document.getElementById("nz2").innerHTML = options;
}
//var getvalue = document.getElementsByName('nazionalita')[0];
// getvalue.addEventListener('input', function () {
//document.getElementById('nazionalita').value = this.getvalue;
//window.alert("elemento:" + this.value);
//});-->


function sicuro() {
    window.alert("Sei sicuro di voler cancellare");
}