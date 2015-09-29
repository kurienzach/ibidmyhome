$modal_container = $('.modal-container');

$(document).ready(function() {
    var modal_visible = false;

    // Modal events binding
    $modal_container.click(function() {
        $(this).addClass("scene-hide");
        // $(this).find(".modal-content").empty();
        modal_visible = false;
    });

    $modal_container.find(".modal").click(function (e) {
        e.stopPropagation();
    })

    $modal_container.find(".modal-close").click(function() {
        $modal_container.addClass("scene-hide");
        // $modal_container.find(".modal-content").empty();
        modal_visible = false;
    });
});

function show_modal(bool, project_id) {
    if (bool) {
        $modal_container.removeClass('scene-hide');
        $modal_container.find('#reg_project_id').val(project_id);
        modal_visible = true;
    }
    else {
        $modal_container.addClass('scene-hide');
        modal_visible = false;
    }
}