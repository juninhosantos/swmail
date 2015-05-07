<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Assinante</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">


            <form method="post" action="<?php echo site_url('client/assinantes/atualizar') ?>" role="form">
                <?php if (!empty($assinante)) : ?>
                    <?php foreach ($assinante as $item) : ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email_assinante" value="<?php echo $item->email_assinante ?>" required="required">
                            <input type="hidden" name="cd_assinante" value="<?php echo $item->cd_assinante ?>">
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" name="nm_assinante" value="<?php echo $item->nm_assinante ?>" required="required">
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </form>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>