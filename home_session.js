function onJSON(json){
    const div = document.querySelector("#prima div");
    const h1 = document.createElement("h1");
    h1.textContent = "Design eccezionale.\nServizio straordinario.";
    h1.classList.add("space");
    div.appendChild(h1);

    const container1 = document.querySelector("#prima .container");
    const img1 = document.createElement('img');
    img1.src = json[1];
    container1.appendChild(img1);

    const container2 = document.querySelector("#seconda .container");
    const img2 = document.createElement('img');
    img2.src = json[2];
    container2.appendChild(img2);

    const contenuto1 = document.querySelector("#seconda .contenuto");
    const h2 = document.createElement("h2");
    h2.textContent = " Informazioni sull'hotel\n";
    h2.classList.add("space");
    const a = document.createElement("a");
    a.textContent = "Progettato per essere un santuario del design e del moderno nel centro dellà città, il Vaine fà del comfort il suo punto focale.";
    contenuto1.appendChild(h2);
    contenuto1.appendChild(a);
    container2.appendChild(contenuto1);

    const container3 = document.querySelector(".container_reversed");
    const img3 = document.createElement('img');
    img3.src = json[3];
    container3.appendChild(img3);

    const contenuto2 = document.querySelector(".container_reversed .contenuto");
    const h2_2 = document.createElement("h2");
    h2_2.textContent = " Fai un viaggio con noi\n";
    h2_2.classList.add("space");
    const a_2 = document.createElement("a");
    a_2.textContent = "Un soggiorno al Vaine è qualcosa di più di una camera. Esplora una giornata nella vita di una comunità di artisti, innovatori e viaggiatori..";
    contenuto2.appendChild(h2_2);
    contenuto2.appendChild(a_2);
    container3.appendChild(contenuto2);

    const container4 = document.querySelector("#quarta .container");
    const img4 = document.createElement('img');
    img4.src = json[4];
    container4.appendChild(img4);

    const contenuto3 = document.querySelector("#quarta .contenuto");
    const h2_3 = document.createElement("h2");
    h2_3.textContent = " Servizi\n";
    h2_3.classList.add("space");
    const a_3 = document.createElement("a");
    a_3.textContent = "Qualunque siano le vostre esigenze, il Vaine saprà soddisfarvi: la nostra cucina pluripremiata e il bar in hotel sono i nostri fiori all'occhiello.";
    contenuto3.appendChild(h2_3);
    contenuto3.appendChild(a_3);
    container4.appendChild(contenuto3);

    const overlay = document.querySelector("#overlay");
    const button = document.createElement("div");
    const link = document.createElement('a');
    link.href = "http://localhost/hw1/booking.php";
    link.textContent = "Prenota una camera";
    button.classList.add("button");
    button.appendChild(link);
    const h1_2 = document.createElement("h1");
    h1_2.textContent = "Scegli il meglio, prenota un soggiorno con noi oggi!";
    overlay.appendChild(h1_2);
    overlay.appendChild(button);
}


function onResponse(response)
{
return response.json();
}

fetch("images.php").then(onResponse).then(onJSON);