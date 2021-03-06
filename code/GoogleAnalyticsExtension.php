<?php

class GoogleAnalyticsExtension extends Extension {

	public function onAfterInit() {
		if (Director::isLive()) {
			$accountId = Config::inst()->get(get_class(), 'account_id');
			if ($accountId) {
				 Requirements::customScript(<<<JS
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '$accountId', 'auto');
	ga('send', 'pageview');
JS
				);
			}
		}
	}

}