<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 border-bottom pb-3">Cadastrar</h2>

                    <?php
                    if (isset($_GET['erro'])) {
                        $erro = urldecode($_GET['erro']);
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $erro; ?>
                        </div>
                    <?php
                    }

                    if (isset($_GET['mensagem'])) {
                        $mensagem = urldecode($_GET['mensagem']);
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $mensagem; ?>
                            <br>
                            <a href="?pagina=login" class="alert-link">Clique aqui para fazer login</a>
                        </div>
                    <?php
                    }
                    ?>

                    <form action="public/processa_cadastrar.php" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nome" name="nome" required>
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email" required>
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuário:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 border-bottom pb-4">
                            <label for="senha" class="form-label">Senha:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="senha" name="senha" required>
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-dark btn-block">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
