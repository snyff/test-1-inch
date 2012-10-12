 					  
			document.getPageSize = function() {
			
				var xScroll, yScroll;
				
				if (window.innerHeight && window.scrollMaxY) {	
					xScroll = document.body.scrollWidth;
					yScroll = window.innerHeight + window.scrollMaxY;
				} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
					xScroll = document.body.scrollWidth;
					yScroll = document.body.scrollHeight;
				} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
					xScroll = document.body.offsetWidth;
					yScroll = document.body.offsetHeight;
				}
				
				var windowWidth, windowHeight;
				if (self.innerHeight) {	// all except Explorer
					windowWidth = self.innerWidth;
					windowHeight = self.innerHeight;
				} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
					windowWidth = document.documentElement.clientWidth;
					windowHeight = document.documentElement.clientHeight;
				} else if (document.body) { // other Explorers
					windowWidth = document.body.clientWidth;
					windowHeight = document.body.clientHeight;
				}	
				
				// for small pages with total height less then height of the viewport
				if(yScroll < windowHeight){
					pageHeight = windowHeight;
				} else { 
					pageHeight = yScroll;
				}
			
				// for small pages with total width less then width of the viewport
				if(xScroll < windowWidth){	
					pageWidth = windowWidth;
				} else {
					pageWidth = xScroll;
				}
			
				arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
				return arrayPageSize;
			}
			
			document.getPageScroll = function(){
			
				var yScroll;
			
				if (self.pageYOffset) {
					yScroll = self.pageYOffset;
				} else if (document.documentElement && document.documentElement.scrollTop){	 // Explorer 6 Strict
					yScroll = document.documentElement.scrollTop;
				} else if (document.body) {// all other Explorers
					yScroll = document.body.scrollTop;
				}
			
				arrayPageScroll = new Array('',yScroll) 
				return arrayPageScroll;
			}
			
        
           function showMsgBox(ww, hh, divName) {
		   
                 var msgbox = document.getElementById(divName);
			     var pz = document.getPageSize();

				 bgBox.style.width = pz[2];
                 bgBox.style.height = pz[3]+250;
                 bgBox.style.marginLeft=0;
                 bgBox.style.marginTop=0;
                 bgBox.style.display = 'block';

				 msgbox.style.width = ww;
                 msgbox.style.height = hh;
                 msgbox.style.marginLeft=parseInt((pz[2] - ww)/2);
                 msgbox.style.marginTop=parseInt((pz[3] - hh - 50)/2);
                 msgbox.style.position   = 'absolute';
                 msgbox.style.display = 'block';
           }
        
           function closeMsgBox(divName) {
		   
                 var msgbox = document.getElementById(divName);
                 var bgBox = document.getElementById('bgBox');
                
				 bgBox.style.display = 'none';
				 msgbox.style.display = 'none';
           }
           
