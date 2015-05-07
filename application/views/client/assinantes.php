<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Assinantes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('client/assinantes/importar') ?>" class="btn btn-primary pull-right">Importar Assinantes</a>
            <br />
            <br />
            <br />
            <table class="table table-striped">
                <tr>
                    <th>Email</th>
                    <th>Nome</th>                    
                    <th>Lista</th>
                    <th width="10%">Ações</th>
                </tr>
                <?php if (!empty($assinantes)) : ?>
                    <?php foreach ($assinantes as $item) : ?>
                        <tr>
                            <td><?php echo $item->email_assinante ?></td>
                            <td><?php echo $item->nm_assinante ?></td>
                            <td><?php echo $item->nm_lista ?></td>
                            <td>
                                <a href="<?php echo site_url("client/assinantes/editar/".$item->cd_assinante) ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                                <a href="<?php echo site_url("client/assinantes/deletar/".$item->cd_assinante) ?>" onclick="var con = confirm('Tem certeza que deseja deletar?'); if(con){ return true; } return false;"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>