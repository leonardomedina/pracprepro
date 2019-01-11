<body style="background: url(uncp.jpg); -webkit-background-size:cover;
  background-size: cover;
  background-attachment: fixed;
  font-family: Roboto;"
    class="">

    <div class="container" align=center>
        <div class="col-md-4">
            <div style="background-color: #ecf0f1;">
                <div style="margin-top: 50%;">
                    <h3 class="card-header"> Autenticación </h3>
                    <div class="panel-body" style="background-color: #ccc;">
                        <form action="<?php echo base_url('login/user_login') ?>" method="post" class="form-control-lg">
                            <?php
                    if($error = $this->session->flashdata('mensaje')) : ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="alert alert-dismissible alert-danger">
                                        <h6 align="center">
                                            <?php echo $error; ?>
                                        </h6>
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="username" value="<?php echo set_value('username') ?>"
                                        placeholder="Ingresar Usuario">
                                </div>
                                <div class="col-md-12">
                                    <?php echo form_error('username', '<span class="badge text-danger">','</span>') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" value="<?php echo set_value('password') ?>"
                                        placeholder="Ingresar Contraseña">
                                </div>
                                <div class="col-md-12">
                                    <?php echo form_error('password', '<span class="badge text-danger">','</span>') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input class="btn btn-primary btn-block" type="submit" value="Iniciar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>