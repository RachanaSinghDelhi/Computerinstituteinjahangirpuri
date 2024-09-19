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

    // Delete course script
    $(document).on('click', '.delete-course', function(e) {
        e.preventDefault();

        var courseId = $(this).data('id'); // Get course ID

        // Confirm delete action
        if (confirm('Are you sure you want to delete this course?')) {
            $.ajax({
                url: '/courses/' + courseId,  // URL to the delete route
                type: 'DELETE',
                success: function(response) {
                    $('#course-row-' + courseId).remove();  // Remove the row on success
                    $('#alert-box').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);  // Show a success message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    // Auto-hide the alert after 5 seconds (optional)
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 5000);
                },
                error: function(xhr) {
                    $('#alert-box').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            An error occurred while deleting the course.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                }
            });
        }
    });
});



    
 /*  function configureBredcrumbs() {
      // get the location
      let path = location.href.split('/').slice(3);
      // create an array of objects to store links and anchor text
      const linkPaths = [{ "main": '', "link": '' }];
      // iterate through the path array
      for (let i = 0; i < path.length; i++) {
        const component = path[i];
        // convert URL to the text
        const anchorText = decodeURIComponent(component).toUpperCase().split('.')[0];
        // create a link
        const link = '/' + path.slice(0, i + 1).join('/');
        // push to array
        linkPaths.push({ "main": anchorText, "link": link });
      }
      // add links in the span
      let values = linkPaths.map((part) => {
        return "<a href=\"" + part.link + "\">" + part.main +"</a>"
      }).join('<span style="margin:15px">></span>')

      let element = document.getElementById("breadcrumbs");
      element.innerHTML=values;
    }
    
configureBredcrumbs();


*/

   $(document).ready(function() {
    $('#course_content').summernote({

        height: 200,
    });
   });
