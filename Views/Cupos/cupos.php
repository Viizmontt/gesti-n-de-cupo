<?php 
  headerAdmin($data);
  getModal('modalCupos',$data);
?>

<main class="app-content">

  <div class="app-title text-center">
    <div class="info">
      <h1 class="text-center"><?= $data['page_title'] ?></h1>
    </div>
  </div>

  <div class="col-md-12">
    <div class="btn widget-small primary coloured-icon"><i class="icon fas fa-industry"></i>
      <div class="info">
        <h4>Cupos Rastras Planta Guazapa</h4>
      </div> 
      <button class="btn btn-primary" onClick="fntCrearCupos(1)">Crear cupos</button>
      <button class="btn btn-danger" onClick="fntDelCupos(1)">Eliminar cupos</button>
    </div>
  </div>
     

  <div class="col-md-12">
    <div class="btn widget-small warning coloured-icon"><i class="icon"><img src="<?= media(); ?>/icons/svg/planta.svg"></i>
      <div class="info">
        <h4>Cupos Camiones Planta Guazapa</h4>
      </div>
      <button class="btn btn-primary" onClick="fntCrearCupos(3)">Crear cupos</button>
      <button class="btn btn-danger" onClick="fntDelCupos(3)">Eliminar cupos</button>
    </div>
  </div>
  
  <div class="col-md-12">
    <div class="btn widget-small danger coloured-icon"><i class="icon fas fa-industry"></i>
      <div class="info">
        <h4>Cupos Rastras Planta Jiboa</h4>
      </div>
      <button class="btn btn-primary" onClick="fntCrearCupos(2)">Crear cupos</button>
      <button class="btn btn-danger" onClick="fntDelCupos(2)">Eliminar cupos</button>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="btn widget-small info coloured-icon"><i class="icon"><img src="<?= media(); ?>/icons/svg/planta.svg"></i>
      <div class="info">
        <h4>Cupos Camiones Planta Jiboa</h4>
      </div>
      <button class="btn btn-primary" onClick="fntCrearCupos(4)">Crear cupos</button>
      <button class="btn btn-danger" onClick="fntDelCupos(4)">Eliminar cupos</button>
    </div>
  </div>

</main>

<?php footerAdmin($data); ?>