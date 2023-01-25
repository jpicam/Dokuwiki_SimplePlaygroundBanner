<?php
/**
 * Plugin simpleplaygroundbanner: Le plugin "Simple Playground Banner" pour DokuWiki permet d'afficher automatiquement une bannière statique sur chaque page du namespace "brouillon".
 * 
 * @author     Jean-Philippe Moignez
 */

if(!defined('DOKU_INC')) die();

class action_plugin_simpleplaygroundbanner extends DokuWiki_Action_Plugin {

    public function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TPL_ACT_RENDER', 'BEFORE', $this, 'handle_display_mybanner', array());
    }

    public function handle_display_mybanner(Doku_Event $event, $param) {
		$namespace = getNS(cleanID(getID()));
		if (substr($namespace, 0, 9) == 'brouillon') {
			echo '<div class="approval approved_no"><span class="approval_draft">';
			echo 'Vous êtes dans la partie \'Brouillon\' du site: les pages ne sont pas validées.';
			echo '</span></div>';
        }
		return;
    }


}
