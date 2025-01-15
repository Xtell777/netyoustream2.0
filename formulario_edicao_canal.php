<div id="edit-channel-form">
    <h3>Editar Informações do Canal</h3>
    <form id="channel-edit-form" method="post" action="atualizar_canal.php" enctype="multipart/form-data">
        <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($usuarioId); ?>">
        
        <div class="form-group">
            <label for="new-channel-name">Novo Nome do Canal:</label>
            <input type="text" name="nome_canal" id="new-channel-name" placeholder="Digite o novo nome" required>
        </div>
        <div class="form-group">
            <label for="new-channel-image">Nova Imagem do Canal:</label>
            <input type="file" name="imagem_canal" id="new-channel-image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="new-description">Nova Descrição do Canal:</label>
            <textarea name="descricao" id="new-description" rows="4" placeholder="Digite a nova descrição" required></textarea>
        </div>
        <button type="submit">Salvar Alterações</button>
    </form>
</div>