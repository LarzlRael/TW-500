let URI = "http://localhost/practica8/API";

const nombre = document.querySelector('#nombre');
const apellido_paterno = document.querySelector('#apellido_paterno');
const apellido_materno = document.querySelector('#apellido_materno');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');
const checkbox = document.querySelector('#checkbox');

const form = document.querySelector('#form');

form.addEventListener('submit', e => {
    e.preventDefault();
    let newData = `nombre=${nombre.value}&apellido_p=${apellido_paterno.value}&apellido_m=${apellido_materno.value}&telefono=${telefono.value}&direccion=${direccion.value}&estado=${checkbox.checked ? 1 : 0}`;

    newRow(newData);
});




getUsers();

function getUsers() {
    console.log('peticion');
    let url = URI;
    let table = document.querySelector('#table');
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: url,
        // data: data,
        success: function (data) {
            console.log(data);
            table.innerHTML = '';
            table.innerHTML = `
                <tr>
                    
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
            </tr>
            `;
            data.forEach(element => {
                let tr = document.createElement('tr');


                tr.innerHTML += `<td>${element.nombre}</td>`;
                tr.innerHTML += `<td>${element.apellido_p}</td>`;
                tr.innerHTML += `<td>${element.apellido_m}</td>`;
                tr.innerHTML += `<td>${element.telefono}</td>`;
                tr.innerHTML += `<td>${element.direccion}</td>`;
                tr.innerHTML += `<td>${element.estado === "1" ?
                    `<button onClick="changeStatus(${element.id},${element.estado})" class="btn btn-success">Si</button>`
                    :`<button onClick="changeStatus(${element.id},${element.estado})" class="btn btn-danger">No</button>`}
                    
                </td> 
                `;
                tr.innerHTML += `<td><button onClick="deleteRow(${element.id})"
                class="btn btn-outline-danger">Eliminar</button></td>`;


                table.appendChild(tr)
            })
        }
    });
}
function newRow(data) {
    console.log(data);
    console.log('enviar datos POST')

    var request = $.ajax({
        url: `${URI}/new.php`,
        type: 'POST',
        data: data,
        success: function (datos) { //success es una funcion que se utiliza si el servidor retorna informacion
            getUsers();
        },

    });
}

function deleteRow(id) {
    console.log(id);
    console.log('Eliminado');

    var request = $.ajax({
        url: `${URI}/delete.php`,
        type: 'POST',
        data: { id },
        success: function (data) { //success es una funcion que se utiliza si el servidor retorna informacion
            console.log(data)
            getUsers();
        }

    });
}
function changeStatus(id, status) {
    console.log(id, status);
    console.log('Updated');

    var request = $.ajax({
        url: `${URI}/updateEstatus.php`,
        type: 'POST',
        data: { id,status },
        success: function (data) { //success es una funcion que se utiliza si el servidor retorna informacion
            console.log(data)
            getUsers();
        }

    });
}
