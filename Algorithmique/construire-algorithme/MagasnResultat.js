const Produits = [
    ["A",30,1200],
    ["B",20,2500],
    ["C",15,1800],
    ["D",40,3000],
    ["E",10,900],
    ["F",25,2000]
]
//TRIER PAR VUE

let budget=100

function TrierParVue(tab){
    
    let max=[tab[0][2]]
    let temp
    for (let i=1;i<tab.length;i++){
        for (let j=0;j<tab.length-1;j++){
            if(tab[j][2]<tab[j+1][2]){
                temp=tab[j]
                tab[j]=tab[j+1]
                tab[j+1]=temp
            } 
        }
    }
    return tab 
}

let produitsTriesViews=TrierParVue(Produits)
console.log(produitsTriesViews)

// FILTER 
function filterLesVue(tab){
    let tabfilter=[]
    for (let i=0;i<tab.length;i++){
        if (tab[i][2]>1500){
            for(let k=0;k<tab.length;k++){
                tabfilter[i]=tab[i]
            }
        }
    }

    return tabfilter
}

let produitsPopulaires=filterLesVue(produitsTriesViews)
console.log(produitsPopulaires)

// TRIER PAR PRIX
function TrierParPrix(tab){
    
    let max=[tab[0][2]]
    let temp
    for (let i=1;i<tab.length;i++){
        for (let j=0;j<tab.length-1;j++){
            if(tab[j][1]<tab[j+1][1]){
                temp=tab[j]
                tab[j]=tab[j+1]
                tab[j+1]=temp
            } 
        }
    }
    return tab 
}

let produitsTriesPrix=TrierParPrix(produitsPopulaires)
console.log(produitsTriesPrix)

//PRODUIT A ACHETER
function ProduitAcheter(tab){
    let achats=[]
    for (let i=0;i<tab.length;i++){
        if (budget-tab[i][1]<0){
            continue
        }
        achats[i]=tab[i]
        budget-=tab[i][1]
    }

    return achats
}

let produitsAchetes=ProduitAcheter(produitsTriesPrix)
console.log(produitsAchetes)