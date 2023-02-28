jQuery(function(){
    setTimeout(function(){
		if ( window.matchMedia('(max-width : 1023px)').matches ) {
			jQuery('ul.tabs').append(jQuery('.woocommerce-Tabs-panel'));
		};
    },0);
});
jQuery(document).ready(function(){
	jQuery('.filter_bl').on('click', function() {
		jQuery('.filter_bg').toggleClass('isActive');
		jQuery('.filter_body').toggleClass('isActive');
	});
	jQuery('.filter_close').on('click', function() {
		jQuery('.filter_bg').removeClass('isActive');
		jQuery('.filter_body').removeClass('isActive');
	});
	jQuery('.filter_bg').on('click', function() {
		jQuery('.filter_bg').removeClass('isActive');
		jQuery('.filter_body').removeClass('isActive');
	});
});