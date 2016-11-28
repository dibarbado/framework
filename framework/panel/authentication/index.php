<!DOCTYPE html>
<html>
    <head>
        <?php include __HEAD__; ?>
    </head>
    <body>
        <?php include __LAYOUTS__.'header-authentication.php'; ?>
        <div class="container">
            <div class="visible-xs"><!-- login-for-mobile start -->
                <div id="div-do-login">
                    <h2>FAZER LOGIN</h2>
                    <br>
                    <form action="<?= Utils::link('authentication','signin'); ?>" method="post">
                        <div class="form-group">
                            <label for="email">LOGIN</label>
                            <input type="email" name="email" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="password">SENHA</label>
                            <input type="password" name="password" class="form-control validate-tooltip">
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">FAZER LOGIN</button>
                    </form>
                    <br>
                    <button id="btn-create-new-account" type="button" class="btn btn-success center-block">CRIAR NOVA CONTA</button>
                </div>
            </div><!-- login-for-mobile end -->
            <div class="row">
                <div id="div-create-new-account" class="hidden-lg hidden-md col-xs-12 col-sm-12" style="display: none;"><!-- new-account-for-mobile start -->
                    <h2>CRIAR CONTA</h2>
                    <br>
                    <form action="<?= Utils::link('authentication','signup'); ?>" method="post">
                        <div class="form-group">
                            <label for="firstname">NOME</label>
                            <input type="text" name="firstname" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="lastname">SOBRENOME</label>
                            <input type="text" name="lastname" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">CELULAR</label>
                            <input type="text" name="phonenumber" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="email" name="email" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="password">SENHA</label>
                            <input type="password" name="password" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="birthday">ANIVERSÁRIO</label>
                            <input type="text" name="birthday" class="form-control validate-tooltip">
                        </div>
                        <div class="form-group">
                            <label for="gender">SEXO</label>
                            <input type="text" name="gender" class="form-control validate-tooltip">
                        </div>
                        <button type="submit" class="btn btn-primary center-block" style="width: 100%;">CRIAR CONTA</button>
                    </form>
                    <br>
                    <button id="btn-do-login" type="button" class="btn btn-success center-block">FAZER LOGIN</button>
                </div><!-- new-account-for-mobile end -->
                <div class="visible-lg visible-md col-lg-5 col-md-6 pull-right"><!-- new-account-for-desktop start -->
                    <br>
                    <h2>CRIAR CONTA</h2>
                    <br>
                    <form action="<?= Utils::link('authentication','signup'); ?>" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="firstname">NOME</label>
                                    <input type="text" name="firstname" class="form-control validate-tooltip" data-placement="left">
                                </div>
                                <div class="col-lg-6">
                                    <label for="lastname">SOBRENOME</label>
                                    <input type="text" name="lastname" class="form-control validate-tooltip" data-placement="bottom">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">CELULAR</label>
                            <input type="text" name="phonenumber" class="form-control validate-tooltip" data-placement="left">
                        </div>
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="email" name="email" class="form-control validate-tooltip" data-placement="left">
                        </div>
                        <div class="form-group">
                            <label for="password">SENHA</label>
                            <input type="password" id="password" name="password" class="form-control validate-tooltip" data-placement="left">
                        </div>
                        <div class="form-group">
                            <label for="check_password">CONFIRMAR SENHA</label>
                            <input type="password" id="check_password" name="check_password" class="form-control validate-tooltip" data-placement="left">
                        </div>
                        <div class="form-group">
                            <label for="birthday">ANIVERSÁRIO</label>
                            <input type="text" name="birthday" class="form-control validate-tooltip" data-placement="left">
                        </div>
                        <div class="form-group">
                            <label for="gender">SEXO</label>
                            <select name="gender" class="form-control validate-tooltip" data-placement="left">
                                <option value=""></option>
                                <option value="f">feminino</option>
                                <option value="m">masculino</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">CRIAR CONTA</button>
                    </form>
                </div><!-- new-account-for-desktop end -->
            </div>
            <br>
        </div>
        <?php include __FOOT__; ?>
        <script src="<?= __JS__.'jquery.maskedinput.min.js'; ?>"></script>
        <script>
            $(function(){
                // masked input
                $('input[name="phonenumber"]').mask('+55 99 9999 9999?9')
                $('input[name="birthday"]').mask('99/99/9999')
                
                // check password on submit
                $('button[type="submit"]').on('click',function(event){
                    if ($('#password').val() != $('#check_password').val()) {
                        event.preventDefault()
                        $('#check_password').tooltip('destroy')
                        $('#check_password').tooltip({title:'as senhas devem ser iguais!',trigger:'manual',placement:'left'})
                        $('#check_password').tooltip('show')
                    }
                })

                // authentication
                $('#btn-create-new-account').on('click',function(){
                    $('#div-create-new-account').css('display','block')
                    $('#div-do-login').css('display','none')
                })
                $('#btn-do-login').on('click',function(){
                    $('#div-do-login').css('display','block')
                    $('#div-create-new-account').css('display','none')
                })
            })
        </script>
    </body>
</html>
