function render_cities () {
	$city_list = $('.city-list ul');
	_.each(projects, function(project, city) {
		$city_list.append("<li><a>" + city + "</a></li>");
	});

	$city_list.find('a').click(function() {
		render_projects($(this).html());
		$city_list.find('a').removeClass('select');
		$(this).addClass('select');
        $('.pr-title span').html($(this).html().toUpperCase());
	});

	$city_list.find('a').first().click();

}

function render_projects (city) {
	city_projects = projects[city];
	template = _.template($('#project-template').html());
	$project_accordion = $('.project-accordion');
	
	$project_accordion.empty();

	_.each(city_projects, function(project) {
		$project_accordion.append(template(project));
	});

	$projects = $('.project');

	// $projects.find('.accordion-header').click(function() {
	//     $project = $(this).parent();
	    
	//     if ($project.hasClass('expand')) {
	//         $project.removeClass('expand');
	//     }
	//     else {
	//         $expanded = $projects.siblings('.expand');
	//         $project.addClass('expand');
	//         $expanded.removeClass('expand');
	//     }
	// });

	// $projects.first().addClass('expand');

	$projects.find('.buy-coupon').click(function() {
		show_modal(true, 'modal-register', 475, $(this).data('project-id'));
		return false;
	});
}
