<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nova Campanha</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="<?php echo site_url('client/campanhas/salvar') ?>" role="form">
                <div class="form-group">
                    <label>Nome da Campanha</label>
                    <input class="form-control" name="nm_campanha" required="required">
                </div>
                <div class="form-group">
                    <label>Assunto</label>
                    <input class="form-control" name="nm_assunto" required="required">
                </div>
                <div class="form-group">
                    <label class="">Nome remetente</label>
                    <input class="form-control" name="nm_remetente" required="required">
                </div>
                <div class="form-group">
                    <label class="">Email remetente</label>
                    <input type="email" class="form-control" name="nm_email_remetente" required="required">
                </div>
                <div class="form-group">
                    <label>Listas</label>
                    <select name="cd_lista" class="form-control" required="required">
                        <?php if (!empty($listas)) : ?>
                            <?php foreach ($listas as $item) : ?>
                                <option value="<?php echo $item->cd_lista ?>"><?php echo $item->nm_lista ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Template</label>
                    <textarea name="ds_mensagem" id="texto1"></textarea>
                    <?php echo display_ckeditor($ckeditor_texto1); ?>
                </div>
                <br/>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="submit" name="enviar" class="btn btn-success">Salvar e Enviar</button>
                </div>
                <br/><br/>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>