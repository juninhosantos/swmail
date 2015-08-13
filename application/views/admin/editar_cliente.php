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
                <form method="post" action="<?php echo site_url('administrator/cliente/atualizar') ?>" role="form">
                    <?php if(!empty($info)) : ?>

                        <h3>Dados do responsável</h3>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" name="nm_cliente" required="required" value="<?= $info->nm_cliente ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="nm_email_cliente" required="required" value="<?= $info->nm_email_cliente ?>">
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input class="form-control" name="nm_cpf_cliente" required="required" value="<?= $info->nm_cpf_cliente ?>">
                        </div>
                        <div class="form-group">
                            <label>Senha <small>(mínimo 8 dígitos)</small></label>
                            <input type="password" class="form-control" name="nm_senha_cliente" minlenght="8"  value="">
                        </div>
                        <h3>Dados da empresa</h3>
                        <div class="form-group">
                            <label class="">Razão Social</label>
                            <input type="texte" class="form-control" name="nm_razao_social" required="required" value="<?= $info->nm_razao_social ?>">
                        </div>
                        <div class="form-group">
                            <label class="">Endereço</label>
                            <input type="texte" class="form-control" name="nm_endereco_cliente"  value="<?= $info->nm_endereco_cliente ?>">
                        </div>
                        <div class="form-group">
                            <label class="">CNPJ</label>
                            <input type="texte" class="form-control" name="nm_cnpj_cliente"  value="<?= $info->nm_cnpj_cliente ?>">
                        </div>
                        <div class="form-group">
                            <label class="">Telefone</label>
                            <input type="text" class="form-control" name="cd_tel_cliente" required="required" value="<?= $info->cd_tel_cliente ?>">
                        </div>
                        <h3>Dados do Pagamento</h3>
                        <div class="form-group">
                            <label class="">Nº Cartão de Crédito</label>
                            <input type="text" class="form-control" name="cd_cartao_cliente" required="required" value="<?= $info->cd_cartao_cliente ?>">
                        </div>
                        <div class="form-group">
                            <label class="">Validade do Cartão</label>
                            <input type="text" class="form-control" name="dt_validade_cartao_cliente" required="required" value="<?= $info->dt_validade_cartao_cliente ?>">
                        </div>
                        <h3>Informações da conta</h3>
                        <div class="form-group">
                            <label>Cota contratada</label>
                            <select class="form-control" name="qt_cota_envio_cliente" id="cota">
                                <option value="10">10 envios</option>
                                <option value="25">25 envios</option>
                                <option value="30">30 envios</option>
                                <option value="40">40 envios</option>
                                <option value="50">50 envios</option>
                            </select>
                            <script> $('#cota option[value=<?= $info->qt_cota_envio_cliente; ?>]').attr('selected','selected'); </script>
                        </div>
                        <!--<div class="form-group">
                            <label>Cota restante</label>
                            <input type="text" class="form-control"  value="<?= $info->qt_cota_envio_cliente ?>" disabled/>
                        </div>-->
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ic_cliente_ativo" value="1">
                                    Ativo
                                </label>
                                <label>
                                    <input type="radio" name="ic_cliente_ativo" value="0">
                                    Inativo
                                </label>
                            </div>
                            <script> $("input[type=radio][value='<?= $info->ic_cliente_ativo ?>']").attr("checked","checked"); </script>
                        </div>
                        <br/>
                        <input type="hidden" name="cd_cliente" value="<?= $info->cd_cliente ?>"/>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    <?php endif; ?>
                    <br/><br/>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once 'footer.php'; ?>