<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $conn = new DB();
    $id = $_SESSION[__MODULE__]['USER_DATA']['id'];
    $results = $conn->get_results("select id, firstname, lastname, phonenumber, email, password, birthday, gender, created, modified from sellers where id = ".$id);
    $record = reset($results);
?>
    <!DOCTYPE html>
    <html>
        <head>
            <?php include __HEAD__; ?>
        </head>
        <body>
            <?php include __HEADER__; ?>
            <div class="container" style="width: 100%; max-width: 700px;">
                <h2>EDITAR CONTA</h2>
                <br>
                <form action="<?= Utils::link('sellers','edit'); ?>" method="post">
                    <div class="form-group">
                        <label for="firstname">NOME</label>
                        <input type="text" name="firstname" class="form-control validate-tooltip" data-placement="left" value="<?= $record['firstname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastname">SOBRENOME</label>
                        <input type="text" name="lastname" class="form-control validate-tooltip" data-placement="bottom" value="<?= $record['lastname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">CELULAR</label>
                        <input type="text" name="phonenumber" class="form-control validate-tooltip" data-placement="left" value="<?= $record['phonenumber']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" name="email" class="form-control validate-tooltip" data-placement="left" value="<?= $record['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="birthday">ANIVERSÁRIO</label>
                        <input type="text" name="birthday" class="form-control validate-tooltip" data-placement="left" value="<?= Utils::dateFormat($record['birthday'],'d/m/y'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">SEXO</label>
                        <select name="gender" class="form-control validate-tooltip" data-placement="left">
                            <option value=""></option>
                            <option value="f" <?= ($record['gender'] == 'f') ? 'selected' : '' ; ?>>feminino</option>
                            <option value="m" <?= ($record['gender'] == 'm') ? 'selected' : '' ; ?>>masculino</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">EDITAR CONTA</button>
                </form>
            </div>
            <br>
            <?php include __FOOT__; ?>
        <script src="<?= __JS__.'jquery.maskedinput.min.js'; ?>"></script>
        <script>
            $(function(){
                // masked input
                $('input[name="phonenumber"]').mask('+55 99 9999 9999?9')
                $('input[name="birthday"]').mask('99/99/9999')
            })
        </script>
        </body>
    </html>
<?php
} else {
    // exit($_POST['firstname']);
    $id = $_SESSION[__MODULE__]['USER_DATA']['id'];
    $conn = new DB();
    $values = [
        'firstname'=>$_POST['firstname'],
        'lastname'=>$_POST['lastname'],
        'phonenumber'=>$_POST['phonenumber'],
        'email'=>$_POST['email'],
        'birthday'=>Utils::dateFormat($_POST['birthday']),
        'gender'=>$_POST['gender'],
    ];
    $where = ['id' => $id];
    $results = $conn->update('sellers',$values,$where,1);
    if ($results) {
        $_SESSION['ALERT'] = ['success','Cadastro editado com sucesso!'];
        $results = $conn->get_results("select id, firstname, lastname, phonenumber, email, password, birthday, gender, created, modified from sellers where id = ".$id);
        $_SESSION[__MODULE__]['USER_DATA'] = reset($results);
    } else {
        $_SESSION['ALERT'] = ['danger','Cadastro não editado tente novamente!'];
    }
    header('location: '.$_SERVER['HTTP_REFERER']);
    exit;
}
