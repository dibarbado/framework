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
            </ul>
        </div>
    </div>
</nav>

<!-- alert -->
<?php if (isset($_SESSION['ALERT'])) : ?>
    <div class="container-fluid">
        <div id="alert" class="alert alert-<?= $_SESSION['ALERT'][0]; ?> alert-dismissible" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><?= $_SESSION['ALERT'][1]; ?></strong>
        </div>
    </div>
    <?php unset($_SESSION['ALERT']); ?>
<?php endif; ?>
