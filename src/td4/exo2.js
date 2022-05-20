
// étant donnée la moyenne 'm'
// retourne l'appréciation correspondante
// (une chaîne de caractères)
function appreciation( m ) {
    if (m < 6) {
        return "très insuffisant";
    } else if (m >= 6 && m < 10) {
        return "insuffisant";
    } else if (m >= 10 && m < 13) {
        return "moyen";
    } else if (m >= 13 && m < 16) {
        return "bien";
    } else if (m >= 16 && m < 19) {
        return "très bien";
    } else {
        return "excellent";
    }
}

// calcule la moyenne à partir des trois notes
// et affiche la mmoyenne et l'appréciation correspondante
function calculer() {
    let note1 = parseFloat(document.getElementById("note1").value);
    let note2 = parseFloat(document.getElementById("note2").value);
    let note3 = parseFloat(document.getElementById("note3").value);

    if (isNaN(note1) || isNaN(note2) || isNaN(note3) ) {
        alert('You can only input numbers.');
    } else {
        let moyenne = (note1 + note2 + note3) / 3;
        let appreciationMark = appreciation(moyenne);

        document.getElementById("moyenne").innerHTML = moyenne.toFixed(2);
        document.getElementById("appreciation").innerHTML = appreciationMark;
        document.getElementById("resultat").style.visibility = "visible";
    }


}
