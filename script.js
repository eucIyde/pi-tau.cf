

const fermerMenu = () => {
  // Récupérer le menu
  const input = document.getElementById('menu-cb')
  input.checked = false

  const fenetreNode = document.getElementById('menu-cote')
  fenetreNode.remove()
}

const changerEtatMenu = () => {
  // Récupérer le menu
  const input = document.getElementById('menu-cb')
  const actif = input.checked

  if (actif) {
    const fenetreNode = document.createElement('div')
    fenetreNode.id = 'menu-cote'
    fenetreNode.className = 'menu-cote'
    fenetreNode.addEventListener('click', fermerMenu)
    document.body.appendChild(fenetreNode)
  } else {
    const fenetreNode = document.getElementById('menu-cote')
    fenetreNode.remove()
  }
}

const input = document.getElementById('menu-cb')
input.addEventListener('click', changerEtatMenu)

// Ajout ultérieur :
// Lorsque le menu a été déroulé et l'utilisateur rafraichit
// la page, exécuter la procédure d'ouverture pour permettre à
// l'utilisateur de clôre le menu en cliquant sur l'écran
if (input.checked) {
  changerEtatMenu()
}



let x=[];
x.push(97,94,90,86,82,78,74,70,65,61,57,53,49,45,41,38,35,31,28,35,30,16,12,8,4,1);
let y=[];
y.push('10','10-','9+','9','8+','8','8-','7+','7','7-','6+','6','5+','5','5-','4+','4','4-','3+','3','3-','2+','2','2-','1');
let cpt=0;
let lfa=document.getElementById('lfatext');

function myfonction(){
    var input = document.getElementById("in").value;
    const words = input.split('/');
    var note=words[0]/words[1]*100;
for (let nb=0;nb<27;nb++)
  {
    if (note>=x[nb])
    {
        lfa.innerHTML='‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Vous avez eu '+y[nb]+'.';
        cpt+=1;
        break;
    }
  }
  if (cpt==0)
  {
  lfa.innerHTML='‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Vous avez eu 1 .';

}
}