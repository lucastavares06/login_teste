<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 border-bottom pb-3">Perfil de <?php echo $usuarioNome; ?></h2>
                    <div class="mb-3">
                        <strong>ID do Usuário:</strong>
                        <p class="form-control-plaintext"><?php echo $usuarioId; ?></p>
                    </div>
                    <div class="mb-3">
                        <strong>Nome de Usuário:</strong>
                        <p class="form-control-plaintext"><?php echo $usuarioUsuario; ?></p>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="form-control-plaintext"><?php echo $usuarioEmail; ?></p>
                    </div>
                    <!-- Adicione outros campos do perfil conforme necessário -->
                </div>
            </div>
        </div>
    </div>
</div>