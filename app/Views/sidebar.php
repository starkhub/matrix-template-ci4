    <?php
    $session = session();
    ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('/') ?>" class="brand-link">
        <span class="brand-text font-weight-light"> <?= !empty(get_global_param('application_name')) ? get_global_param('application_name') : 'Mon application' ?></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url($session->get('avatar')) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $session->get('username') ?></a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-block text-danger mt-2">Se déconnecter</a>
                <!-- Formulaire de déconnexion caché -->
                <form id="logout-form" action="<?= base_url('logout') ?>" method="POST" style="display: none;">
                    <?= csrf_field() ?> <!-- Inclure le jeton CSRF si nécessaire -->
                </form>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php // Configuration for admins only
                if($session->get('role') == "admin"){?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Configuration
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('users') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Utilisateurs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('config') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Paramètres</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php }?>

            </ul>
        </nav>
    </div>
</aside>
