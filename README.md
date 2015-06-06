ubuntu.si
=========

The Community webpage

* Wordpress TO-DO list:

           - [✓] create enigma child theme
           - [✓] remove header
           - [✓] menu should be like forum menu
           - [✓] remove header with breadcrums and
           - [✓] news should be before "our services", we will show 3 latest news and we wont be using any rotation for that
           - [✓] "our services" will include 1. latest forum posts, 2. interesting links (pdfs etc), 3. quick download links for .ISOs.
           - [✓] sidebar color on subpages, archive, categories
           - [✓] disable pingbacks and comments display on pages
           - [✓] adjust comment icon from posts
           - [✓] remove Category: BlaBla from pages
           - [✓] fix date display on subpages, make it orange
           - [ ] update /kaj-je-ubuntu/ http://www.ubuntu.com/desktop, create subpages for features, tour, presentation
           - [ ] update /skupnost/
           - [✓] add a js questionary to /pogosta_vprasanja/ to help users decide which distro they need to download, convert the page to sections
           - [ ] update XSL stylesheet for vodniki
           - [x] AT THE END: disable comments in wordpress options
           - [x] AT THE END: disable portfolio in theme options
           - [x] AT THE END: enable Home blog posts in theme options otherwise
           - [x] locale.php in wp-include needs translated abbreviations in order to our news date to show in slovenian - only if needed
           - [x] AT THE END: increase duration of carousel slideshow to 5s (5000ms) in caroufredsel-element.js
           - [x] AT THE END: In the theme options set path to namizje_ubuntu.png, iskanje_ubuntu.png and programi_ubuntu.png and add text.


* what we have done on the forum side:

         - [✓] import slovenian locale
         - [✓] added locale.php to conf/ for proper time and date format
         - [✓] new design for the new forum (vanilla bootstrap -> united theme - very ubuntu like)
         - [✓] use the next view style (Home page: Categories, Discussion layout: Table Layout, Categories layout: Table Layout) and under 'managecategories' "Display root categories as headings" and "more than 1 level deep"
         - [✓] make a class.ubuntusithemehooks.php in root folder of the vanilla bootstrap theme so we can have a custom .css file for ubuntu.si changes
         - [✓] Move search form into the page-sidebar (.tpl in theme/views/)
         - [✓] we need to use mobile theme from vanilla because it looks much better on smaller resolutions, we achieve that by adding "$Configuration['Garden']['DebugAssets'] = TRUE;" to config.php
         and we add " $Sender->Head->AddCss("/themes/vanilla-bootstrap-2.2.1/design/custom_ubuntu-si.css", "screen");" to class.mobilethemehooks.php
         - [✓] which plugins to use? Add Registration Question,Quotes, All Viewed,ButtonBar, Resized Image LightBox, Split/Merge are a must.Role Titles CommentsRSS because core rss feed creater was not up to date with comments. Need to modify Resolved Discussions plugin!
         - [✓] registration/spam prevention: to use registerbasic.php we need to change our config.php to $Configuration['Garden']['Registration']['Method'] = 'Basic';
         - [✓] add wordpress menu to the forum - we will be using a module with small changes to default.master.tpl
         - [✓] dont forget about EU cookie law msg (no need - dz0ny will do some hash magic -- no need for that either, we added a msg at terms of service)
         - [✓] AT THE END: import database into test env
         - [✓] AT THE END: convert punbb to vanilla forums DB with vanilla export tool
         - [✓] AT THE END: import to vanilla forums from Import menu (note: choose a file, press start, check that file and press start again)
         - [✓] AT THE END: dont forget to set roles and permissions again, untick 'View' profiles for Guests
         - [✓] we need to delete users without roles (unverified users == spammers). First SELECT * FROM `GDN_User` INNER JOIN `GDN_UserRole` ON GDN_User.UserID=GDN_UserRole.UserID WHERE GDN_UserRole.RoleID = 0;
         where we use DELETE `GDN_User' instead of SELECT * and  SELECT * FROM  `GDN_UserRole` WHERE  `RoleID` =0 where se use DELETE `GDN_UserRole` instead of SELECT *
         - [✓] AT THE END: export database (only tables categories, topics, users, perms, forums, groups, ranks, posts) - was not needed
         - [✓] AndrejM fixed view counts with UPDATE GDN_Discussion  INNER JOIN punbb_topics ON punbb_topics.id = GDN_Discussion.DiscussionID SET GDN_Discussion.CountViews = punbb_topics.num_views WHERE punbb_topics.id = GDN_Discussion.DiscussionID
         - [✓] manage all redirects from punbb/ to forum/
         - [✓] there is an title issue with wordpress plugin for embbeded comments - this solves the issue http://vanillaforums.org/discussion/comment/189856/#Comment_189856
         - [✓] AT THE END: install wordpress plugin for vanilla forums embbeded comments! -NOT NEEDED
         - [✓] Andrej M. wrote an awesome wordpress2vanilla plugin for our news system!
         - [✓✓✓] With that we conclude our work on our brand spankin new forum.

* KNOWN Forum ISSUES:
         - [✓]  There is an issue with icheck and checkbox - does not register first click on the checkbox - fixed in 2.3 - workaround can be found here https://gist.github.com/andersju/13a4d0736d599f8a8731
