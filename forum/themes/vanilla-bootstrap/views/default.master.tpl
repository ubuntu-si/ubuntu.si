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
        <p class="pull-left">{t c="Copyright"} {$smarty.now|date_format:"%Y"} &copy; <a href="https://ubuntu.si">Ubuntu.Si</a></p>
        <i class="footer-icons">
			<a href="http://google.com/+UbuntuSi" target="_blank"><img class="icons" src="https://www.ubuntu.si/forum/uploads/icons/gplus-icon.png" alt="Google+"></a>
			<a href="https://www.facebook.com/UbuntuSlovenija" target="_blank"><img class="icons" src="https://www.ubuntu.si/forum/uploads/icons/facebook-icon.png" alt="Facebook"></a>
			<a href="https://twitter.com/ubuntusi" target="_blank"><img class="icons" src="https://www.ubuntu.si/forum/uploads/icons/twitter-icon.png" alt="Twitter"></a>
			<a href="https://www.youtube.com/UbuntuSlovenija" target="_blank"><img class="icons" src="https://www.ubuntu.si/forum/uploads/icons/youtube-icon.png" alt="youtube"> </a>
			<a href="/?feed=rss2" target="_blank"><img class="icons" src="https://www.ubuntu.si/forum/uploads/icons/rss-icon.png" alt="RSS feed"></a>
		</i>
        <p class="pull-right hidden-xs"><a href="https://github.com/vanilla/vanilla">Vanilla</a> {t c="+"} <a href="https://github.com/kasperisager/vanilla-bootstrap">Bootstrap for Vanilla</a> {t c="="} <i class="InformSprite Heart"></i></p>
        <p class="trademark-notice">Ubuntu in Canonical sta registrirani blagovni znamki podjetja Canonical Ltd.</p>
        {asset name="Foot"}
      </div>
    </footer>

    {event name="AfterBody"}

  </body>
</html>
