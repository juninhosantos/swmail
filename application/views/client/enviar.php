<?php include_once 'header.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Enviando Campanha</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <iframe src="<?php echo site_url('client/campanhas/sendmail/'.$id) ?>" frameborder="0" width="100%" style="height: auto" height="100%"></iframe>
        </div>
    </div>
    <!-- /.row -->

</div>
    <!-- /#page-wrapper -->

<script>
    $(document).ready(function(){
        var h = $(window).height();
        $('iframe').css('minHeight',h-(h*0.4));
    })
</script>

<?php include_once 'footer.php'; ?>
