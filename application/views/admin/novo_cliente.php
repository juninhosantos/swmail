<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cliente</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Cliente
                </div>
                <div class="panel-body">

                    <form action="<?php echo site_url('administrator/cliente/salvar') ?>">
                        <h3>Informações do Contato</h3>
                        <br />

                        <div class="form-group col-md-12">
                            <label for="">Nome</label>
                            <input type="text" name="nm_cliente" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Email</label>
                            <input type="text" name="nm_email" class="form-control" id="" placeholder="">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="">CPF</label>
                            <input type="text" name="nm_cpf" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefone</label>
                            <input type="text" name="cd_telefone" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Endereço</label>
                            <input type="text" name="nm_endereco" class="form-control" id="" placeholder="">
                        </div>
                        
                        <div class="col-md-12"><hr></div>

                        <h3>Informações da empresa</h3>
                        <br />
                        <div class="form-group col-md-4">
                            <label for="">Razão Social</label>
                            <input type="text" name="nm_razao_social" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">CNPJ</label>
                            <input type="text" name="cd_cnpj_cliente" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Cota de Assinantes</label>
                            <select name="qt_cota_envio_cliente" class="form-control">
                                <option value="10">10 assinantes</option>
                                <option value="20">20 assinantes</option>
                                <option value="25">25 assinantes</option>
                                <option value="30">30 assinantes</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12"><hr></div>

                        <h3>Informações de cobrança</h3>
                        <br />
                        <div class="form-group col-md-4">
                            <label for="">Número do Cartão</label>
                            <input type="text" name="cd_cartao_cliente" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Validade</label>
                            <input type="text" name="cd_cnpj_cliente" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Código de Segurança</label>
                            <input type="password" name="cd_cnpj_cliente" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group col-md-12 ">
                            <br><br>
                            <button class="btn btn-success btn-lg pull-right">Salvar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>