<?php
headerAdmin($data);
getModal('modalRoles', $data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>
        <i class="icon fa fa-shield mr-3" aria-hidden="true"></i>
        <span class="mr-3"><?php echo $data['page_title']; ?></span>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?php echo baseurl(); ?>/roles"><?php echo $data['page_name']; ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="mb-4">
          <button class="btn btn-primary btn-lg" type="button" onclick="openModal();">
            <i class="fas fa-plus mr-2"></i>
            Nuevo Rol
          </button>
        </div>
        <hr>
        <div class="tile-body">
          <div class="table-responsive-sm">
            <table id="data_table" class="table table-hover table-bordered text-center" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>DESCRIPCION</th>
                  <th>STATUS</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
              <tbody id="bodyTableRol">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>



<!-- <?php #foreach ($list as $dato){
      ?>
                    <tr role="row" class="odd">
                    <td class="sorting_1"><?php #echo $dato['id_rol'];
                                          ?></td>
                      <td><?php #echo $dato['nombre'];
                          ?></td>
                      <td><?php #echo $dato['descripcion'];
                          ?></td>
                      <td><?php #echo $dato['status'];
                          ?></td>
                      <td>
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-primary " type="button">
                            <i class="fas fa-key"></i>
                          </button>
                          <button class="btn btn-warning mx-3" type="button" id="btn_edit" onclick="editRecord($(this).closest('tr'));">
                            <i class="fas fa-pen"></i>
                          </button>
                          <button class="btn btn-danger " type="button">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                <?php #}
                ?> -->