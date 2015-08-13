<?php include_once 'header.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?= site_url('administrator/cliente/novo') ?>">Novo Cliente</a>
                </div>
                <br/><br/><br/>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Todos os Clientes
                        <!--<div class="pull-right">
                        <form action="<?php echo site_url('administrator/welcome/pesquisar') ?>" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="s" placeholder="Pesquisar" class="form-control" style="height: 30px; margin-top: -5px" />
                                <button class="btn btn-default" style="height: 30px;margin-top: -5px"><i class="fa fa-check"></i></button>
                            </div>
                        </form>
                    </div>-->
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Cód</th>
                                <th>Nome</th>
                                <th>Cota</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                            <?php if (!empty($clientes)) { ?>
                                <?php foreach ($clientes as $c) { ?>
                                    <tr>
                                        <td><?= $c->cd_cliente; ?></td>
                                        <td><?= $c->nm_cliente; ?></td>
                                        <td><?= $c->qt_cota_envio_cliente; ?></td>
                                        <td><?= $c->ic_cliente_ativo == 1 ? "Ativo" : "Inativo"; ?></td>
                                        <td>
                                            <a href="<?= site_url('administrator/cliente/editar/' . $c->cd_cliente); ?>">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="<?= site_url('administrator/cliente/excluir/' . $c->cd_cliente); ?>">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>