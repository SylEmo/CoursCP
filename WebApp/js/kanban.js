function add_developer() {
		var dev = window.prompt('Enter the developer\'s name');
		var devid = dev.replace(/\s/g,'').toLowerCase();
		if (devid.length > 0) {
		    if ($('#' + devid).attr('id') == devid) { window.alert('Already added'); return; }
		    var new_dev = $('#board > div:first-child')
			.clone()
			.attr('id',devid);
		    new_dev.find('a').remove();
		    new_dev.find('h1').text(dev);
		    new_dev.show();
		    $('#board').append(new_dev);
		}
    }
    function remove_developer() {
	//need to add check here that there's at least one developer
		$('#board')
		    .css('cursor','crosshair')
		    .click(function(event) {
		        $(event.target).closest('#board > div').remove();
			$('#board').css('cursor','default').unbind('click');    
		});
    }
    function add_task() {
		var task = window.prompt('Enter task name');
		var taskid = task.replace(/\s/g,'').toLowerCase();
		if (taskid.length > 0) {
		    if ($('#' + taskid).attr('id') == taskid) { window.alert('Already added'); return; }
		    var new_task = $('#board a[draggable]')
			.first()
			.clone()
			.attr('id', taskid);
		    new_task.find('.cardTitle').text(task);
		    $('#board > div > div').first().append(new_task);
		}
    }
    function remove_task() {
	//need to add check here that there's at least one task
		$('#board')
		    .css('cursor','crosshair')
		    .click(function(event) {
		        $(event.target).closest('#board a[draggable]').remove();
			$('#board').css('cursor','default').unbind('click');    
		});
    }
    function add_status() {
		var stat = window.prompt('Enter status name');
		var statclass = stat.replace(/\s/g,'').toLowerCase();
		if (statclass.length > 0) {
		    if ($('#board > div:first-child > div.' + statclass).hasClass(statclass)) { window.alert('Already added'); return; }
		    var new_stat = $('#board > div > div')
			.first()
			.clone();
		    var cc = new_stat.attr('class').replace('droptarget','').replace(/\s/g,'');
		    new_stat
			.removeClass(cc)
			.addClass(statclass);
		    new_stat.find('h2.title').text(stat);
		    new_stat.find('a[draggable]').remove();
		    $('#board > div').append(new_stat);
		}
    }
    function remove_status() {
	//need to add check here that there's at least one status
	$('#board')
	    .css('cursor','crosshair')
	    .click(function(event) {
	        var rstat = $(event.target).closest('.droptarget');
		var rclass = rstat.attr('class').replace('droptarget','').replace(/\s/g,'');
		$('.' + rclass).remove();
		$('#board').css('cursor','default').unbind('click');    
	});
    }