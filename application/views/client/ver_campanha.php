<?php include_once 'header.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ver Campanha</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <form >
                    <?php if(!empty($info)) : ?>
                        <?php foreach($info as $i) : ?>
                            <div class="form-group">
                                <label>Nome da Campanha</label>
                                <input class="form-control" name="nm_campanha" required="required" value="<?= $i->nm_campanha ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Assunto</label>
                                <input class="form-control" name="nm_assunto" required="required" value="<?= $i->nm_assunto ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="">Nome remetente</label>
                                <input class="form-control" name="nm_remetente" required="required" value="<?= $i->nm_remetente ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="">Email remetente</label>
                                <input type="email" class="form-control" name="nm_email_remetente" required="required" value="<?= $i->nm_email_remetente ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Listas</label>
                                <select name="cd_lista" class="form-control" required="required" disabled>
                                    <?php if (!empty($listas)) : ?>
                                        <?php foreach ($listas as $item) : ?>
                                            <?php if($item->cd_lista == $i->cd_lista) : ?>
                                                <option value="<?php echo $item->cd_lista ?>" selected><?php echo $item->nm_lista ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $item->cd_lista ?>"><?php echo $item->nm_lista ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Template</label>
                                <?= $i->ds_mensagem ?>
                            </div>
                            <br/>
                            <div class="form-group" align="center">
                                <a href="<?php echo site_url("client/campanhas/reenviar/".$i->cd_campanha) ?>" class="btn btn-primary">Editar e Enviar</a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <br/><br/>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>