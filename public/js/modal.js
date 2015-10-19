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

function show_modal(bool, modal_id, height, project_id) {
    $modal = $('#'+modal_id);
    if (bool) {
        // Hide any currently displayed modal
        $modal_container.addClass("scene-hide");

        $modal.removeClass('scene-hide');

        if (project_id)
            $modal.find('#reg_project_id').val(project_id);
        else
            $modal.find('#reg_project_id').val(1);

        modal_visible = true;

        $modal.find('.modal').height(height);
    }
    else {
        $modal.addClass('scene-hide');
        modal_visible = false;
    }
}