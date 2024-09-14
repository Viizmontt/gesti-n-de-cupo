<?php headerAdmin($data); ?>
<main class="app-content">



    <div class="row">

        <div class="form-group col-xl-12">

            <h1 class="text-center">PLANTA GUAZAPA </h1>
            <hr>

            <div class="row">

                <div class="form-group col-xl-6">

                    <h2 class="text-center">Rastras</h2>
                    <hr>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small primary coloured-icon"><i
                                            class="icon fa fa-play-circle-o"></i>
                                        <div class="info">
                                            <h5>Cupos libres</h5>
                                            <p><b><?= $data['libresRG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small info coloured-icon"><i class="icon fa fa-product-hunt"></i>
                                        <div class="info">
                                            <h5>Cupos programados</h5>
                                            <p><b><?= $data['programadoRG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-spinner"></i>
                                        <div class="info">
                                            <h5>Cupos en proceso</h5>
                                            <p><b><?= $data['procesoRG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-trash"></i>
                                        <div class="info">
                                            <h5>Cupos cancelados</h5>
                                            <p><b><?= $data['canceladoRG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-12">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small success coloured-icon"><i class="icon fa fa-check"></i>
                                        <div class="info">
                                            <h5>Cupos finalizados</h5>
                                            <p><b><?= $data['finalizadoRG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>



                <div class="form-group col-xl-6">

                    <h2 class="text-center">Camiones</h2>
                    <hr>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small primary coloured-icon"><i
                                            class="icon fa fa-play-circle-o"></i>
                                        <div class="info">
                                            <h5>Cupos libres</h5>
                                            <p><b><?= $data['libresCG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small info coloured-icon"><i class="icon fa fa-product-hunt"></i>
                                        <div class="info">
                                            <h5>Cupos programados</h5>
                                            <p><b><?= $data['programadoCG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-spinner"></i>
                                        <div class="info">
                                            <h5>Cupos en proceso</h5>
                                            <p><b><?= $data['procesoCG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-trash"></i>
                                        <div class="info">
                                            <h5>Cupos cancelados</h5>
                                            <p><b><?= $data['canceladoCG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-12">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small success coloured-icon"><i class="icon fa fa-check"></i>
                                        <div class="info">
                                            <h5>Cupos finalizados</h5>
                                            <p><b><?= $data['finalizadoCG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>


            </div>

        </div>




        <div class="form-group col-xl-12">

            <h1 class="text-center">PLANTA JIBOA</h1>
            <hr>

            <div class="row">

                <div class="form-group col-xl-6">

                    <h2 class="text-center">Rastra</h2>
                    <hr>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small primary coloured-icon"><i
                                            class="icon fa fa-play-circle-o"></i>
                                        <div class="info">
                                            <h5>Cupos libres</h5>
                                            <p><b><?= $data['libresRJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small info coloured-icon"><i class="icon fa fa-product-hunt"></i>
                                        <div class="info">
                                            <h5>Cupos programados</h5>
                                            <p><b><?= $data['programadoRJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-spinner"></i>
                                        <div class="info">
                                            <h5>Cupos en proceso</h5>
                                            <p><b><?= $data['procesoRJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-trash"></i>
                                        <div class="info">
                                            <h5>Cupos cancelados</h5>
                                            <p><b><?= $data['canceladoRG'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-12">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small success coloured-icon"><i class="icon fa fa-check"></i>
                                        <div class="info">
                                            <h5>Cupos finalizados</h5>
                                            <p><b><?= $data['finalizadoRJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>



                <div class="form-group col-xl-6">

                    <h2 class="text-center">Camiones</h2>
                    <hr>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small primary coloured-icon"><i
                                            class="icon fa fa-play-circle-o"></i>
                                        <div class="info">
                                            <h5>Cupos libres</h5>
                                            <p><b><?= $data['libresCJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small info coloured-icon"><i class="icon fa fa-product-hunt"></i>
                                        <div class="info">
                                            <h5>Cupos programados</h5>
                                            <p><b><?= $data['programadoCJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-spinner"></i>
                                        <div class="info">
                                            <h5>Cupos en proceso</h5>
                                            <p><b><?= $data['procesoCJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="form-group col-xl-6">

                            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-trash"></i>
                                        <div class="info">
                                            <h5>Cupos cancelados</h5>
                                            <p><b><?= $data['canceladoCJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-xl-12">

                            <?php if(!empty($_SESSION['permisos'][1]['r']) ){ ?>
                            <div class="col-md-12 col-lg-12">
                                <a href="#" class="linkw">
                                    <div class="widget-small success coloured-icon"><i class="icon fa fa-check"></i>
                                        <div class="info">
                                            <h5>Cupos finalizados</h5>
                                            <p><b><?= $data['finalizadoCJ'] ?></b></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
<?php footerAdmin($data); ?>