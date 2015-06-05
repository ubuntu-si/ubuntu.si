<?php //Template Name:Full-Width Page
get_header(); ?>
<div class="enigma_container">
	<div class="row enigma_blog_wrapper">
	<div class="col-md-12">
		<div class="enigma_blog_full">
			<div class="enigma_blog_post_content">
				<h2>Katero različico Ubuntu-ja naj namestim?</h2>
				<p>Ubuntu obstaja v večih različicah, ki so prilagojene za določeno strojno opremo, ponujajo različne izglede in privzeto nameščene programe, so v koraku s časom ali pa bolj stabilne, itd. Izbira je vedno dobrodošla, vendar lahko zmede uporabnike, ki niso tehnološko podkovani, zato smo pripravili kratek vprašalnik, ki vam bo pomagal izbrati pravo različico Ubuntu-ja.</p>
				<div id="vprasalnik_glavno">
				<form>
					<div class="row" id="vprasalnik_razlicica">
						<h3>Imate pri sistemu raje stabilnost ali najnovejše programe?</h3>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_razlicica" value="lts" checked /> Stabilnost</h3>
								</div>
								<div class="panel-body">
									Različica Ubuntu z dolgotrajno podporo (LTS) daje poudarek na stabilnosti. Pet let od datuma izdaje boste lahko prejemali varnostne popravke in popravke hroščev, ne bo pa novih zmožnosti in novih različic programov z novimi zmožnostmi.
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_razlicica" value="rel" /> Najnovejši programi</h3>
								</div>
								<div class="panel-body">
									Najnovejša različica Ubuntu daje poudarek na najnovejše programe in zmožnosti, zato je lahko manj stabilna od različice LTS. Varnostne popravke in popravke hroščev boste lahko prejemali le 9 mesecev, potem pa je priporočena nadgradnja.
								</div>
							</div>
						</div>
					</div>

					<div class="row" id="vprasalnik_starost">
						<h3>Koliko je star vaš računalnik?</h3>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_starost" value="64bit" checked /> Manj kot 10 let</h3>
								</div>
								<div class="panel-body">
									Vsi novejši procesorji (Athlon 64/Intel Core 2 in novejši) podpirajo 64-bitno različico nabora ukazov x86, ki omogoča bolj učinkovito obdelavo velikih količin pomnilnika RAM. Prednost 64-bitne različice Ubuntu se pokaže, če imate nameščenega veliko pomnilnika (npr. 4 GB) in imate naenkrat odprtih veliko programov. Preizkusi so pokazali, da naj bi bila 64-bitna različica hitrejša tudi, če je pomnilnika malo.
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_starost" value="32bit" /> Več kot 10 let</h3>
								</div>
								<div class="panel-body">
									Računalniki starejši od 10 let večinoma nimajo 64-bitnih procesorjev, saj je bila takrat ta tehnologija šele v povojih, zato na njih ni mogoče poganjati 64-bitne različice Ubuntu. Prve različice 32-bitnega Ubuntu-ja niso omogočale naslavljanje več kot 4 GB pomnilnika, novejši odtisi pa imajo vgrajeno razširitev PAE, ki omogoča naslavljanje do 64 GB pomnilnika.
								</div>
							</div>
						</div>
					</div>

					<div class="row" id="vprasalnik_zmogljivost">
						<h3>Ali vam je bolj pomemben izgled ali hitrost delovanja?</h3>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_zmogljivost" value="izgled" checked /> Izgled</h3>
								</div>
								<div class="panel-body">
									Ubuntu ima kar nekaj namiznih okolij, ki so očem prijazna in se prilagajajo modernim smernicam glede izgleda namiznega okolja. Taka namizna okolja ponavadi zahtevajo več sistemskih virov, hiter procesor in/ali hitro grafično kartico. To možnost lahko izberete tudi, če imate počasnejši računalnik in vas manjša odzivnost namizne okolja ne moti.
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_zmogljivost" value="hitrost" /> Hitrost delovanja</h3>
								</div>
								<div class="panel-body">
									Veliko ljudi uporablja računalnik za nezahtevna pisarniška opravila in brskanje po spletu, zato imajo tudi počasnejše ali malo starejše računalnike. Za njih obstajajo oskubljena namizja, ki so jih razvijalci optimizirali za čimmanjšo porabo virov in hitro delovanje na počasnejših računalnikih. Namizna okolja so sicer odzivna, niso pa tako lepa na pogled.
								</div>
							</div>
						</div>
					</div>

					<div class="row" id="vprasalnik_namizje">
						<h3>Ali želite popolno prilagodljivost programov ali vam je ljubša enostavnost?</h3>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_namizje" value="enostavnost" checked /> Enostavnost</h3>
								</div>
								<div class="panel-body">
									Namizni okolji Unity in GNOME sta namenjeni uporabnikom, ki se ne želijo poglabljati v nastavitve in prilagajati privzeto nameščenih programov. Odlikuje ju enostavnost uporabe, ki gre na račun določenih zmožnosti. Napredno nastavljanje je na voljo preko urejevalnikov nastavitvenih datotek.
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><input type="radio" name="vprasalnik_namizje" value="prilagodljivost" /> Prilagodljivost</h3>
								</div>
								<div class="panel-body">
									Namizno okolje KDE zmogljivo in popolnoma prilagodljivo namizje. Večino nastavljanja namizja in programov lahko opravite kar iz nastavitvenih menijev, ki pa lahko s svojo obsežnostjo določene uporabnike zmedejo. Programi, ki so del KDE so zelo zmogljivi in so primerni za naprednejše uporabnike.
								</div>
							</div>
						</div>
					</div>

					<div id="vprasalnik_izbor">
						<h3>Glede na vaše odgovore vam priporočamo:</h3>
						<img src="/wordpress/wp-content/uploads/dostopen.png" id="ubuntu" class="disabled" />
						<img src="/wordpress/wp-content/uploads/dostopen.png" id="kubuntu" class="disabled" />
						<img src="/wordpress/wp-content/uploads/dostopen.png" id="xubuntu" class="disabled" />
						<img src="/wordpress/wp-content/uploads/dostopen.png" id="lubuntu" class="disabled" />
						<img src="/wordpress/wp-content/uploads/dostopen.png" id="gnome" class="disabled" />
					</div>

					<div id="vprasalnik_krmarjenje">
						<button type="button" class="btn btn-primary enigma_blog_read_btn" id="vprasalnik_nazaj">Nazaj</button>
						<button type="button" class="btn btn-primary enigma_blog_read_btn" id="vprasalnik_naprej">Naprej</button>
						<button type="button" class="btn btn-primary enigma_blog_read_btn" id="vprasalnik_znova">Znova</button>
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
