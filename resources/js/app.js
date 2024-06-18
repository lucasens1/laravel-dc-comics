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

/* 
modale da JS : quel delete modal è l'id del modale nella page
deleteButtons.forEach(curBtn => {
    curBtn.addEventListener('click', e => {
        e.preventDefault();
        // Istanzio il modale collegando all'id nella pagina
        const modal = new bootstrap.Modal(document.getElementById('delete-modal'));

        // Inserisco i dati del fumetto nel modale
        COME LO PRENDO? usando data attribute :
        Inserendolo nel bottone così al click sul bottone passo questo specifico attributo :
        data-comic-title="{{$item->title}}"

        // Assegno il data-comic-title
        const comicTitle= curBtn.dataset.comicTitle;
        document.getElementById('modal-body-info') = `Stai per cancellare il fumetto : ${comicTitle}`;

        // il bottone conferma azione deve ascoltare il click, al click sul bottone deve esserci il submit del form
        document.getElementById('modal-delete-btn').addEventListener('click', function() {
            curBtn.parentElement.submit();
        })
        

        //Mostro modale
        modal.show();
    });
});
*/