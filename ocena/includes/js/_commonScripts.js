var MIN_LENGTH = 1;

$('#search-toggle').click(function() {
  if ($(this).is(':checked')) {
    $('#ev_search').replaceWith('<input type="text" name="q" id="ev_search" list="datalist" placeholder="Search for teachers..." value="" onkeyup="searchTeachers()"/>');
  } else {
    $('#ev_search').replaceWith('<input type="text" name="q" id="ev_search" list="datalist" placeholder="Search for courses..." value="" onkeyup="searchCourses()"/>');
  }
});

$(document).ready(function () {
   if(('#start').length != 0){
      $('html, body').animate({
         scrollTop: $('#start').offset().top
      }, 600);
   }
   
});

function searchTeachers() {
   var keyword = $('#ev_search').val();
   if (keyword.length    >= MIN_LENGTH) {
      $.ajax( {
         url: '/includes/php/auto-complete-t.php',
         type: 'POST',
         data: {keyword:keyword},
         success: function(data) {
            $('#ev_search_results').show();
            $('#ev_search_results').html(data);
         }
      });
   } else {
      $('#ev_search_results').hide();
   }
};

function searchCourses() {
   var keyword = $('#ev_search').val();
   if (keyword.length    >= MIN_LENGTH) {
      $.ajax( {
         url: '/includes/php/auto-complete-c.php',
         type: 'POST',
         data: {keyword:keyword},
         success: function(data) {
            $('#ev_search_results').show();
            $('#ev_search_results').html(data);
         }
      });
   } else {
      $('#ev_search_results').hide();
   }
};

function upvote(id, t_or_c, s_id) {
   $.ajax({
      url: '../includes/php/upvote.php',
      type: 'POST',
      data: {id:id, t_or_c:t_or_c, s_id:s_id},
      success: function(result) {
         $('#course-up-' + id).attr("disabled", true);
         //alert(result);
      }
      
   });
};

function downvote(id, t_or_c, s_id) {
   $.ajax({
      url: '../includes/php/downvote.php',
      type: 'POST',
      data: {id:id, t_or_c:t_or_c, s_id:s_id},
      success: function(result) {
         $('#course-down-' + id).attr("disabled", true);
         //alert(result);
      }
      
   });
};

function set_item(item) {
   $('#ev_search').val(item);
   $('#ev_search_results').hide();
}

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

$('.rating-slider').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});