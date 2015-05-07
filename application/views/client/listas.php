<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Listas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('client/listas/nova') ?>" class="btn btn-primary pull-right">Nova Lista</a>
            <br />
            <br />
            <br />
            <table class="table table-striped">
                <tr>
                    <th>Cód</th>
                    <th>Nome</th>
                    <th width="10%">Ações</th>
                </tr>
                <?php if (!empty($listas)) : ?>
                    <?php foreach ($listas as $item) : ?>
                        <tr>
                            <td><?php echo $item->cd_lista ?></td>
                            <td><?php echo $item->nm_lista ?></td>
                            <td>
                                <a href="<?php echo site_url("client/listas/editar/".$item->cd_lista) ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                                <a href="<?php echo site_url("client/listas/deletar/".$item->cd_lista) ?>" onclick="var con = confirm('Tem certeza que deseja deletar?'); if(con){ return true; } return false;"><i class="fa fa-times"></i></a>
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