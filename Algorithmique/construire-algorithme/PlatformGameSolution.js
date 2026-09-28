const Videos = [
    ["A",5,1200],
    ["B",2,3500],
    ["C",3,1800],
    ["D",1,3000],
    ["E",7,900],
    ["F",4,2000]
]
//TRIER PAR VUE

let Duree=10

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

let VideosTriesViews=TrierParVue(Videos)
console.log(VideosTriesViews)

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

let VideosPopulaires=filterLesVue(VideosTriesViews)
console.log(VideosPopulaires)

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

let VideosTriesPrix=TrierParPrix(VideosPopulaires)
console.log(VideosTriesPrix)

//Videos A ACHETER
function VideosAcheter(tab){
    let achats=[]
    for (let i=0;i<tab.length;i++){
        if (Duree-tab[i][1]<0){
            continue
        }
        achats[i]=tab[i]
        Duree-=tab[i][1]
    }

    return achats
}

let VideosAchetes=VideosAcheter(VideosTriesPrix)
console.log(VideosAchetes)