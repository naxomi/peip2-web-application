// calcule le prix TTC à partir du prix hors-taxe
// et de la TVA
// affiche une alerte avec un message d'erreur si les
// valeurs fournies ne sont pas des nombres
function prixTTC() {
    let priceHT = parseFloat(document.getElementById("pht").value);
    let TVA = parseFloat(document.getElementById("tva").value) / 100;

    if (isNaN(priceHT) || isNaN(TVA)) {
        alert('You can only input numbers.');
    } else {
        let priceTTC = priceHT * (TVA + 1);
        document.getElementById("pttc").innerHTML = priceTTC.toFixed(2);
        document.getElementById("resultat").style.visibility = "visible";
    }
}
