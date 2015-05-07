<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Importar Assinantes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="<?php echo site_url('client/assinantes/salvar') ?>" role="form">
                <div class="form-group">
                    <label>Copie e Cole os emails, linha por linha.</label><br/>
                    <br />Ex.: teste@teste.com.br,Teste<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;teste2@teste2.com.br,Teste2
                    <br /><br />
                    <textarea class="form-control" name="assinantes" rows="15" required="required"></textarea>
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
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>