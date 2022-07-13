<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <h2>Cadastro de Usuário</h2>
            <small>Preencha o formulário abaixo para cadastrar um novo usuário</small>

            <form name="cadastrar" method="POST" action="<?= URL ?>/UsuariosController/cadastrar">
                <div class="mb-3">
                    <label for="txtNome" class="form-label">Nome: *</label>
                    <input type="text" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>" name="txtNome" id="txtNome" value="<?= $dados['txtNome'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['nome_erro'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="txtEmail" class="form-label">E-mail: *</label>
                    <input type="text" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" name="txtEmail" id="txtEmail" value="<?= $dados['txtEmail'] ?>">
                    <div class="invalid-feedback"><?= $dados['email_erro'] ?></div>
                </div>

                <div class="mb-3">
                    <label for="txtEmail" class="form-label">Tipo usuário: *</label>
                    <select class="form-select <?= $dados['tipoUsuario_erro'] ? 'is-invalid' : '' ?>" name="cboTipoUsuario" id="cboTipoUsuario">
                        <option value="NULL"></option>
                        <?php foreach ($dados['tiposUsuario'] as $tiposUsuario) {
                            //Resgata valor do select 
                            $tiposUsuarioSelected = '';
                            if ($tiposUsuario->id_tipo_usuario == $dados['cboTipoUsuario']) {
                                $tiposUsuarioSelected = 'selected';
                            }
                        ?>
                            <option <?= $tiposUsuarioSelected ?> value="<?= $tiposUsuario->id_tipo_usuario ?>"><?= $tiposUsuario->ds_tipo_usuario ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback"><?= $dados['tipoUsuario_erro'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="txtEmail" class="form-label">Cargo usuário: *</label>
                    <select class="form-select <?= $dados['tipoCargo_erro'] ? 'is-invalid' : '' ?>" name="cboCargoUsuario" id="cboCargoUsuario">
                        <option value="NULL"></option>
                        <?php foreach ($dados['cargoUsuario'] as $cargoUsuario) {
                            //Resgata valor do select 
                            $cargoSelected = '';
                            if ($cargoUsuario->id_cargo == $dados['cboCargoUsuario']) {
                                $cargoSelected = 'selected';
                            }
                        ?>
                            <option <?= $cargoSelected ?> value="<?= $cargoUsuario->id_cargo ?>"><?= $cargoUsuario->ds_cargo ?></option>
                        <?php
                        } ?>
                    </select>
                    <div class="invalid-feedback"><?= $dados['tipoCargo_erro'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="txtSenha" class="form-label">Senha: *</label>
                    <input type="password" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" name="txtSenha" id="txtSenha" value="<?= $dados['txtSenha'] ?>">
                    <div class="invalid-feedback"><?= $dados['senha_erro'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="txtConfirmaSenha" class="form-label">Confirmar Senha: *</label>
                    <input type="password" class="form-control <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>" name="txtConfirmaSenha" id="txtConfirmaSenha">
                    <div class="invalid-feedback"><?= $dados['confirma_senha_erro'] ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>