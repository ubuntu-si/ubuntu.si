<?php get_header(); ?>
<div class="container">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-12 hc_404_error_section">
			<div class="error_404">
				<h1><?php _e('Strani ni bilo mogoče najti','weblizar'); ?></h1>
				<strong><?php echo $_SERVER['REMOTE_ADDR']; ?>@ubuntu.si:~$</strong> wget https://www.ubuntu.si<?php echo $_SERVER['REQUEST_URI']; ?><br />
				--<?php echo date('Y-m-d G:i:s') ?>--&nbsp;&nbsp;https://www.ubuntu.si<?php echo $_SERVER['REQUEST_URI']; ?><br />
				Razreševanje ubuntu.si (ubuntu.si) ... <?php echo $_SERVER['SERVER_ADDR']; ?><br />
				Povezovanje na ubuntu.si (ubuntu.si)|<?php echo $_SERVER['SERVER_ADDR']; ?>|:<?php echo $_SERVER['SERVER_PORT']; ?> ... povezano.<br />
				HTTP zahteva poslana, čakanje na odgovor ... 404 Not Found<br />
				<?php echo date('Y-m-d G:i:s') ?> NAPAKA 404: Not Found.<br />
				Vsebine žal ni bilo mogoče najti! Poskusite jo poiskati preko vgrajenega iskalnika.<br />
				<form id="searchform" method="get" action="https://www.ubuntu.si/">
				<strong><?php echo $_SERVER['REMOTE_ADDR']; ?>@ubuntu.si:~$</strong>&nbsp;find / -iname <input id="s" name="s" type="text" placeholder="Vnesite iskalni pojem" size="32" tabindex="1" />2>/dev/null&nbsp; <input id="searchsubmit" name="searchsubmit" type="submit" value="Išči" tabindex="2" />
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
