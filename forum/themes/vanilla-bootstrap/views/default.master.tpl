<!DOCTYPE html>
<html lang="en" class="sticky-footer-html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {asset name="Head"}
  </head>
  <body id="{$BodyID}" class="{$BodyClass} sticky-footer-body">
    <!-- custom navbar for ubuntu.si-->
    {asset name="WordpressNavbar"}
    <!-- end of ubuntu.si change -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-forum">
            <span class="sr-only">{t c="Toggle navigation"}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-sm" href="{link path="home"}">{logo}</a>
        </div>

        <div class="navbar-collapse collapse navbar-forum">
          <ul class="nav navbar-nav">
            {categories_link}
            {discussions_link}
            {activity_link}
<!--custom_menu = trenutno - označi vse kot prebrano 
            {custom_menu} -->
          </ul>
	{if $User.SignedIn}
            <ul class="nav navbar-nav navbar-right hidden-xs">
              {module name="MeModule"}
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs">
              {profile_link}
              {inbox_link}
              {bookmarks_link}
              {dashboard_link}
              {signinout_link}
            </ul>
          {else}
            <ul class="nav navbar-nav navbar-right">
              {signin_link}
            </ul>
          {/if}

        </div>
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
        <i class="footer-icons hidden-xs">
		<ul class="social-icons">
			<li class="facebook">
				<a href="https://www.facebook.com/UbuntuSlovenija" target="_blank">
					<i class="fa fa-facebook">
						</i>
				</a>
			</li>
			<li class="google-plus">
				<a href="https://google.com/+UbuntuSi" target="_blank">
					<i class="fa fa-google-plus">
					</i>
				</a>
			</li>
			<li class="twitter">
				<a href="https://twitter.com/ubuntusi" target="_blank">
					<i class="fa fa-twitter">
					</i>
				</a>
			</li>
			<li class="youtube">
				<a href="https://www.youtube.com/UbuntuSlovenija" target="_blank">
					<i class="fa fa-youtube">
					</i>
				</a>
			</li>
			<li class="rss">
				<a href="https://www.ubuntu.si/forum/discussions/comments/all/feed.rss" target="_blank">
					<i class="fa fa-rss">
					</i>
				</a>
			</li>
		</ul>	
	</i>
        <p class="pull-left">{t c="Copyright"} {$smarty.now|date_format:"%Y"} &copy; <a href="https://ubuntu.si">Ubuntu.Si</a></p>
	<p class="pull-right hidden-xs"><a href="https://github.com/vanilla/vanilla">Vanilla</a> {t c="+"} <a href="https://github.com/kasperisager/vanilla-bootstrap">Bootstrap for Vanilla</a> {t c="="} <i class="InformSprite Heart"></i></p>
        <p class="trademark-notice">Ubuntu in Canonical sta registrirani blagovni znamki podjetja Canonical Ltd.</p>
        {asset name="Foot"}
      </div>
    </footer>

    {event name="AfterBody"}

  </body>
</html>
