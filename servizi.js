function onJSON(json){
    const container1 = document.querySelector("#prima .container");
    const img1 = document.createElement('img');
    const img2 = document.createElement('img');
    img1.src = json[5];
    img2.src = json[6];
    container1.appendChild(img1);
    container1.appendChild(img2);

    const text_container1 = document.querySelector("#prima .text_container");
    const contenuto1 = document.querySelector("#prima .contenuto1");
    const h1 = document.createElement("h1");
    h1.textContent = "Pulizia";
    const p = document.createElement("p");
    p.textContent = "Le nostre camere vengono pulite regolarmente così come la biancheria in tutte le camere, per noi l'igiene è fondamentale e vogliamo che il cliente si senta a casa."
    contenuto1.appendChild(h1);
    contenuto1.appendChild(p);
    text_container1.appendChild(contenuto1);

    const contenuto2 = document.querySelector("#prima .contenuto2");
    const h1_2 = document.createElement("h1");
    h1_2.textContent = "Servizio in camera";
    const p_2 = document.createElement("p");
    p_2.textContent = "Tutte le camere sono provviste di un telefono con cui contattare la reception attiva 24h/24 per qualsiasi informazione e per il servizio in camera."
    contenuto2.appendChild(h1_2);
    contenuto2.appendChild(p_2);
    text_container1.appendChild(contenuto2);

    const container2 = document.querySelector("#seconda .container");
    const img3 = document.createElement('img');
    const img4 = document.createElement('img');
    img3.src = json[7];
    img4.src = json[8];
    container2.appendChild(img3);
    container2.appendChild(img4);
    
    const text_container2 = document.querySelector("#seconda .text_container");
    const contenuto3 = document.querySelector("#seconda .contenuto1");
    const h1_3 = document.createElement("h1");
    h1_3.textContent = " Cucina raffinata";
    const p_3 = document.createElement("p");
    p_3.textContent = "Il nostro hotel si ispira al movimento del design moderno della metà del secolo e, a sua volta, il nostro ristorante e caffetteria in loco, Continental, è influenzato dalle cucine di tutto il mondo."
    contenuto3.appendChild(h1_3);
    contenuto3.appendChild(p_3);
    text_container2.appendChild(contenuto3);

    const contenuto4 = document.querySelector("#seconda .contenuto2");
    const h1_4 = document.createElement("h1");
    h1_4.textContent = "In hotel bar";
    const p_4 = document.createElement("p");
    p_4.textContent = "I barman mixologist del nostro bar, Refill, creano cocktail innovativi e deliziosi con la precisione di un chimico. Le birre prodotte dalle migliori birrerie londinesi sono alla spina e si alternano mensilmente per mantenere interessanti le nostre selezioni."
    contenuto4.appendChild(h1_4);
    contenuto4.appendChild(p_4);
    text_container2.appendChild(contenuto4);
}

function onJson(json) {
const section = document.querySelector("#terza");
const container = document.querySelector("#terza .container");
const objects = json;
container.innerHTML= "";

    for(let i=0; i<=6; i++) {
    const img = document.createElement("img");
    const h4 = document.createElement('h4');
    const textContainer = document.createElement('div');
    textContainer.classList.add("text_container");
    img.src = objects.drinks[i].strDrinkThumb;
    h4.textContent = objects.drinks[i].strDrink;
    img.classList.add("api");
    textContainer.appendChild(h4);
    container.appendChild(img);
    container.appendChild(textContainer);
    section.appendChild(container);
    }
}

function fetchDrinks(event) {
const form_data = new FormData(document.querySelector("form"));
fetch("cocktailApi.php?" + "&q=" + encodeURIComponent(form_data.get('search'))).then(onResponse).then(onJson);
event.preventDefault();
}


function onResponse(response)
{
return response.json();
}

const button = document.querySelector("#button");
button.addEventListener("click", fetchDrinks);

fetch("images.php").then(onResponse).then(onJSON);
