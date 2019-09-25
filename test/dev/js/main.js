$(document).ready(function() {
	
	$(".search__field").on("mouseover", function(){
		$(this).val("Awesome Search")
	});

	$(".search__field").on("mouseleave", function(){
		$(this).val("")
	});

	$(".search__field").on("click", function(){
		$(this).val("")
	});

	 $('.offer-carousel').slick({
	    arrows: true,
	    autoplay: true
	  });

	  var slideout = new Slideout({
	    'panel': document.getElementById('panel'),
	    'menu': document.getElementById('menu'),
	    'padding': 256,
	    'tolerance': 70
	  });

	  $('.toggle-btn').on('click', function(){
	  	slideout.toggle();
	  });

	  $(".menu__item, .close").on('click', function(){
	  	slideout.close()
	  });
});