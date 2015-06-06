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
    // start of Andrej M. code with adjustments ($navbar)
		$baza = mysql_connect($db_host, $db_username, $db_password, TRUE) or die();
	    mysql_select_db($db_name,$baza) or die();
	    mysql_set_charset('utf8',$baza) or die();
	    $sql = "SELECT `ID`,`post_title` FROM `wp_posts` WHERE `post_type`='nav_menu_item' ORDER BY `menu_order`";
	    $q = mysql_query($sql,$baza) or die();
	    if(mysql_num_rows($q) == 0) {die();}

	    while($rows = mysql_fetch_array($q)) {
		//če je post_title prazen, gre za stran/post_title
  			if(strlen($rows['post_title']) == 0) {
  			  $sql = "SELECT `wp_postmeta`.`meta_value`,`wp_posts`.`post_title`,`wp_posts`.`guid` FROM `wp_postmeta` JOIN `wp_posts` ON `wp_postmeta`.`meta_value`=`wp_posts`.`ID` WHERE `meta_key`='_menu_item_object_id' AND `post_id`='".$rows['ID']."'";
  			  $r = mysql_query($sql,$baza) or die(mysql_error());

  			  if(mysql_num_rows($r) == 0) {die();}
  			  $sel_row =  mysql_fetch_array($r);
  			  $navbar .= '<li><a href="' . $sel_row['guid'].'">'. $sel_row['post_title'].'</a></li>' . "\n";
  			}
  			else {
  			  //v nasprotnem primeru gre za custom item, url poberemo iz wp_postmeta
  			  $sql = "SELECT `meta_value` FROM `wp_postmeta` WHERE `meta_key`='_menu_item_url' AND `post_id`='".$rows['ID']."'";
  			  $r = mysql_query($sql,$baza) or die();

  			  if(mysql_num_rows($r) == 0) {die();}
  			  $sel_row =  mysql_fetch_array($r);
  			  $navbar .= '<li><a href="' . $sel_row['meta_value'].'">'.$rows['post_title'].'</a></li>' . "\n";
  			}
	    }
	    mysql_set_charset('latin1',$baza) or die();
	    mysql_close($baza);
	    // end of Andrej M. code
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
  }
}
