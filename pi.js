
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
    if (note>x[nb])
    {
        lfa.innerHTML='Vous avez eu '+y[nb]+'.';
        cpt+=1;
        break;
    }
  }
  if (cpt==0)
  {
  lfa.innerHTML='Vous avez eu 1 .';

}
}