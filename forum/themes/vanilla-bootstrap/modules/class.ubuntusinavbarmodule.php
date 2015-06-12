<?php if (!defined('APPLICATION')) exit();
/**
 * for testing purposes this is currently static navbar
 */
class UbuntuSiNavbarModule extends Gdn_Module {
  public function __construct($Sender = '') {
	parent::__construct($Sender);
	$db_host = Gdn::Config('Database.Host');
	$db_name = Gdn::Config('Database.Name');
	$db_username = Gdn::Config('Database.User');
	$db_password = Gdn::Config('Database.Password');

	$navbar = <<<EOD
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		 <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-wp">	    <span class="sr-only">{t c="Toggle navigation"}</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    </button>
	           <a class="navbar-brand hidden-sm" id="logo" href="/"></a>
		 </div>

		<div class="navbar-collapse collapse navbar-wp">
		<!--  #branding -->
                   <ul class="nav navbar-nav">
		   <!-- prikrojeni meni -->
EOD;
		try {
      $baza = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
      $baza->exec("set names utf8");
      $baza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      foreach ($baza->query("SELECT ID,post_title FROM wp_posts WHERE post_type='nav_menu_item' ORDER BY menu_order") as $predmet) {
         if($predmet['post_title'] == '') {
          //če je post_title prazen, gre za stran/post_title
          $sql = $baza->prepare("SELECT guid, post_title FROM wp_postmeta JOIN wp_posts ON wp_postmeta.meta_value=wp_posts.ID WHERE meta_key='_menu_item_object_id' AND post_id=:post_id");
          $sql->bindValue(':post_id', $predmet['ID'], PDO::PARAM_INT);
          $sql->execute();
          $rezultat = $sql->fetch();
          $navbar .= '<li><a href="' . $rezultat['guid'].'">'. $rezultat['post_title'].'</a></li>' . "\n";
        } else {
          //v nasprotnem primeru gre za custom item, url poberemo iz wp_postmeta
          $sql = $baza->prepare("SELECT `meta_value` FROM `wp_postmeta` WHERE `meta_key`='_menu_item_url' AND `post_id`= :post_id");
          $sql->bindValue(':post_id', $predmet['ID'], PDO::PARAM_INT);
          $sql->execute();
          $rezultat = $sql->fetch();
          $navbar .= '<li' . (($rezultat['meta_value'] == '/forum/') ? ' class="active"' : '') . '><a href="' . $rezultat['meta_value'] . '">' . $predmet['post_title'].'</a></li>' . "\n";
        }
      }
    } catch (Exception $e) {
      // napaka med vzpostavljanjem povezave
      Gdn_ExceptionHandler($e);
    }

	$navbar .= <<<EOD
         </ul>
     </div>
    </div>
  </nav>
EOD;
    $this->SetData('Menu', $navbar);
  }
  public function AssetTarget() {
    return 'WordpressNavbar';
  }
  public function ToString() {
    $Menu = $this->Data('Menu');
    if($Menu) {
      return $Menu;
    }
    return null;
  }
}
