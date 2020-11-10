var Tygh = {
	//embedded: typeof (TYGH_LOADER) !== 'undefined',
	doc: typeof (TYGH_LOADER) !== 'undefined' ? TYGH_LOADER.doc : document,
	//body: typeof (TYGH_LOADER) !== 'undefined' ? TYGH_LOADER.body : null,
	
	//container: 'tygh_main_container',
	//init_container: 'tygh_container',
	//area: '',
	//security_hash: '',
	//isTouch: false,
	
};
(function (_, $) {
	_.$ = $;	
	$.extend({		
		dispatchEvent: function (e) {
			var jelm = $(e.target);
			var elm = e.target;
			var s;
			e.which = e.which || 1;
			if (e.type == 'mousedown') {				
				var popups = $('.cm-popup-box:visible');
				if (popups.length) {
					var zindex = jelm.zIndex();
					var foundz = 0;
					if (zindex == 0) {
						jelm.parents().each(function () {
							var self = $(this);
							if (foundz == 0 && self.zIndex() != 0) {
								foundz = self.zIndex();
							}
						});
						zindex = foundz;
					}
					popups.each(function () {
						var self = $(this);
						if (self.zIndex() > zindex && !self.has(jelm).length) {							
							self.hide();
						}
					});
				}
				return true;
			}
		},
		runCart: function (area) {
			$(_.doc).on('click mousedown keyup keydown change', function (e) {
				return $.dispatchEvent(e);
			});	
			return true;
		},
	});	
}(Tygh, jQuery));