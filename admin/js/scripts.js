$(document).ready(function() {

    // Global variables
    let userHref;
    let userHrefSplitted;
    let userId;
    let imageSrc;
    let imageHrefSplitted;
    let imageName;
    let photoId;

   $(".modal_thumbnails").click(function() {
        $("#set_user_image").prop('disabled', false);

        userHref = $("#user-id").prop('href');
        userHrefSplitted = userHref.split("=");
        userId = userHrefSplitted[userHrefSplitted.length - 1];

        imageSrc = $(this).prop("src");
        imageHrefSplitted = imageSrc.split("/");
        imageName = imageHrefSplitted[imageHrefSplitted.length - 1];

        photoId = $(this).attr("data");

        $.ajax({
           url: "includes/ajax_code.php",
           data: {photoId: photoId},
           type: "POST",
           success: function(data) {
               if (!data.error) {
                   $("#modal_sidebar").html(data);
               }
           }
        });
   });

    $("#set_user_image").click(function() {
        $.ajax({
            url: "includes/ajax_code.php",
            data: {imageName: imageName, userId: userId},
            type: "POST",
            success: function(data) {
                if (!data.error) {
                    $(".user_image_box a img").prop('src', data);
                }
            }
        });
    });
});

/* Edit Photo Sidebar */
$(".info-box-header").click(function() {
   $(".inside").slideToggle("fast");
   $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon ");
});

/* Delete Function */
$(".delete_link").click(function() {
    return confirm("Are you sure you want to delete this item?");
});

/* Summer note */
$('#summernote').summernote({
    height: 300
});