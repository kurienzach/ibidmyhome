/*! MyLib.js 1.0.0 | Aurelio De Rosa (@AurelioDeRosa) | MIT Licensed */
function show_modal(a,b,c){$modal=$("#"+b),a?($modal.removeClass("scene-hide"),c&&$modal.find("#reg_project_id").val(c),modal_visible=!0):($modal.addClass("scene-hide"),modal_visible=!1)}$modal_container=$(".modal-container"),$(document).ready(function(){var a=!1;$modal_container.click(function(){$(this).addClass("scene-hide"),a=!1}),$modal_container.find(".modal").click(function(a){a.stopPropagation()}),$modal_container.find(".modal-close").click(function(){$modal_container.addClass("scene-hide"),a=!1})});
//# sourceMappingURL=modal.js.map