jQuery(document).ready(function(){
// 	jQuery(".port_block .dis__block--tit span").html(jQuery(".port_block .simple_block").length);
// 	jQuery('.port_block').find(jQuery(".simple_block").length
	jQuery('.dis__block--tit').on('click', function() {
		jQuery(this).toggleClass('isActive');
		jQuery(this).siblings().toggleClass('isActive');
	});
// 	var els = document.getElementsByClassName("simple_blocks");
// 	Array.prototype.forEach.call(els, el => {
// 	  const spanCount = el.getElementsByClassName('simple_block').length
// 	  el.querySelector('.dis__block--tit span').innerHTML = spanCount
// 	})
});