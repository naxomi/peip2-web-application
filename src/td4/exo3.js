let x; // le premier nombre de la multiplication
let y; // le deuxième nombre de la multiplication

// donne le rôle du bouton :
// si 'verifier' est 'true' alors le prochain clic sur le bouton
// est destiné à vérifier la réponse de l'utilisateur, sinon,
// le clic est destiné à proposer une nouvelle multiplication
let verifier = true;

// génère une nouvelle multiplication, autrement dit :
// - génère deux entiers au hasard dans l'intervalle [1,9]
// - les affiche dans les bons éléments HTML
function nouvelle() {
    x = Math.floor((Math.random() * 9) + 1);
    y = Math.floor((Math.random() * 9) + 1);
    document.getElementById("nombre1").innerHTML = x.toString();
    document.getElementById("nombre2").innerHTML = y.toString();
}

// cette fonction est appelée quand l'utilisateur clique
// sur le bouton. La fonction a deux rôles alternatifs :
// - vérifier que la proposition de l'utilisateur est correcte
// - générer une nouvelle multiplication
// Cette alternance est gérée à l'aide de la variable 'verifier'
function valider() {
    if (verifier) {
        let answer = parseFloat(document.getElementById("proposition").value);
        if (isNaN(answer)) {
            alert("You must input a number");
        } else {
            if (x * y === answer) {
                document.getElementById("resultat").innerHTML = "Bonne réponse";
            } else {
                document.getElementById("resultat").innerHTML = "Mauvaise réponse";
            }
            document.getElementById("bouton").value = "continuer";
            document.getElementById("resultat").style.visibility = "visible";
        }
    } else {
        document.getElementById("resultat").style.visibility = "hidden";
        document.getElementById("bouton").value = "verifier";
        document.getElementById("proposition").value = "";
        nouvelle();
    }
    verifier = !verifier;
}


