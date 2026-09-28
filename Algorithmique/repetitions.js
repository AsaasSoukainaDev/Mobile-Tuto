let nb = [4, 7, 2, 7, 9, 4, 5];
console.log(`Tableau de départ : ${nb}`);
let tab1=[];
let len=0;
for (let i=0; i<nb.length; i++) {
    let compteur=0;
    for (let j=0; j<nb.length; j++) {
        if (nb[i]===nb[j]) {
            compteur++;
        }
    }
    if (compteur >= 2) {
        let existe=false;
        for (let k=0; k<len; k++) {
            if (tab1[k] === nb[i]) {
                existe = true;
                break;
            }
        }
        if (existe===false) {
            tab1[len]=nb[i];
            len++;
        }
    }
}
console.log(`Nouveau tableau : ${tab1}`);