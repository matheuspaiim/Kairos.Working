<?php
require_once 'loginhead.php';
?>

<body>

    <!-- Modal -->


    <form class="form-horizontal col-sm-offset-3 col-sm-7" action="../controle/logar.php" method="POST">
        <div class="col-sm-offset-3 col-sm-10">
            <h1 class="kw-modal-h1">
                Login administrativo
            </h1>
        </div>
        <label for="inputEmail3" class="control-label">Email</label>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
            </div>
        </div>
        <label for="inputPassword3" class=" control-label">Senha</label>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="senha" placeholder="Senha">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-2">
            <button type="submit" class="btn btn-primary btn-md active col-sm-offset-1 col-sm-9">Entrar</button>
            </div>
        </div>
    </form>
    
</body>

</html>