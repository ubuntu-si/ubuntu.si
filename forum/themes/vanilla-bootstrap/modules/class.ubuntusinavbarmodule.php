<?php if (!defined('APPLICATION')) exit();
/**
 * for testing purposes this is currently static navbar
 */
class UbuntuSiNavbarModule extends Gdn_Module {
  public function __construct($Sender = '') {
    parent::__construct($Sender);
    $this->SetData('Menu', 
    '<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
	
			 <!-- OPTIONAL LOGO!
			<div class="navbar-header">
				<a class="navbar-brand" id="logo" href="{link path="home"}">{logo}</a>
			</div>
			-->
			<!--  #branding -->
			<ul class="nav navbar-nav">
			<!-- prikrojeni meni -->
			
				<li><a href="/">Novice</a></li>
				<li><a href="/punbb/" class="Selected">Forum</a></li>
				<li><a href="http://www.ubuntu.si/wordpress/?page_id=4">Kaj je Ubuntu?</a></li>
				<li><a href="http://www.ubuntu.si/wordpress/?page_id=2">Pogosta vprašanja</a></li>
				<li><a href="http://www.ubuntu.si/wordpress/?page_id=9">Skupnost</a></li>
				<li><a href="http://www.ubuntu.si/wordpress/?page_id=7">Povezave</a></li>
			</ul>
		</div>
	</nav>');
  }
  public function AssetTarget() {
    return 'WordpressNavbar';
  }
  public function ToString() {
    $Menu = $this->Data('Menu');
    if($Menu) {
      return $Menu;
    }
  }
}
