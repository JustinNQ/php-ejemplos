function buscarPacientes() {
    const $nombre = $("#nombre").val();
    //alert("Buscando..."+nombre);
    let datos ={
        nombre : $nombre
    };
    $.ajax({
        url :"26-ajax-pdo.php",
        type : "post",
        data : datos,
        success : function(result) {
            debugger;
            console.log(result);
            const pacientes=$.parseJSON(result);
            pacientes.forEach(item => {
                agregarFilas("#tabla",item);
            });
 
        }
    })
 
 
    return;
}
function agregarFilas(id,paciente) {
    const html=
    "<tr>"+
    "<td>"+paciente.id+"</td>"+
    "<td>"+paciente.nombres+"</td>"+
    "<td>"+paciente.edad+"</td>"+    
    "<td>"+paciente.talla_m+"</td>"+
    "<td>"+paciente.peso_kg+"</td>"+
    "<td>"+paciente.sintoma_tos+"</td>"+
    "<td>"+paciente.sintoma_fiebre+"</td>"+
    "<td>"+paciente.sintoma_disnea+"</td>"+
    "<td><button type='button' onclick=editar('"+paciente.id+"','"+paciente.nombres+"','"+paciente.edad+"');>Editar</button></td>"+
    "<td><button type='button' onclick=eliminar('"+paciente.id+"','"+paciente.nombres+"','"+paciente.edad+"');>Eliminar</button></td>"+
    "</tr>";
    $(id+" tr:last").after(html);
}
 
function editar(id, nombres,edad) {
    $('#exampleModal').modal('show');    
    $("#nombre2").val(nombres);
    $("#edad2").val(edad);
    $("#id").val(id);
}


function actualizar() {
    const $id = $("#id").val();
    const $nombre = $("#nombre2").val();
   
    let datos ={
        id : $id,
        nombre : $nombre
    };
    $.ajax({
        url :"26.1-update-ajax-pdo.php",
        type : "post",
        data : datos,
        success : function(result) {              
            alert("Se Actualizo los informacion correctamente de "+result);            
        }
    })
 
 
    return;
}
/////////////////////funcion para elimnar
function eliminar() {
    const $id = $("#id").val();

    let datos ={
        id : $id
    };

    $.ajax({
        url :"26.2-delete-ajax-pdo.php",
        type : "post",
        data : datos,
        success : function(result) {              
            alert(result);            
        }
    })
    
}


function cancelar() {
    $('#exampleModal').modal('hide');    
}
