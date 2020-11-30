
let modalContainer = document.querySelector('#modal');
setupModal('nuevo', '', '', '', '', '');

const server = 'http://localhost/3erExamen';

getUsers();

function getUsers() {
    let url = server;
    let table = document.querySelector('#table');

    $.ajax({
        type: 'GET',
        dataType: "json",
        url: url,
        success: function (data) {
            console.log(data);
            table.innerHTML = "";
            table.innerHTML =
                `<tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Sexo</th>
                    <th>Documento</th>
                </tr>`;
            data.forEach(element => {
                let tr = document.createElement('tr');

                tr.innerHTML += `<td>${element.id}</td>`;
                tr.innerHTML += `<td>${element.nombre}</td>`;
                tr.innerHTML += `<td>${element.apellido_p}</td>`;
                tr.innerHTML += `<td>${element.apellido_m}</td>`;
                tr.innerHTML += `<td>${element.sexo}</td>`;
                tr.innerHTML += `<td>${element.documento}</td>`;
                tr.innerHTML += `<td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=editar("${element.nombre}","${element.apellido_p}","${element.apellido_m}","${element.sexo}","${element.documento}","${element.id}")>
                <i class="fas fa-pencil-ruler"></i> Ver
                </button></td>`;
                table.appendChild(tr)
            })
        }
    });
}
function nuevoRegistro(data) {
    
    console.log('enviar datos POST')
    const url = `${server}/nuevoRegistro.php`;

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json',
    });

    getUsers();
    swal("Cliente Agregado", "Continuar", "success");
    $("#exampleModalCenter").modal('hide');
}

function setupModal(nuevo_editar, nombre, apellido_p, apellido_m, sexo, documento, id) {
    let modal = `
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    ${nuevo_editar === 'nuevo' ? 
                    'Agregar Usuario' : `Editando datos de:  <b><i>${nombre} ${apellido_p} ${apellido_m} </i></b>`}
                </h5>
                <button type="button" class="close" data-dismiss="modal" onclick=limpiarDatos() aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form action="" id="form" onsubmit=onSubmit()>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input
                            type="hidden"
                            id="id"
                            class="form-control"
                            value="${id}"
                        >
                        <input
                            type="text"
                            id="nombre"
                            class="form-control"
                            value="${nombre}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Paterno</label>
                        <input  
                            type="text" 
                            id="apellido_paterno" 
                            class="form-control"
                            value="${apellido_p}">
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Materno</label>
                        <input 
                            type="text"
                            id="apellido_materno" 
                            class="form-control"
                            value="${apellido_m}">
                    </div>
                    <div class="form-group">
                        <label for="">Documento</label>
                        <input 
                            type="number" 
                            id="documento"
                            class="form-control"
                            value="${documento}">
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" class="form-control" value="${sexo}">
                            ${nuevo_editar === "nuevo" ? `
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>`: `
                            <option value="M"
                            ${sexo == 'M' ? selected = "selected" : null}>Masculino</option>
                            
                            <option value="F"
                            ${sexo == 'F' ? selected = "selected" : null}>Femenino</option>`}
                            
                        </select>
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=limpiarDatos()> Cancelar &nbsp;<i class="far fa-window-close"></i></button>

                ${nuevo_editar === "nuevo" ? `
                <button 
                    onclick= nuevoUsuario()
                    type="button" 
                    class="btn btn-primary">
                    Nuevo &nbsp; <i class="fas fa-plus"></i>
                </button>`:

            `<button 
                    id="enviar"
                    type="button" 
                    class="btn btn-success"
                    onclick=editarUsuario()>
                    Editar &nbsp; <i class="fas fa-pen"></i>
                </button> 

                <button 
                    onclick=eliminarUsuario("${id}")
                    type="button" 
                    class="btn btn-danger">
                    Eliminar &nbsp; <i class="fas fa-times"></i>
                </button>`
        }
                
            </div>
        </div>
    </div>
    </div>
`;
    modalContainer.innerHTML = modal;

    setupFields();
}
function setupFields() {
    const nombre = document.querySelector('#nombre');
    const apellido_paterno = document.querySelector('#apellido_paterno');
    const apellido_materno = document.querySelector('#apellido_materno');
    const sexo = document.querySelector('#sexo');
    const documento = document.querySelector('#documento');
}


function editar(nombre, apellido_p, apellido_m, sexo, document, id) {
    
    setupModal('editar', nombre, apellido_p, apellido_m, sexo, document, id);
}

function limpiarDatos() {
    setupModal('nuevo', '', '', '', '', '');
}

async function editarUsuario() {

    const nombre = document.querySelector('#nombre');
    const apellido_paterno = document.querySelector('#apellido_paterno');
    const apellido_materno = document.querySelector('#apellido_materno');
    const sexo = document.querySelector('#sexo');
    const documento = document.querySelector('#documento');
    const id = document.querySelector('#id');

    const url = `${server}/editarUsuario.php`;

    var request = $.ajax({
        url: url,
        type: 'POST',
        data: {
            nombre: nombre.value,
            apellido_paterno: apellido_paterno.value,
            apellido_materno: apellido_materno.value,
            sexo: sexo.value,
            documento: documento.value,
            id: id.value
        },

    });
    getUsers();

    request.done(function (data) {
        swal({
            title: "Usuario Editado ",
            text: "El usuario fue editado satisfactoriamente",
            icon: "success",
            button: "Continuar",
        });
        $("#exampleModalCenter").modal('hide');
        getUsers();
    });


}

async function eliminarUsuario(id) {

    if (confirm('Esta seguro de Eliminar Usuario ? ')) {

        const url = `${server}/eliminar.php?id=${id}`;
        const settings = {
            method: 'POST',
        };

        try {
            const fetchResponse = await fetch(url, settings);

            swal("Usuario Eliminado", "El usuario fue eliminado", "success", {
                button: "Continuar",
            });

            $("#exampleModalCenter").modal('hide');
            getUsers();

        } catch (e) {
            console.log(e);
        }
    } else {
        return;
    }

}

function nuevoUsuario() {

    let data = `&nombre=${nombre.value}&apellido_paterno=${apellido_paterno.value}&apellido_materno=${apellido_materno.value}&sexo=${sexo.value}&documento=${documento.value}`;
    nuevoRegistro(data);
}