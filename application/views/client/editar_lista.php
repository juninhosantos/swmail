<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Lista</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">


            <form method="post" action="<?php echo site_url('client/listas/atualizar') ?>" role="form">
                <?php if (!empty($listas)) : ?>
                    <?php foreach ($listas as $item) : ?>
                        <div class="form-group">
                            <label>Nome da Lista  <small>(50 caracteres)</small></label>
                            <input class="form-control" maxlength="50" value="<?php echo $item->nm_lista ?>" name="nm_lista" required="required">
                            <input type="hidden" name="cd_lista" value="<?php echo $item->cd_lista ?>">
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </form>
            <br><br><br>
            <a href="<?php echo site_url('client/listas') ?>" class="btn btn-link"> <- Voltar</a>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>