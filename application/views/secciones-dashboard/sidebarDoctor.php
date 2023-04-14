<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?=base_url('dashboard/')?>img/logo/logo.png" alt="" /></a>
                <strong><img src="<?=base_url('dashboard/')?>img/logo/logosn.png" alt="" /></strong>
                <h2 class="tittle-admin">Seguro Social</h2>
            </div>
			<div class="nalika-profile">
				<div class="profile-dtl">
					<a href="#"><img src="<?=base_url('dashboard/')?>img/notification/4.jpg" alt="" /></a>
					
                    <h2>Admin <span class="min-dtn">Das</span></h2>
				</div>
			</div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="disable">
                            <a class="has-arrow" href="#">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Estudiantes</span>
							</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <?php $this->load->view('secciones-dashboard/sidebar-options-doctor') ?>
                            </ul>
                        </li>
                        <li class="disable">
                            <a class="has-arrow" href="#">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Atención</span>
							</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <?php $this->load->view('secciones-dashboard/sidebar-options-usuarios') ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>