function openModal() {
    $('#modalFormRol').modal('show');
}

    //funcion para mostrar los datos en la tabla
    var data_table = $("#data_table").DataTable({
        "ajax": {
            "method": "POST",
            "url": base_url + "/roles/verroles"
        },
        "columns":[
            {"data":"id_rol"},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"status"},
            {"defaultContent":`<div class="d-flex justify-content-center">
                                    <button class="btn btn-primary " type="button">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button class="btn btn-warning mx-3" type="button" id="btn_edit" onclick="editRecord($(this).closest('tr'));">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="btn btn-danger " type="button" onclick="deleteRecord($(this).closest('tr'))">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>`
            }
        ]
    })


    //guardar registros
    let frmRegistro = document.querySelector("#formRol")
    frmRegistro.onsubmit = function(e){
        e.preventDefault()
        saveRegistro()
    }

    async function saveRegistro() {
        try {
            const data = new FormData(frmRegistro)

            let response = await fetch(base_url + "/roles/insertRole",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: data
            })
            json = await response.json()
            
            if (json.status == true) {
                swal("Guardar", json.msg , "success");
                frmRegistro.reset();
                data_table.ajax.reload();
            }else{
                swal("Guardar", json.msg , "error");
            }

            // $('#txtNombre').val("")
            // $('#txtDescripcion').val("")
            $('#modalFormRol').modal('toggle');

            
        } catch (err) {
            console.error(err)
        }
    }

    // function para convertir la fila en editable
    function getEditRow(curRow) {
        return '<tr>' +
            '<td>' + curRow.children()[0].textContent +'<input type="hidden" name="txtId" type="text" value="' + curRow.children()[0].textContent + '">'+'</td>' +
            '<td><input class="form-control" id="txtNombre" name="txtNombre" type="text" value="' + curRow.children()[1].textContent + '"/></td>' +
            '<td><input class="form-control" id="txtDescripcion" name="txtDescripcion" value="' + curRow.children()[2].textContent + '"/></td>' +
            '<td><select class="form-control" id="listStatus" name="listStatus" required>'+
            '<option value="Activo">Activo</option>'+
            '<option value="Inactivo">Inactivo</option>'+
            '</select>'+
            //'<input class="form-control" id="listStatus" name="listStatus" value="' + curRow.children()[3].textContent + '"/></td>' +
            '<td>' +
                '<div class="d-flex justify-content-center">' +
                '<button id="edit_confirm" class="btn btn-success mr-3" type="submit" name="update">Confirmar</button>' +
                '<button id="edit_cancel" class="btn btn-secondary">Cancelar</button>'+
                '</div>' +
            '</td>' +
            '</form>'+
            '</tr>';
    }


    // function para editar la fila
    function editRecord (curRow) {
        let oldRow = curRow.clone();

        let editRow = getEditRow(curRow);
        let nextRow = curRow.next();
        let contactTableBody = $('#data_table > tbody');

        curRow.remove();
        if (nextRow.children().length) {
            $(editRow).insertBefore(nextRow);
        } else {
            contactTableBody.append(editRow);
        }

        $('#edit_confirm').click(function () {
            let curRow = $(this).closest('tr');
 
            let data = {
                txtId: parseInt(curRow.find('input[name="txtId"]').val()),
                txtNombre: curRow.find('input[name="txtNombre"]').val(),
                txtDescripcion: curRow.find('input[name="txtDescripcion"]').val(),
                listStatus: curRow.find('select[name="listStatus"]').val(),
            }

            console.log(data);

            $.ajax({
                url: base_url + "/roles/updateRole",
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                data: data,
                success: function(response) {
                    
                    json = JSON.parse(response)
                    console.log(json.status)

                    if (json.status == true) {
                        swal("Actualizacion", json.msg , "success");
                        curRow.remove();
                        oldRow.children()[1].textContent = data.txtNombre;
                        oldRow.children()[2].textContent = data.txtDescripcion;
                        oldRow.children()[3].textContent = data.listStatus;

                        if (nextRow.children().length) {
                            $(oldRow).insertBefore(nextRow);
                        } else {
                            contactTableBody.append(oldRow);
                        }
                        data_table.ajax.reload();
                    }else{
                        swal("Error en los Datos", json.msg , "error");
                    }
                    
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    alert(errorThrown);
                }
            });
        });

        $('#edit_cancel').click(function () {
            $(this).closest('tr').remove();

            if (nextRow.children().length) {
                oldRow.insertBefore(nextRow);
            } else {
                contactTableBody.append(oldRow);
            }
        });
    }
    
    // function para borrar la fila
    function deleteRecord(curRow){
        swal({
            title: "Esta seguro que quiere borrar el registro?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                if (willDelete) {
                    let id = curRow.children()[0].textContent;
        
                    let data = {
                        txtId: id
                    }
        
                    $.ajax({
                        url: base_url + "/roles/deleteRole",
                        method: 'POST',
                        mode: 'cors',
                        cache: 'no-cache',
                        data: data,
                        success: function(response) {
                            json = JSON.parse(response)
                            console.log(json.status)
        
                            if (json.status == true) {
                                swal("Registro borrado con exito", {
                                    icon: "success",
                                });
                                data_table.ajax.reload();
                            }
                            
                        },
                        error: function( jqXHR, textStatus, errorThrown ) {
                            //alert(errorThrown);
                            swal("Error en los Datos", json.msg , "error");
                        }
                    });
                }else {
                    swal("Your imaginary file is safe!");
                  }
            } 
          });
        
    }
























