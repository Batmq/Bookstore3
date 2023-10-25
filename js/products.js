export default class Products{
    constructor() {
        this.data = {
            password:"Bookstore",
        }

        this.rootElem = document.querySelector(".products");
        this.filter = this.rootElem.querySelector(".filter");
        this.items = this.rootElem.querySelector(".items");

        this.nameSearch = this.filter.querySelector(".nameSearch");

    }

    async init(){
        this.nameSearch.addEventListener("input", () => {
            if(this.nameSearch.value.length >= 3){
                this.render();

            }
        });

        await this.render();
    }

    async render(){
        const data = await this.getData();

        const row = document.createElement("div");
        row.classList.add("row", "g-4");

        for(const item of data){
            const col = document.createElement("div");
            col.classList.add("col-md-6", "col-lg-4", "col-xl-3");

            col.innerHTML = `
            
            <div class="card card-height border-color">
                <img src="uploads/${item.bogBillede}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title card-title-size">${item.bogNavn}</h5>
                    <p class="card-text">${item.bogForfatter}</p>
                     <p class="card-text card-text-size">${item.bogKategori}</p>
                </div>
                <div class="card-footer">
                    <a href="detail.php?bogID=${item.bogID}" class="btn  w-100">Se mere</a>
                </div>
            </div>
            
            `;
            row.appendChild(col);
        }

        this.items.innerHTML = "";
        this.items.appendChild(row);
    }

    async getData(){
        this.data.nameSearch = this.nameSearch.value;


        const response = await fetch("API.php", {
            method:"POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }

}