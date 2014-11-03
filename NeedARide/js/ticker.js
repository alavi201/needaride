function tick(){
			$('#ticker li:first').animate({'opacity':0}, 200, function () { $(this).appendTo($('#ticker')).css('opacity', 1); });
		}
		setInterval(function(){ tick () }, 2500);
