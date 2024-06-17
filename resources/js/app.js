import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

/* // Prendo i bottoni cancella
const deleteButtons = document.querySelectorAll('.btn-danger');

console.log(deleteButtons);

// Per tutti i bottoni presi, aggiungo l'Event Listener
deleteButtons.forEach(curBtn => {
    curBtn.addEventListener('click', e => {
        const decision = confirm('Vuoi cancellare?');
        if(!decision) {
            e.preventDefault();
        }
    });
}); */