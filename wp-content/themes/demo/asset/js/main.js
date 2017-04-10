/*get width srceen*/
var getWidth = parseInt(window.screen.availWidth);
{
	if(getWidth >= 600 && getWidth < 767)
	{
		var height = 570;
		var cssText = '.wrap-category{ height:' + height + 'px !important; }';
			writeStyles('styles_js', cssText)

		function writeStyles(styleName, cssText) {
			var styleElement = document.getElementById(styleName);
			if (styleElement) document.getElementsByTagName('head')[0].removeChild(
				styleElement);
				styleElement = document.createElement('style');
			styleElement.type = 'text/css';
			styleElement.id = styleName;
			styleElement.innerHTML = cssText;
			document.getElementsByTagName('head')[0].appendChild(styleElement);
		}
	} else {
		if(getWidth >= 320 && getWidth < 450)
		{
			var height = 415;
			var cssText = '.wrap-category{ height:' + height + 'px !important; }';
			writeStyles('styles_js', cssText)

			function writeStyles(styleName, cssText) {
				var styleElement = document.getElementById(styleName);
				if (styleElement) document.getElementsByTagName('head')[0].removeChild(
					styleElement);
					styleElement = document.createElement('style');
				styleElement.type = 'text/css';
				styleElement.id = styleName;
				styleElement.innerHTML = cssText;
				document.getElementsByTagName('head')[0].appendChild(styleElement);
			}
		} 
	}
}