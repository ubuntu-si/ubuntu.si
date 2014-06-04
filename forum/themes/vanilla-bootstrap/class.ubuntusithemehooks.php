<?php if (!defined('APPLICATION')) exit();
include_once('modules/class.ubuntusinavbarmodule.php');
/*
Copyright 2008, 2009 Vanilla Forums Inc.
This file is part of Garden.
Garden is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Garden is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Garden.  If not, see <http://www.gnu.org/licenses/>.
Contact Vanilla Forums Inc. at support [at] vanillaforums [dot] com
*/
 
class UbuntuSiThemeHooks implements Gdn_IPlugin {
       
   public function Setup() {
                return TRUE;
   }
 
   public function OnDisable() {
      return TRUE;
   }
       
/**
* stylesheets and js
*/
    public function Base_Render_Before($Sender) {
		// our custom navbar
        $Sender->AddModule('UbuntuSiNavbarModule');
        
		if (is_object($Sender->Head)) {
            // Add Css
            $Sender->Head->AddCss("/themes/vanilla-bootstrap-2.2.1/design/custom_ubuntu-si.css", "screen");
 
            // Add js - The number is the script order to be displayed in
            //$Sender->Head->AddScript("/themes/vanilla-bootstrap-2.2.1/js/cufon.js", "text/javascript", 12);
            //$Sender->Head->AddScript("/themesvanilla-bootstrap-2.2.1/js/font.js", "text/javascript", 13);
 
        }
    }
       
 
}
