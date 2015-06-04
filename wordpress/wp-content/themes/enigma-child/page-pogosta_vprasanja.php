<?php //Template Name:Full-Width Page
get_header(); ?>
<div class="enigma_container">
	<div class="row enigma_blog_wrapper">
	<div class="col-md-12">
		<div class="enigma_blog_full">
			<div class="enigma_blog_post_content">
				<h2>Katero različico Ubuntu-ja naj namestim?</h2>
				<p>Ubuntu obstaja v večih različicah, ki so prilagojene za določeno strojno opremo, ponujajo različne videze in
					privzeto nameščene programe, so v koraku s časom ali pa bolj stabilne, itd. Izbira je vedno dobrodošla, vendar lahko zmede uporabnike, ki niso tehnološko podkovani, zato smo pripravili kratek vprašalnik, ki vam bo pomagal izbrati pravo različico Ubuntu-ja.</p>
				<div id="ubuntu_vprasalnik">
				<form>
					<div class="row" id="razlicica">
						<h3>Kaj vam je pri sistemu ljubše?</h3>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="razlicica" value="lts" checked /> Stabilnost</h3>
								</div>
								<div class="panel-body">
									Različica Ubuntu z dolgotrajno podporo (LTS) daje poudarek na stabilnosti. Pet let od datuma izdaje boste lahko prejemali varnostne popravke in popravke hroščev, ne bo pa novih zmožnosti in novih različic programov z novimi zmožnostmi.
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="razlicica" value="rel" /> Najnovejši programi</h3>
								</div>
								<div class="panel-body">
									Najnovejša različica Ubuntu daje poudarek na najnovejše programe in zmožnosti, zato je lahko manj stabilna od različice LTS. Varnostne popravke in popravke hroščev boste lahko prejemali le 9 mesecev, potem pa je priporočena nadgradnja.
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	<?php get_template_part('post','page'); ?>
	</div>
	</div>
</div>	
<?php get_footer(); ?>
