var MIN_LENGTH = 1;

$('#cmn-toggle-4').click(function() {
  if ($(this).is(':checked')) {
    $(this).siblings('div').html('<h2>Search for: Teachers</h2>');
    $('#ev_search').replaceWith('<input type="text" name="q" id="ev_search" list="datalist" placeholder="Search for teachers..." value="" onkeyup="searchTeachers()"/>');
  } else {
    $(this).siblings('div').html('<h2>Search for: Courses</h2>');
    $('#ev_search').replaceWith('<input type="text" name="q" id="ev_search" list="datalist" placeholder="Search for courses..." value="" onkeyup="searchCourses()"/>');
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

function set_item(item) {
   $('#ev_search').val(item);
   $('#ev_search_results').hide();
}