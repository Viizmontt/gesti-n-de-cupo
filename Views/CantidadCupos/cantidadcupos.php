<?php 
    headerAdmin($data); 
    getModal('modalCantidadCupos',$data);
?>
  <main class="app-content">    
      <div class="app-title">
        <div>
            <h1><?= $data['page_title'] ?></h1>
        </div>        
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableCantidadCupos">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Código</th>                          
                          <th>Tipo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    