const nombre = document.querySelector('#nombre');
const apellido_paterno = document.querySelector('#apellido_paterno');
const apellido_materno = document.querySelector('#apellido_materno');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');
const checkbox = document.querySelector('#checkbox');
const codigo = document.querySelector('#codigo');

const form = document.querySelector('#form');

form.addEventListener('submit', e => {
    e.preventDefault();

    let newData = `nombre=${nombre.value}&apellido_p=${apellido_paterno.value}&apellido_m=${apellido_materno.value}&telefono=${telefono.value}&direccion=${direccion.value}&estado=${checkbox.checked}&codigo=${codigo.value}`;
    newRow(newData);
});


getUsers();


function getUsers() {
    let url = 'http://localhost/practica9/clientes.php';
    let table = document.querySelector('#table');

    $.ajax({
        type: 'GET',
        dataType: "json",
        url: url,
        // data: data,
        success: function (data) {
            console.log(data);
            table.innerHTML = "";
            table.innerHTML =
                `<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Codigo</th>
            <th>Estado</th>
        </tr>`;
            data.forEach(element => {
                let tr = document.createElement('tr');

                tr.innerHTML += `<td>${element.id}</td>`;
                tr.innerHTML += `<td>${element.nombre}</td>`;
                tr.innerHTML += `<td>${element.apellido_p}</td>`;
                tr.innerHTML += `<td>${element.apellido_m}</td>`;
                tr.innerHTML += `<td>${element.telefono}</td>`;
                tr.innerHTML += `<td>${element.direccion}</td>`;
                tr.innerHTML += `<td>${element.codigo}</td>`;
                tr.innerHTML += `<td>${element.estado === 't' ?
                    '<button class="btn btn-success"> Verdadero</button>' :
                    '<button class="btn btn-danger">Falso</button>'}</td>`;


                table.appendChild(tr)
            })
        }
    });
}
function newRow(data) {
    console.log(data);
    console.log('enviar datos POST')
    let url = 'http://localhost/practica9/newuser.php';
    var request = $.ajax({
        url: url,
        type: 'POST',
        data: data,
        // contentType: 'application/json; charset=utf-8',
        dataType: 'json',
    });

    request.done(function (data) {
        console.log(data);
        getUsers();
        swal(`${nombre.value} agregado con exito`, `Nuevo registro agregado`, "success");
        limpiarDatos();
    });

}

function limpiarDatos() {
    nombre.value = "";
    apellido_paterno.value = "";
    apellido_materno.value = "";
    telefono.value = "";
    direccion.value = "";
    checkbox.value = "";
    codigo.checked = false;
}