jQuery(document).ready(function(){
	jQuery('.filter_sort').on('click', function() {
		jQuery(this).toggleClass('isActive');
		jQuery('.filter').toggleClass('isActive');
		jQuery('.products__list').toggleClass('isActive');
	});
	jQuery('.products__list').on('click', function() {
		jQuery('.filter_sort').removeClass('isActive');
		jQuery('.filter').removeClass('isActive');
		jQuery('.products__list').removeClass('isActive');
	});
	  $(document).on('click', function(){
		if ($(event.target).closest('.filter').length) return;
		jQuery('.filter_sort').removeClass('isActive');
		jQuery('.filter').removeClass('isActive');
		jQuery('.products__list').removeClass('isActive');
	  });
})