<?php include_once 'header.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar Campanha</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo site_url('client/campanhas/atualizar') ?>" role="form">
                    <?php if(!empty($info)) : ?>
                        <?php foreach($info as $i) : ?>
                            <div class="form-group">
                                <label>Nome da Campanha</label>
                                <input class="form-control" name="nm_campanha" required="required" value="<?= $i->nm_campanha ?>">
                            </div>
                            <div class="form-group">
                                <label>Assunto</label>
                                <input class="form-control" name="nm_assunto" required="required" value="<?= $i->nm_assunto ?>">
                            </div>
                            <div class="form-group">
                                <label class="">Nome remetente</label>
                                <input class="form-control" name="nm_remetente" required="required" value="<?= $i->nm_remetente ?>">
                            </div>
                            <div class="form-group">
                                <label class="">Email remetente</label>
                                <input type="email" class="form-control" name="nm_email_remetente" required="required" value="<?= $i->nm_email_remetente ?>">
                            </div>
                            <div class="form-group">
                                <label>Listas</label>
                                <select name="cd_lista" class="form-control" required="required">
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
                                <textarea name="ds_mensagem" id="texto1"><?= $i->ds_mensagem ?></textarea>
                                <?php echo display_ckeditor($ckeditor_texto1); ?>
                            </div>
                            <br/>
                            <input type="hidden" name="cd_campanha" value="<?= $i->cd_campanha ?>"/>
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <?php if($i->cd_status == 0) : ?>
                                <input type="hidden" name="ic_status" value="0"/>
                                <button type="submit" name="enviar" class="btn btn-success">Salvar e Enviar</button>
                                <?php else : ?>
                                    <input type="hidden" name="ic_status" value="1"/>
                                    <button type="submit" class="btn btn-success">Salvar e Renviar</button>
                                <?php endif; ?>
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