// ADDTHIS
  var addthis_config = {"data_track_addressbar":false,"ui_use_css":true};
  
  var addthis_share = {
		 url_transforms : {
			  shorten: {
				   twitter: 'bitly',
				   facebook: 'bitly',
				   google: 'bitly',
				   pinterest: 'bitly'
			  }
		 }, 
		 shorteners : {
			  bitly : {} 
		 }
	};
	
// ANALYTICS

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-67465-5']);
_gaq.push(['_setDomainName', 'unicomonde.com']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
		