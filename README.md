ubuntu.si
=========

The Community webpage

TO-DO:

* Wordpress: 

           - design/use a bootstrap theme
           - integration with Vanilla forums (wp news -> forum news)
           
* Forum:
* 
*[✓] means either the work is done or the process described works

         - [✓] export database (only tables categories, topics, users, perms, forums, groups, ranks, posts)
         - [✓] import database into test env
         - [✓] convert punbb to vanilla forums DB with vanilla export tool
         - [✓] import to vanilla forums from Import menu (note: choose a file, press start, check that file and press start again)
         - use the next view style (Home page: Categories, Discussion layout: Table Layout, Categories layout: Table Layout) and under 'managecategories' "Display root categories as headings" and "more than 1 level deep"
         - [✓] new design for the new forum (united theme - very ubuntu like)
         - [✓] import slovenian locale 
         - which plugins to use? BotStop,Quotes, All Viewed are a must have. Button bar is optional.
         - dont forget to set roles and permissions again
         - [✓] registration/spam prevention: to use registerbasic.php we need to change our config.php to $Configuration['Garden']['Registration']['Method'] = 'Basic'; - BOTSTOP TO THE RESCUE. I modified registerbasic.php to update the code.
         - dont forget about EU cookie law msg
         - add wordpress menu to the forum
         - [✓] fix breadcrumbs divider not being displayed
         - [✓] we need to use mobile theme from vanilla because it looks much better on smaller resolutions, we achieve that by adding "$Configuration['Garden']['DebugAssets'] = TRUE;" to config.php 
         and we add " $Sender->Head->AddCss("/themes/vanilla-bootstrap-2.2.1/design/custom_ubuntu-si.css", "screen");" to class.mobilethemehooks.php
         - [✓] make a class.ubuntusithemehooks.php in root folder of the vanilla bootstrap theme so we can have a custom .css file for ubuntu.si changes
         - [✓] Move search form into the page-sidebar (.tpl in theme/views/)
         - [✓] add to a .htaccess file redirect from "punbb/topic/6112/" to "index.php?p=/discussion/6112/"
         - we need to delete users without roles (unverified users == spammers). Hint SELECT * FROM  `GDN_UserRole` WHERE  `RoleID` =0
         
* KNOWN ISSUES:

         - [✓] Form_Addpeople is waaay too wide (used to add people while messaging)
 
 
* FIXED (??) KNOWN ISSUES:
* used a fresh database and that fixed these issues

         - can't visit user's profile page
         - can't see/get/send private messages
         - can't send posts (DateUpdated required(???))
