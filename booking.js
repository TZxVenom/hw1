function checkDate() {
const check_in = document.querySelector('.check-in input');
const check_out = document.querySelector('.check-out input');
const inDate = new Date (check_in.value);
const outDate = new Date(check_out.value);

if (inDate < outDate) {
    document.querySelector('.check-out').classList.remove('errorj');
    document.querySelector('.check-in').classList.remove('errorj');
}
if (inDate.getFullYear() === yyyy) {
    if(String(inDate.getMonth() + 1).padStart(2, '0') ===  mm) {
    if((String(inDate.getDate()).padStart(2, '0')) === dd) {
    document.querySelector('.check-in').classList.remove('errorj');
            } 
        } 
    } 

if (inDate > outDate) {
    document.querySelector('.check-out .sotto').textContent = "Il check-out non può essere prima del check-in!";
    document.querySelector('.check-out').classList.add('errorj');
    document.querySelector('.check-in .sotto').textContent = "Il check-out non può essere prima del check-in!";
    document.querySelector('.check-in').classList.add('errorj');
    }
if (inDate.getTime() === outDate.getTime()) {
    document.querySelector('.check-out .sotto').textContent = "Non può essere lo stesso giorno!";
    document.querySelector('.check-out').classList.add('errorj');
    document.querySelector('.check-in .sotto').textContent = "Non può essere lo stesso giorno!";
    document.querySelector('.check-in').classList.add('errorj');
}

if (inDate.getFullYear() <  yyyy) {
    document.querySelector('.check-in .sotto').textContent = "Il check-in non può essere prima di oggi!";
    document.querySelector('.check-in').classList.add('errorj');
    } 

if (inDate.getFullYear() ===  yyyy) { 
    if(String(inDate.getMonth() + 1).padStart(2, '0') <  mm) {
    document.querySelector('.check-in .sotto').textContent = "Il check-in non può essere prima di oggi!";
    document.querySelector('.check-in').classList.add('errorj');
        }
    } 

if (inDate.getFullYear() === yyyy) {
    if(String(inDate.getMonth() + 1).padStart(2, '0') ===  mm) {
    if((String(inDate.getDate()).padStart(2, '0')) < dd) {
    document.querySelector('.check-in .sotto').textContent = "Il check-in non può essere prima di oggi!";
    document.querySelector('.check-in').classList.add('errorj');
            } 
        } 
    } 
}


function checkRoom() {
const camera = document.getElementById('camera');
const persone = document.getElementById('persone');
const numero_camere = document.getElementById('numero_camere');

if (camera.value === "Benchmark") {
if ((persone.value !== numero_camere.value )){
    document.querySelector('.persone .sotto').textContent = "La Benchmark è una stanza singola!";
    document.querySelector('.numero_camere .sotto').textContent = "La Benchmark è una stanza singola!";
    document.querySelector('.persone').classList.add('errorj');
    document.querySelector('.numero_camere').classList.add('errorj');
        }
        else {
            document.querySelector('.persone').classList.remove('errorj');
            document.querySelector('.numero_camere').classList.remove('errorj');
        }
    }
if(camera.value === 'The Sovereign') {
    
    if((persone.value % numero_camere.value !== 0) || ((persone.value % 2) !== 0) || (persone.value === numero_camere.value)) {
     
    document.querySelector('.persone .sotto').textContent = "The Sovereign è una stanza doppia!";
    document.querySelector('.numero_camere .sotto').textContent = "The Sovereign è una stanza doppia!";
    document.querySelector('.persone').classList.add('errorj');
    document.querySelector('.numero_camere').classList.add('errorj');
    }
    else if((persone.value / numero_camere.value) > 2){
    document.querySelector('.persone .sotto').textContent = "The Sovereign è una stanza doppia!";
    document.querySelector('.numero_camere .sotto').textContent = "The Sovereign è una stanza doppia!";
    document.querySelector('.persone').classList.add('errorj');
    document.querySelector('.numero_camere').classList.add('errorj');
    }
    else {
        document.querySelector('.persone').classList.remove('errorj');
        document.querySelector('.numero_camere').classList.remove('errorj');
        }

    if(persone.value === '12'){
        document.querySelector('.persone .sotto').textContent = "Massimo 10 persone per le stanze disponibili!";
        document.querySelector('.numero_camere .sotto').textContent = "Massimo 10 persone per le stanze disponibili";
        document.querySelector('.persone').classList.add('errorj');
        document.querySelector('.numero_camere').classList.add('errorj');
        }    
    }

if (camera.value === "Diamond") {
    if((persone.value % numero_camere.value !== 0) || ((persone.value % 4) !== 0) || (persone.value === numero_camere.value)) {
            document.querySelector('.persone .sotto').textContent = "La Diamond è una stanza quadrupla!";
            document.querySelector('.numero_camere .sotto').textContent = "La Diamond è una stanza qudrupla!";
            document.querySelector('.persone').classList.add('errorj');
            document.querySelector('.numero_camere').classList.add('errorj');
                }
                else if(persone.value === '4' && numero_camere.value === '2') {
                    document.querySelector('.persone .sotto').textContent = "La Diamond è una stanza quadrupla!";
                    document.querySelector('.numero_camere .sotto').textContent = "La Diamond è una stanza quadrupla!";
                    document.querySelector('.persone').classList.add('errorj');
                    document.querySelector('.numero_camere').classList.add('errorj');
                    }
                else if(persone.value === '8' && numero_camere.value === '1') {
                        document.querySelector('.persone .sotto').textContent = "La Diamond è una stanza quadrupla!";
                        document.querySelector('.numero_camere .sotto').textContent = "La Diamond è una stanza quadrupla!";
                        document.querySelector('.persone').classList.add('errorj');
                        document.querySelector('.numero_camere').classList.add('errorj');
                    }
                else if(persone.value === '8' && numero_camere.value === '4') {
                            document.querySelector('.persone .sotto').textContent = "La Diamond è una stanza quadrupla!";
                            document.querySelector('.numero_camere .sotto').textContent = "La Diamond è una stanza quadrupla!";
                            document.querySelector('.persone').classList.add('errorj');
                            document.querySelector('.numero_camere').classList.add('errorj');
                     }
                else {
                    document.querySelector('.persone').classList.remove('errorj');
                    document.querySelector('.numero_camere').classList.remove('errorj');
                }
            if(persone.value === '12') {
                if(numero_camere.value !== '3'){
                    document.querySelector('.persone .sotto').textContent = "Servono 3 camere";
                    document.querySelector('.numero_camere .sotto').textContent = "Servono 3 camere";
                    document.querySelector('.persone').classList.add('errorj');
                    document.querySelector('.numero_camere').classList.add('errorj');
                    }   
                    else {
                        document.querySelector('.persone').classList.remove('errorj');
                        document.querySelector('.numero_camere').classList.remove('errorj');
                        }
            }
    }

if (camera.value === "Aspire") {
    if (camera.value === "Aspire") {
        if((persone.value % numero_camere.value !== 0) || ((persone.value % 2) !== 0) || (persone.value === numero_camere.value)) {
            document.querySelector('.persone .sotto').textContent = "L'Aspire è una stanza doppia!";
            document.querySelector('.numero_camere .sotto').textContent = "L'Aspire è una stanza doppia!";
            document.querySelector('.persone').classList.add('errorj');
            document.querySelector('.numero_camere').classList.add('errorj');
                    }
            else if((persone.value / numero_camere.value) > 2){
                    document.querySelector('.persone .sotto').textContent = "L'Aspire è una stanza doppia!";
                    document.querySelector('.numero_camere .sotto').textContent = "L'Aspire è una stanza doppia!";
                    document.querySelector('.persone').classList.add('errorj');
                    document.querySelector('.numero_camere').classList.add('errorj');
                    }
            else    {
                    document.querySelector('.persone').classList.remove('errorj');
                    document.querySelector('.numero_camere').classList.remove('errorj');
                    }
            if(persone.value === '6') {
                        if(numero_camere.value !== '3'){
                            document.querySelector('.persone .sotto').textContent = "Servono 3 camere";
                            document.querySelector('.numero_camere .sotto').textContent = "Servono 3 camere";
                            document.querySelector('.persone').classList.add('errorj');
                            document.querySelector('.numero_camere').classList.add('errorj');
                            }   
                            else {
                                document.querySelector('.persone').classList.remove('errorj');
                                document.querySelector('.numero_camere').classList.remove('errorj');
                                }
                    }  
            if((persone.value === '8') || (persone.value === '10') || (persone.value === '12')) {
                            document.querySelector('.persone .sotto').textContent = "Massimo 6 persone per le camere disponibili!";
                            document.querySelector('.numero_camere .sotto').textContent = "Massimo 6 persone per le camere disponibili!";
                            document.querySelector('.persone').classList.add('errorj');
                            document.querySelector('.numero_camere').classList.add('errorj'); 
                    } 
            }
    }
}

document.querySelector('.check-in input').addEventListener('input', checkDate);
document.querySelector('.check-out input').addEventListener('input', checkDate);
document.getElementById('camera').addEventListener('change', checkRoom)
document.getElementById('persone').addEventListener('change', checkRoom);
document.getElementById('numero_camere').addEventListener('change', checkRoom);
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

