<!-- menu -->
<nav class="navbar navbar-inverse">
</nav>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu-collapsed">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?= Utils::link('home'); ?>" class="navbar-brand">DASHBOARD</a>
        </div>
        <div class="collapse navbar-collapse" id="top-menu-collapsed">
            <ul class="nav navbar-nav">
                <li class="<?= (Utils::getController() == 'products') ? 'active' : null; ?>">
                    <a href="<?= Utils::link('products'); ?>">PRODUTOS</a>
                </li>
                <li class="<?= (Utils::getController() == 'invoices') ? 'active' : null; ?>">
                    <a href="<?= Utils::link('invoices'); ?>">NOTAS FISCAIS</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PERFIL<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= Utils::link('sellers','edit'); ?>">Conta</a></li>
                        <li class="divider"></li>
                        <li><a>Configurações</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Utils::link('authentication','signout'); ?>">
                        <span class="glyphicon glyphicon-log-out"></span>
                        SAIR
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- alert -->
<div id="container-alert">
    <?php if (isset($_SESSION[__MODULE__]['ALERT'])) : ?>
        <div class="container-fluid">
            <div id="alert" class="alert alert-<?= $_SESSION[__MODULE__]['ALERT'][0]; ?> alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $_SESSION[__MODULE__]['ALERT'][1]; ?></strong>
            </div>
        </div>
        <?php unset($_SESSION[__MODULE__]['ALERT']); ?>
    <?php endif; ?>
</div>
<!-- alert -->
