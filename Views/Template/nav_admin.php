<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/nav.css">
<script type="text/javascript" src="<?= media();?>/js/nav.js"></script>
    <!-- Sidebar menu    -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <div>
                <p class="app-sidebar__user-name"><span class="app-menu__label">Bienvenido: </span></p>
                <p class="app-sidebar__user-name"><span class="app-menu__label"><?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos']; ?></span></p>
            </div>
                        
        </div>

        <ul class="app-menu">

            <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                        <i class="app-menu__icon fa fa-home" aria-hidden="true"></i>
                        <span class="app-menu__label">Inicio</span>
                </a>
                </li> 
            <?php } ?>

            <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon menu-add" aria-hidden="true"></i>
                        <span class="app-menu__label">Asignación de cupos</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/acuposrg"><i class=""></i>Rastras Guazapa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/acuposrj"><i class=""></i>Rastras Jiboa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/acuposcg"><i class=""></i>Camiones Guazapa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/acuposcj"><i class=""></i>Camiones Jiboa</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon menu-edit" aria-hidden="true"></i>
                        <span class="app-menu__label">Ejecución de cupos</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/ecuposrg"><i class=""></i>Rastras Guazapa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/ecuposrj"><i class=""></i>Rastras Jiboa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/ecuposcg"><i class=""></i>Camiones Guazapa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/ecuposcj"><i class=""></i>Camiones Jiboa</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-cogs" aria-hidden="true"></i>
                    <span class="app-menu__label">Configuraciones</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class=""></i>Cargo</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/areas"><i class=""></i>Área</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class=""></i>Usuarios</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/motoristas"><i class=""></i>Motoristas</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/camiones"><i class=""></i>Camiones</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/cantidadcupos"><i class=""></i>Cantidad de cupos</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/cupos"><i class=""></i>Creación de cupos</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/grasesores"><i class=""></i>Rastras Guazapa</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/jrasesores"><i class=""></i>Rastras Jiboa</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/gcasesores"><i class=""></i>Camiones Guazapa</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/jcasesores"><i class=""></i>Camiones Jiboa</a></li>
                </ul>
            </li>
            <?php } ?>
            
            <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-files-o" aria-hidden="true"></i>
                        <span class="app-menu__label">Reportes</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/reportesrg"><i class=""></i>Rastras Guazapa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/reportesrj"><i class=""></i>Rastras Jiboa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/reportescg"><i class=""></i>Camiones Guazapa</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/reportescj"><i class=""></i>Camiones Jiboa</a></li>
                    </ul>
                </li>
            <?php } ?>

            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                    <span class="app-menu__label">Salir</span>
                </a>
            </li>                                        
                           
        </ul>        
        
    </aside>

    
    