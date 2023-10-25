export default class Users{
    constructor() {
        this.rootElem = document.querySelector(".users"); /*Selecter vores user class fra html*/
    }

    init(){
        this.render();
    }

    /*Outputte noget af det data vi fetch*/
    /*Skal outputte det på skærmen*/
    async render(){
       const data = await this.getData();

       /*Her har vi med createElement lavet en div, som vi med classList har givet class row*/
       const row = document.createElement("div");
       row.classList.add("row");

       /*Looper igennem vores data fra users.json*/
        for(const item of data){ /*Logger vores lister for sig selv*/
            const col = document.createElement("div");
            col.classList.add("col-6");

            col.innerHTML = `
            
                <div>
                    <p>${item.name}</p>
                    <p>${item.age}</p>

                
                <!--Henter vores arrays-->
                    ${item.favoriteColors.map(color => {
                        return `<p>${color}</p>`;    
                    }).join("")}
                
                <!--Henter vores objects, med object.entries laves det om til et array-->
                    ${Object.entries(item.hobbies).map(([h,l]) => {
                         return `<p>${h} : ${l}</p>`;
                     }).join("")}
                
            
                </div>

            
            `; /*Imellem de her backticks fylder vi html ind i den col vi lige har lavet*/

            row.appendChild(col);
        }

        this.rootElem.appendChild(row);

    }

    /*Henter vores data med en fetch funktion*/
    async getData(){
        const response = await fetch("users.json");
        return await response.json(); /*return er med til at får data ud på skærmen*/
    }

}