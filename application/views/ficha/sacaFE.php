<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('secciones-homepage/header') ?>
<?php $this->load->view('secciones-homepage/login') ?>


<div style="" class=" contenido col-md-6 offset-md-3 ">
    <div class="titulo-formulario ">
      <h4 class="mx-auto" style=" ">EMISION DE FICHA DE ATENCION MEDICA ESTUDIANTIL</h4> 
    </div>

    <form method="POST" action="http://200.107.241.42:8083/ficha/loginfissue" accept-charset="UTF-8" class="formulario" style="" enctype="multipart/form-data"><input name="_token" type="hidden" value="R617BoQQ0vCA8EwhoSdYXOGwCIJnsoYL804YZB8B">

        <div class="form-group row">
            <label for="nombre" class="col-sm-3 col-form-label">Canet Univ*:</label>
            <div class="col-sm-9">
                <input class="form-control" placeholder="Ingrese su Carnet Universitario" style="margin-bottom: 0px;" name="nombre" type="text" id="nombre">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Contraseña:*</label>
            <div class="col-sm-9">
                <input class="form-control" id="fecha" placeholder="Contraseña" style="margin-bottom: 0px;" name="password" type="password" value="">
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha" class="col-sm-3 col-form-label" id="fecha" placeholder="fecha de consutla" style="margin-bottom: 0px;">Fecha Consulta:*</label>
            <div class="col-sm-9">
                <input class="form-control" data-inputmask="'mask': '99/99/9999'" name="fecha" type="date" value="2023-04-12" id="fecha">
            <!--<input class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '99/99/9999'" name="fecha_nacc" type="datetime-local" value="2023-04-12T10:24:16Carbon\Carbon::now()">
            -->
            </div>
        </div>



        <div style="text-align: center;"> 
            <button type="submit" name="ingresar" value="Entrar" onclick="myFunction()" class="btn btn-sm btn-round btn-primary">Ingresar</button>
            <button type="button" class="btn btn-sm  btn-round btn-success" onclick="window.location.href='<?=base_url('indexController/ficha')?>">Cancelar</button>
            <button type="reset" class="btn btn-sm btn-round btn-dark ">Limpiar</button>
        </div>
    </form>
</div>
<hr>



<?php $this->load->view('secciones-homepage/footer') ?>