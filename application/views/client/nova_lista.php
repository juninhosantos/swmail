<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nova Lista</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="<?php echo site_url('client/listas/salvar') ?>" role="form">
                <div class="form-group">
                    <label>Nome da Lista</label>
                    <input class="form-control" name="nm_lista" required="required">
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>