function link(obj){
		var newHash = '',
		mainContent = $("#replace"),
		wrapper		= $("#wrapper"),
		baseHeight  = 0;
		window.location.hash = $(obj).attr("href");
		newHash = window.location.hash.substring(1);
		if(newHash){
			mainContent
				.fadeOut(200, function(){
				console.log(2);
					//mainContent.hide(function(){ ALREADY FADED OUT!!!!
					console.log(1);
						$.post(  
							'http://localhost/Dub-Framer-v2.0/' + newHash,  
				            {controller: newHash},  
				            function(responseText){
				            	mainContent.html(responseText);
				            	mainContent.fadeIn(200, function(){
									mainContent.animate({
										height: mainContent.height + "px"
								});//end of animate;
								
				            })//end of fadeIn;
				            },//end of function();
				            
				            "html"  
				        	);//end of post; 
					//});   	
						$("nav a").removeClass("current");
						$("nav a[href=" + newHash + "]").addClass("current");
					});//end of fadeOut;
		}//end of if;
		return false;
}


$(function(){
	var newHash = '',
		mainContent = $("#replace"),
		wrapper		= $("#wrapper"),
		baseHeight  = 0;
	if(window.location.hash == ''){
		window.location.hash = 'index';
	}
	wrapper.height(wrapper.height());
	baseHeight = wrapper.height() - mainContent.height();
	$("a").click(function(){
		window.location.hash = $(this).attr("href");
		return false;
	});
	
	$(window).bind('hashchange', function(){
		newHash = window.location.hash.substring(1);
		if(newHash){
			mainContent
				.fadeOut(200, function(){
					mainContent.hide(function(){
						$.post(  
							'http://localhost/Dub-Framer-v2.0/' + newHash,  
				            {controller: newHash},  
				            function(responseText){
				            	mainContent.html(responseText);
				            	mainContent.fadeIn(200, function(){
									mainContent.animate({
										height: mainContent.height + "px"
								});//end of animate;
				            })//end of fadeIn;
				            },//end of function();
				            
				            "html"  
				        	);//end of post; 
					})   	
						$("nav a").removeClass("current");
						$("nav a[href=" + newHash + "]").addClass("current");
					});//end of fadeOut;
		}//end of if;
	});//end of bind.

	$(window).trigger("hashchange");
});