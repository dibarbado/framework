<!-- menu -->
<nav class="navbar navbar-inverse">
</nav>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?= Utils::link('home'); ?>" class="navbar-brand">DASHBOARD</a>
        </div>
        <div class="collapse navbar-collapse">
            <form class="navbar-form navbar-right" action="<?= Utils::link('authentication','signin'); ?>" method="post">
                <div class="form-group">
                    <input name="email" type="email" class="form-control validate-tooltip" data-placement="bottom" placeholder="LOGIN">
                    <input name="password" type="password" class="form-control validate-tooltip" data-placement="bottom" placeholder="SENHA">
                </div>
                <button type="submit" class="btn btn-primary">FAZER LOGIN</button>
            </form>
        </div>
    </div>
</nav>

<!-- alert -->
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
