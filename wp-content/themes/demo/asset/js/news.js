$( document ).ready(function() {
	var w = window.innerWidth;
	if(w >= 992 && w <= 1024)
	{
		var size_hieght = document.getElementById("home-slider");
    	var height = size_hieght.offsetHeight;
    	//alert(height);
    	document.getElementById('test').setAttribute("style","height: "+ height +"px !important");


    	var height = 73;
			var cssText = '.item-title-hot-news{ height:' + height + 'px !important; }';
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
});