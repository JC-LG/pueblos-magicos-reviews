const idFormularioResenia = 'formulario-de-resenia';
const idListaResenia = 'lista-de-resenia';
const idAgregarResenia = 'agregar-resenia';

const VISTAS = {
    LISTA: 'lista',
    FORMA: 'forma'
}

const ESTADOS = {
    MOSTAR: 'mostrar',
    OCULTAR: 'ocultar'
}

const actualizarVista  = ({ vistaActiva = VISTAS.LISTA, elementoResenias, elementoFormulario }) => {
    if (elementoResenias) {
        elementoResenias.setAttribute('class', '');
        elementoResenias.setAttribute('class',
            `seccion-de-reviews typografia contentido ${vistaActiva === VISTAS.LISTA ? ESTADOS.MOSTAR : ESTADOS.OCULTAR }`
        );
    }

    if (elementoFormulario) {
        elementoFormulario.setAttribute('class', '');
        elementoFormulario.setAttribute('class',
            `typografia contentido ${vistaActiva === VISTAS.FORMA ? ESTADOS.MOSTAR : ESTADOS.OCULTAR }`
        );
    }
};

const actualizarServidor = (nuevoComentario) =>  {

    let forma = [];
    for (const elemento in nuevoComentario) {
        const llave = encodeURIComponent(elemento);
        const valor = encodeURIComponent(nuevoComentario[elemento]);
        forma.push(llave + "=" + valor);
    }
    forma = forma.join("&");
    return fetch("/pueblos-magicos-reviews/src/registro-review.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: forma
    });
}

const actualizarLista = (nuevoComentario) => {
    const { nombre, pueblo, review } = nuevoComentario;
    const comentarioEl = document.getElementById('lista-de-reviews');
    comentarioEl.innerHTML += `<li>
           <div class="comentario"><strong>${nombre}</strong> dice: 
           <br>${pueblo}: <em>${review}</em>
           </div>
    </li>`;
}


addEventListener("DOMContentLoaded", (event) => {
    const elementoResenias = window.document.getElementById(idListaResenia);
    const elementoFormulario = window.document.getElementById(idFormularioResenia);

    const agregarReseniaBoton = window.document.getElementById(idAgregarResenia);


    agregarReseniaBoton.addEventListener('click', (evento) => {
        actualizarVista({
            elementoResenias, elementoFormulario, vistaActiva: VISTAS.FORMA
        })
    });

    elementoFormulario.addEventListener('submit', async (evento) => {
        evento.preventDefault();

        const {value: nombre} = document.getElementById('nombre');
        const {value: pueblo} = document.getElementById('pueblo-visitado');
        const {value: review} = document.getElementById('review');

        const nuevoComentario = {nombre, pueblo, review};

        await actualizarServidor(nuevoComentario)
        actualizarLista(nuevoComentario);
        actualizarVista({
            elementoResenias, elementoFormulario, vistaActiva: VISTAS.LISTA
        })
    });

});
