<div id="footer">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3">
				<img src="<?php bloginfo('template_directory')?>/images/logo-footer.png" alt="" />
				<div class="info">
					Avenida Apoquindo 3600, piso 12<br />
					Teléfono (56-2) 353 3300<br />
					Email: info@fundacionbanmedica.cl<br />
					<br />
					Todos los derechos reservado<br />
					Fundación Banmedica ©2014<br />
				</div>
			</div>
			<div class="col-md-4">
				<h1>Website</h1>
				<div id="footermenu">
					<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'topmenu' , 'theme_location' => 'third' ) );?>
				</div>
			</div>
			<div class="col-md-5">
				<h1>Suscríbete al newsletter</h1>
				<?php echo do_shortcode('[contact-form-7 id="54" title="Suscripcion Newsletter"]')?>
			</div>
		</div>
	</div>
</div>

<div class="separator"></div>

</body>
<?php wp_footer()?>
</html>
