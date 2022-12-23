// Animation sur le texte
var text = document.querySelector("header div h2");
var content = text.innerHTML;
text.innerHTML = "";
text.style.letterSpacing = "8px";
var i = 0, taille = content.length;
function AnimeText() {
    if(i<taille) {
        text.innerHTML += `${content[i]}`;  
        i+=1;
    }
    else {
        if(taille > 0) {       
            taille -=1;
            text.innerHTML = content.substring(0,taille);
        }
        else {
            i = 0;
            taille = content.length;
        }
    }
}
setInterval(AnimeText, 600);

//Animation sur le background
var containerImg = document.querySelector('.containerImg');
var images = Array.from(containerImg.children);
var numerotation = document.querySelector('.numerotation p');
var mots = ["Les cours sont commes ces vagues","La nature par sa tranquilité apaise","La mer","Les montagnes : Quoi de plus beau ! ","L'eau calme réjouit"];
var j = 0,k;
var right = document.querySelector(".right")
var left = document.querySelector(".left")
function EnleverActive() {
    for(k = 0; k<images.length ; k++) {
        images[k].classList.remove('active');
    }
}
function Avancer() {
    EnleverActive();
    if ( j < images.length -1 ) {
        j++;
    }
    else {
        j = 0;
    }
    numerotation.innerHTML = mots[j];
    images[j].classList.add('active');
}
function Reculer() {
    EnleverActive();
    if ( j > 0 ) {
        j--;
    }
    else {
        j = images.length - 1;
    }
    numerotation.innerHTML = mots[j];
    images[j].classList.add('active');         
}
left.addEventListener('click', Reculer);
right.addEventListener('click', Avancer);
setInterval(Avancer,3000);

// Animation sur l'affichage 
var balanceur = document.querySelector('.balanceurAffichage p');
var contentBalanceur = ["Cacher le block","Afficher le block"];
var AccueilSection = document.querySelector('.AccueilSection');
var footer = document.querySelector('footer');
var cpt = 1; 
function AfficheCache() {
    if(balanceur.innerHTML == contentBalanceur[1]) {
        AccueilSection.style.display = "block";
        footer.style.display = "block";
        cpt--;
        console.log(cpt);
        balanceur.innerHTML = contentBalanceur[cpt];
    }
    else {
        AccueilSection.style.display = "none";
        footer.style.display = "none";
        cpt = 1;
        balanceur.innerHTML = contentBalanceur[cpt];
    }
}
//balanceur.addEventListener('click', AfficheCache);

