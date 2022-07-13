<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-body">

            <?= Alertas::mensagem('usuario'); ?>

            <h2>Login de Usuário</h2>
            <small>Preencha o formulário abaixo para realizar o login</small>

            <form name="cadastrar" method="POST" action="<?= URL ?>/UsuariosController/login">
                <div class="mb-3">
                    <label for="txtEmail" class="form-label">E-mail: *</label>
                    <input type="text" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" name="txtEmail" id="txtEmail" value="<?= $dados['txtEmail'] ?>">
                    <div class="invalid-feedback"><?= $dados['email_erro'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="txtSenha" class="form-label">Senha: *</label>
                    <input type="password" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" name="txtSenha" id="txtSenha">
                    <div class="invalid-feedback"><?= $dados['senha_erro'] ?></div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>