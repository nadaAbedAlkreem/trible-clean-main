$(document).ready(function() {
	$(".basic").select3({
		tags: true,
	});

	var formSmall = $(".form-small").select3({ tags: true });
	formSmall.data('select3').$container.addClass('form-control-sm')

	$(".nested").select3({
		tags: true
	});
	$(".tagging").select3({
		tags: true
	});
	$(".disabled-results").select3();
	$(".placeholder").select3({
		placeholder: "Make a Selection",
		allowClear: true
	});

	function formatState (state) {
	  if (!state.id) {
		return state.text;
	  }
	  var baseClass = "flaticon-";
	  var $state = $(
		'<span><i class="' + baseClass + state.element.value.toLowerCase() + '" /> ' + state.text + '</i> </span>'
	  );
	  return $state;
	};

	$(".templating").select3({
	  templateSelection: formatState
	});

    $('.js-example-basic-single').select3();
});