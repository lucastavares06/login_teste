<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 border-bottom pb-3">Login</h2>
                    <form action="public/processa_login.php" method="post">
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
                            <button type="submit" class="btn btn-dark">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>