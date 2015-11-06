$('#cmn-toggle-4').click(function() {
  if ($(this).is(':checked')) {
    $(this).siblings('div').html('<h2>Search for: Teachers</h2>');
  } else {
    $(this).siblings('div').html('<h2>Search for: Courses</h2>');
  }
});