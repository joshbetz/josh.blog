<?php

use CWS\Encute\Plugin;
use CWS\Encute\Script;
use CWS\Encute\Style;

add_action(Plugin::class, function (Plugin $encute) {
	$encute->hideUi();

	Style::get('social-logos')
		->defer();
	
	Style::get('genericons')
		->defer()
		->footer();
});
