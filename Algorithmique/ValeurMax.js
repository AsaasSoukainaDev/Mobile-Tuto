const tab=[2,5,3,10]
let max=tab[0]
for(let i=1;i<=tab.length-1;i++){
    if(tab[i]>max){
        max=tab[i]
    }
}
console.log(max)
