function onJSON(json) {
const section = document.querySelector("#prima");

let table = document.createElement('table');
let thead = document.createElement('thead');
table.appendChild(thead);


const row = document.createElement('tr');
    for(let value of Object.keys(json[0]))
            {
            const heading = document.createElement('th');
            heading.classList.add("riga");
            heading.textContent = value.toUpperCase();
            row.appendChild(heading);
            }
thead.appendChild(row);   
        
    for (const x in json)
        {
            const row = document.createElement('tr');
            for(let value of Object.values(json[x]) )
                {
                const heading = document.createElement('th');
                heading.textContent = value;
                row.appendChild(heading);
                }
        thead.appendChild(row);
        }  
        section.appendChild(table);
}

function onResponse(response)
{
return response.json();
}

fetch("reservations.php").then(onResponse).then(onJSON);