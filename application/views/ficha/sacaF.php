<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('secciones-homepage/header') ?>

<?php $this->load->helper('usuario/ajax_sacar_ficha') ?>


<?php $this->load->view('secciones-homepage/login') ?>

<div style="" class="contenido col-md-6 offset-md-3">
      
    <div class="titulo-formulario ">
        <h4 class="mx-auto" style=" ">EMISION DE FICHA DE ATENCION MEDICA</h4> 
    </div>
    <form method="POST" id="formulario" accept-charset="UTF-8" class="formulario" style="" enctype="multipart/form-data"><input name="_token" type="hidden" value="bRcaYNqdWXtyqHrHQapqHi9ZJa3ECLnb5d8URkWa">
        <div class="form-group row">
            <label for="nombre" class="col-sm-3 col-form-label">Cédula de identidad*:</label>
            <div class="col-sm-9">
                <input class="form-control" placeholder="Ingrese su CI" style="margin-bottom: 0px;" name="ci" type="text" id="ci">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Doctor:*</label>
            <div class="col-sm-9">
                <select name="doctores" id="doctor" class="form-control">
					<option value="">-- Seleccione un doctor--</option>
				</select>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Dias laborales:*</label>
            <div class="col-sm-9">
                <select name="dias" id="dias" class="form-control">
					<option value="">-- Seleccione un dia--</option>
				</select>
            </div>
        </div>

        <div style="text-align: center;"> 
            <button type="submit" name="ingresar" id="btnIngresar" value="Entrar" class="btn btn-sm btn-round btn-primary">Ingresar</button>
            <button type="button" class="btn btn-sm  btn-round btn-success" onclick="window.location.href='<?=base_url('indexController/ficha')?>'">Cancelar</button>
            <button type="reset" class="btn btn-sm btn-round btn-dark ">Limpiar</button>
        </div>
    </form>
</div>
<hr>

<?php $this->load->view('secciones-homepage/footer') ?>
