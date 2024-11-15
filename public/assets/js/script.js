 /* $( document ).ready(function() {
  course();
  function course() {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              course:1
            },
            success: function (data) {
                $("#get_course").html(data);

            }
        });
    }
   


about();
  function about() {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              about:1
            },
            success: function (data) {
                $("#get_about_content").html(data);

            }
        });
    }

sidebar();
function sidebar(){
   $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              sidebar:1
            },
            success: function (data) {
                $("#get_sidebar").html(data);

            }
        }); 
   
    
}
    
    
    
    header();
function header(){
   $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              header:1
            },
            success: function (data) {
                $("#header").html(data);

            }
        }); 


});        }*/

$("#addcourse").click(function (e) {
  e.preventDefault();
  $.ajax({
      url: "dashboard/course",
      type: "get",
      success: function (data) {
        window.scrollTo({ top: 0, behavior: 'smooth' });
          $("#addCourse").html(data);

      }
  });
});



// deleteCourse.js

// public/assets/js/script.js

$(document).ready(function() {
    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 
    $(document).ready(function() {
        // Event listener for the delete button
        $('.delete-course').on('click', function() {
            var courseId = $(this).data('id'); // Get course ID from data-id
            var token = $('meta[name="csrf-token"]').attr('content'); // CSRF Token
    
            // Confirm the delete action
            if (confirm("Are you sure you want to delete this course?")) {
                // Send DELETE request using AJAX
                $.ajax({
                    url: '/course/' + courseId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token // Setting CSRF token in headers
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $('#course-row-' + courseId).remove(); // Remove row from UI
                        } else {
                            alert('Failed to delete course.'); 
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the course.');
                    }
                });
            }
        });
    });
    
});

    
