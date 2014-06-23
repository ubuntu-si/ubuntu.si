<!DOCTYPE html>
<html lang="en" class="sticky-footer-html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {asset name="Head"}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="{$BodyID}" class="{$BodyClass} sticky-footer-body">
    <!-- custom navbar for ubuntu.si-->
    {asset name="WordpressNavbar"}
	<!-- end of ubuntu.si change -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">{t c="Toggle navigation"}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{link path="home"}">{logo}</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            {home_link}
            {categories_link}
            {discussions_link}
            {activity_link}
          </ul>
          <ul class="nav navbar-nav navbar-right">
            {if $User.SignedIn}
              {module name="MeModule" CssClass="hidden-xs"}
            {else}
              <li>{link path="signin" text="Prijava" target="current"}</li>
              <li>{link path="entry/register" text="Vpis" target="current"}</li>
            {/if}
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section class="container">
      <div class="row">

        <main class="page-content" role="main">

		  {breadcrumbs}

          {asset name="Content"}
        </main>

        <aside class="page-sidebar" role="complementary">
			<!-- ubuntu.si change-->
			{if InSection(array("CategoryList", "CategoryDiscussionList", "DiscussionList"))}
				<div class="well search-form">{searchbox}</div>
			{/if}
			<!-- end of ubuntu.si change-->
			{asset name="Panel"}
        </aside>

      </div>
    </section>

    <footer class="page-footer sticky-footer">
      <div class="container">
        <p class="pull-left">{t c="Copyright"} {$smarty.now|date_format:"%Y"} &copy; <a href="{link path="home"}">{logo}</a></p>
        <i class="footer-icons">
			<a href="http://google.com/+UbuntuSi" target="_blank"><img class="icons" src="uploads/icons/gplus-icon.png" alt="Google+"></a>
			<a href="https://www.facebook.com/UbuntuSlovenija" target="_blank"><img class="icons" src="uploads/icons/facebook-icon.png" alt="Facebook"></a> 
			<a href="https://twitter.com/ubuntusi" target="_blank"><img class="icons" src="uploads/icons/twitter-icon.png" alt="Twitter"></a>
			<a href="https://www.youtube.com/UbuntuSlovenija" target="_blank"><img class="icons" src="uploads/icons/youtube-icon.png" alt="youtube"> </a>
			<a href="/?feed=rss2" target="_blank"><img class="icons" src="uploads/icons/rss-icon.png" alt="RSS feed"></a>
		</i>
        <p class="pull-right hidden-xs">{t c="Built with"} <i class="InformSprite Heart"></i> {t c="and"} <a href="http://getbootstrap.com">Bootstrap</a></p>
        {asset name="Foot"}
        <p class="copyright-notice">Ubuntu in Canonical sta registrirani blagovni znamki podjetja Canonical Ltd.</p>
      </div>
    </footer>

    {event name="AfterBody"}

  </body>
</html>
