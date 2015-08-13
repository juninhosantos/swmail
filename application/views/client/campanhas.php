<?php include_once 'header.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Campanhas</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('client/campanhas/nova') ?>" class="btn btn-primary pull-right">Nova Campanha</a>
                <br />
                <br />
                <br />
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Nome</th>
                            <th>Assunto</th>
                            <th>Lista</th>

                            <th>Status</th>
                            <th width="10%">Ações</th>
                        </tr>
                        <?php if (!empty($campanhas)) : ?>
                            <?php foreach ($campanhas as $item) : ?>
                                <tr>
                                    <td><?php echo $item->nm_campanha ?></td>
                                    <td><?php echo $item->nm_assunto ?></td>
                                    <td><?php echo $item->nm_lista ?></td>

                                    <td><?php echo $item->ic_status == 1 ? "Enviado" : "Aguardando" ?></td>
                                    <td>
                                        <?php if($item->ic_status == 1) : ?>
                                            <a href="<?php echo site_url("client/campanhas/ver/".$item->cd_campanha) ?>" title="Ver"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp;
                                            <a href="<?php echo site_url("client/campanhas/reenviar/".$item->cd_campanha) ?>" title="Reenviar"><i class="glyphicon glyphicon-repeat"></i></a>
                                        <?php else : ?>
                                            <a href="<?php echo site_url("client/campanhas/editar/".$item->cd_campanha) ?>"title='Editar'><i class="fa fa-pencil-square-o"></i></a>
                                        <?php endif; ?>
                                        &nbsp;
                                        <a href="<?php echo site_url("client/campanhas/deletar/".$item->cd_campanha) ?>" onclick="var con = confirm('Tem certeza que deseja deletar?'); if(con){ return true; } return false;" title="Excluir"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>