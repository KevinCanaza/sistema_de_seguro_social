<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('secciones-homepage/header') ?>

<?php $this->load->view('secciones-homepage/sidebar') ?>

<?php $this->load->view('secciones-homepage/login') ?>

<!-- Información de vision vision -->
<section class="cources_highlight" id="mision-vision-valores">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="latest_blog_carousel">
                     <div class="single_item single_item_first">
                        <div class="blog-img">
                            <a href="#"><img src="<?=base_url()?>principal/images/features/mision.png" alt="" class="img-fluid"></a>
                        </div>
                        <div class="blog_title">
                            <span>look At</span>  
                            <h3><a href="#" title="">Misión</a></h3> 
                            <p>Brindar al estamento estudiantil un servicio de excelencia en atención médica a través de un servicio de alto nivel basado en cualificación, experiencia y tecnología; de óptima calidad y al alcance para toda la población universitaria, con un equipo profesional altamente capacitado y con una gran performance profesional.</p>
                        </div>   
                    </div>

                    <div class="single_item single_item_center">
                        <div class="blog-img">
                            <a href="#" title=""><img src="<?=base_url()?>principal/images/features/vision.png" alt="" class="img-fluid"></a>
                        </div>
                        <div class="blog_title">
                            <span>Go To</span>  
                            <h3><a href="#" title="">Visión</a></h3> 
                            <p>Llegar a ser una unidad médica de referencia en nuestra universidad, siendo reconocido por su atención de alta calidad, en sus diagnósticos y tratamientos realizados.</p>
                        </div>   
                    </div>

                   <div class="single_item single_item_last">
                        <div class="blog-img">
                            <a href="#" title=""><img src="<?=base_url()?>principal/images/features/valores.png" alt="" class="img-fluid"></a>
                        </div>
                        <div class="blog_title">
                            <span>Get Your</span>  
                            <h3><a href="#" title="">Valores</a></h3> 
                             <p>Lorem Ipsum dolor sit amet mollis felis arcu donec viverra. Pede phasellus etiam; Aaecenas vel vici quis dictum rutrum nec nisi et ac penatibus aenean....</p>  
                        </div>   
                    </div>

                </div>
            </div>             
        </div>
    </div>
</section><!-- End Popular Courses Highlight -->





                <!--  -->
                <div class="container-register-form" id="container-register-form-id">                    
                    <div class="form-pre-afiliacion" >
                    <span class="form-pre-afiliacion-close" onclick="registro()">+</span>
                        <p>BIENVENIDO</p>
                            <input placeholder="Ingrese su CI..." class="subscribe-input" name="email" type="email">
                        <br>
                        <div class="submit-btn">ACCEDER</div>
                    </div>
                </div>
                <!--  -->

<?php $this->load->view('secciones-homepage/footer') ?>