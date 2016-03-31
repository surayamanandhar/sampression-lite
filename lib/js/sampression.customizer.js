jQuery(document).ready(function() {
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://support.sampression.com/hc/communities/public/topics/200171291-Sampression-Lite" class="button" target="_blank">{community}</a>'.replace('{community}',objectL10n.community));

	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://support.sampression.com/hc/en-us#knowledge" class="button" target="_blank">{knowledge_base}</a>'.replace('{knowledge_base}',objectL10n.knowledge_base));

	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.docs.sampression.com/category/sampression-lite/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center; background-color: #fe6e41; color: #fff; font-weight: bold; border: none;" href="http://www.sampression.com/themes/sampression-pro/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));
	
});