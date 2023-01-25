// constantes
const valor = document.querySelector('#valor');
const btnBuscar = document.querySelector('#btnBuscar');
const formularioCedula = document.querySelector('#formularioCedula');

// variables
const imagenPerfil = document.querySelector('#img-buscar')
const cedula = document.querySelector('#cedula');
const nombre = document.querySelector('#nombre');
const negocio = document.querySelector('#negocio');
const localidad = document.querySelector('#localidad');
const ext = document.querySelector('#ext');
const celular = document.querySelector('#celular');
const correo = document.querySelector('#correo');
const tipoEmpleado = document.querySelector('#tipoEmpleado');

const cargo = document.querySelector('#cargo');
const nomina = document.querySelector('#nomina');
const area = document.querySelector('#area');
const aniversario = document.querySelector('#aniversario');
const supervisor = document.querySelector('#supervisor');
const organizacion = document.querySelector('#organizacion');
const edificion = document.querySelector('#edificion');
const descripcion = document.querySelector('#descripcion');

const buscarCedula =  async (e) => {
    e.preventDefault();

    if(valor.value.length < 2) {
        alert('debe enviar un indicador valido');
        return;
    }

    try {
        
        // peticion http
        const respuesta = await axios.get('php/Mbuscar.php', {
            params : {
                cedula : valor.value,
                tipo : 'buscarCedula'
            }
        });

        if(respuesta.data.tipo == 'success') {
            imagenPerfil.setAttribute("src",`http://ccschu14.pdvsa.com/PHOTOS/0${respuesta.data.data.cedula}.jpg`);

            cedula.innerHTML = respuesta.data.data.cedula;
            nombre.innerHTML = respuesta.data.data.nombre;
            negocio.innerHTML = respuesta.data.data.negocio;
            localidad.innerHTML = respuesta.data.data.localidad;
            ext.innerHTML = respuesta.data.data.ext;
            celular.innerHTML = respuesta.data.data.celular;
            correo.innerHTML = respuesta.data.data.correo;
            tipoEmpleado.innerHTML = respuesta.data.data.tipoEmpleado;

            cargo.innerHTML = respuesta.data.data.cargo;
            nomina.innerHTML = respuesta.data.data.nomina;
            area.innerHTML = respuesta.data.data.area;
            aniversario.innerHTML = respuesta.data.data.aniversario;
            supervisor.innerHTML = respuesta.data.data.supervisor;
            organizacion.innerHTML = respuesta.data.data.organizacion;
            edificion.innerHTML = respuesta.data.data.edificion;
            descripcion.innerHTML = respuesta.data.data.descripcion;

            document.querySelector('.section').style.visibility = "visible";
        } 

        if(respuesta.data.tipo == 'warning') {
            alert('usuario no encontrado');
            document.querySelector('.section').style.visibility = "hidden";

        }

    } catch (error) {
        console.log(error);
    }

}

// EventListeners
btnBuscar.addEventListener('click', buscarCedula);
formularioCedula.addEventListener('submit', buscarCedula);

