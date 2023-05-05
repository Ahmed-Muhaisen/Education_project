
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    console.log(url);
    loadCourses(url);
});

function loadCourses(url) {
    $.ajax({
        url : url,
        dataType: 'html',
    }).done(function(data){
        $('.paginate-content').html(data);
        location.hash = url;
    }).fail(function(){
        alert('Courses could not be loaded.');
    });
}
