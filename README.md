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
         - which plugins to use?
         - dont forget to set roles and permissions again
         - registration: recaptcha or something else? -> something else, write a plugin that asks a simple question in slovenian (check registerapproval.php for hooks)
         - dont forget about EU cookie law msg

 
 
* CURRENT KNOWN ISSUES:

         - can't visit user's profile page
         - can't see/get notifications
         - can't see/get/send private messages
         - can't send posts (DateUpdated required(???))
