var MIN_LENGTH = 1;

$('#search-toggle').click(function() {
  if ($(this).is(':checked')) {
    $('#ev_search').replaceWith('<input type="text" name="q" id="ev_search" list="datalist" placeholder="Search for teachers..." value="" onkeyup="searchTeachers()"/>');
  } else {
    $('#ev_search').replaceWith('<input type="text" name="q" id="ev_search" list="datalist" placeholder="Search for courses..." value="" onkeyup="searchCourses()"/>');
  }
});

$(document).ready(function () {
   if($('#start').length){
      $('html, body').animate({
         scrollTop: $('#start').offset().top - 60
      }, 'slow');
   }
   
});

function changeColor(id) {
   
   var slide_bar_id = id + "Slider";
  
   //new_id = id + "Slider";
    //alert(id);
   var slider_bar_val = $('#' + id).val();
   slider_bar_val = (slider_bar_val - 100) *(-1); 
   //alert(slider_bar_val + id + slide_bar_id);
   if (slider_bar_val > 100) {
            slider_bar_val = 100;
        }
        else if (slider_bar_val < 0) {
            slider_bar_val = 0;
        }
        var h= Math.floor((100 - slider_bar_val) * 120 / 100);
        var s = 1;//Math.abs(slider_bar_val - 50)/50;
        var v = 1;
   
   //if (slider_bar_val > 50) {
      //alert("test");
      //$('#' + slide_bar_id).find('.slider-selection').css('background', 'green');
      $('#' + slide_bar_id).find('.slider-selection').css({
            backgroundColor: hsv2rgb(h, s, 1)
        });
   //}
   
}

   var hsv2rgb = function(h, s, v) {
  // adapted from http://schinckel.net/2012/01/10/hsv-to-rgb-in-javascript/
  var rgb, i, data = [];
  if (s === 0) {
    rgb = [v,v,v];
  } else {
    h = h / 60;
    i = Math.floor(h);
    data = [v*(1-s), v*(1-s*(h-i)), v*(1-s*(1-(h-i)))];
    switch(i) {
      case 0:
        rgb = [v, data[2], data[0]];
        break;
      case 1:
        rgb = [data[1], v, data[0]];
        break;
      case 2:
        rgb = [data[0], v, data[2]];
        break;
      case 3:
        rgb = [data[0], data[1], v];
        break;
      case 4:
        rgb = [data[2], data[0], v];
        break;
      default:
        rgb = [v, data[0], data[1]];
        break;
    }
  }
  return '#' + rgb.map(function(x){
    return ("0" + Math.round(x*255).toString(16)).slice(-2);
  }).join('');
};

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
         //$('#course-up-' + id).attr("disabled", true);
         $('#course-up-' + id).toggleClass("upvote-active");
         $('#course-down-' + id).removeClass("downvote-active");
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
         //$('#course-down-' + id).attr("disabled", true);
         $('#course-down-' + id).toggleClass("downvote-active");
         $('#course-up-' + id).removeClass("upvote-active");
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