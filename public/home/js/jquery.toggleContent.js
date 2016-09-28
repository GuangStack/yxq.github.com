$.fn.toggleContent = function(options){
	var cfgs = $.extend({ toggleBtn: null, effect: 'default', speed: 'normal', isCaption: false, hideCon: null, title: null}, options);
	return this.each(function() {
		var count = 0;
		var $this = $(this);
		var effect = cfgs.effect;
		var hideContent = cfgs.hideCon ? $this.find(cfgs.hideCon) : $this.find('.fn-hide');
		var toggleBtn = cfgs.toggleBtn == 'self' ? $this : $this.find('.toggle-btn');
		var p = cfgs.title ? $this.find(cfgs.title) : $this.find('.img p');
		var isCaption = cfgs.isCaption;
		var toggleFun = function(count) {
			if (count % 2 != 0) $this.click();
			$this.find('a')[0].click();
		}

    	$this.bind({
			click: function() {
				count++;
				toggleBtn.toggleClass('active');
				switch (effect) {
					case 'default':
						hideContent.toggle();
						count % 2 == 0 ? p.show() : p.hide();
						break;
					case 'fade':
						count % 2 == 0 ? hideContent.fadeOut(cfgs.speed) : hideContent.fadeIn(cfgs.speed);
						count % 2 == 0 ? p.fadeIn(cfgs.speed) : p.fadeOut(cfgs.speed);
						break;
				}

				if (isCaption && count % 2 != 0) {
					
						setTimeout(function() { toggleFun(count); }, 5000);
					
				}
			}
		});

		
			$this.bind({
				mouseenter: function() {
					switch (effect) {
						case 'default':
							hideContent.show();
							p.hide();
							break;
						case 'fade':
							hideContent.fadeIn(cfgs.speed);
							p.fadeOut(cfgs.speed);
							break;
					}
				},
				mouseleave: function() {
					toggleBtn.removeClass('active');
					switch (effect) {
						case 'default':
							hideContent.hide();
							p.show();
							break;
						case 'fade':
							hideContent.fadeOut(cfgs.speed);
							p.fadeIn(cfgs.speed);
							break;
					}
				}
			});
		

		$this.find('a').click(function(event) {
			event.stopPropagation();
		}); 
  	});
};