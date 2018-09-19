$(document).ready(function() {
    // Flipclock js

	if (typeof task_deadline !== "undefined") {
        var end_date = new Date(task_deadline); //Month Days, Year HH:MM:SS
        var start_date = new Date(task_start);
        var now = new Date();
        if ((now - start_date) <= 0 && task_status == 2) {
        	var date = new Date(00,00,0000, 00,00,00);
        	$('.task_message').html('Upcoming Task');
        	$('.task_stop').css('display','none');
        	$('.task_start').css('display','none');
        	$('.clock-widget').removeClass("widget-clock");

        } else if (task_status == 3 ) {
        	var date = new Date(00,00,0000, 00,00,00);
        	$('.task_message').html('Task Paused');
        	$('.task_stop').css('display','none');
        	$('.task_start').css('display','none');
        	$('.clock-widget').removeClass("widget-clock");
        	
        } else if (task_status == 1 ) {
        	var date = new Date(00,00,0000, 00,00,00);
        	$('.task_message').html('Task Completed!');
        	$('.task_stop').addClass('hide');
        	$('.task_start').addClass('hide');
        	$('.clock-widget').removeClass("widget-clock");
        
        } else if (task_status == 4 ) {
        	var date = new Date(00,00,0000, 00,00,00);
        	$('.task_message').html('Late!! Hurry Up!');
        	$('.task_stop').addClass('hide');
            $('.task_start').addClass('hide');
            $('.clock-widget').removeClass("widget-clock");       
        } else{
        	var diff = (end_date.getTime()/1000) - (now.getTime()/1000);
        	$('.widget-clock').removeClass("clock-widget");
	        var clock = $('.widget-clock').FlipClock(diff,{
	            clockFace: 'DailyCounter',
	            countdown: true,
	            autoStart: true,
	            callbacks: {
	                stop: function() {
	                    $('.task_message').html('The clock has stopped!')
	                }
	            }
        });
	    }
	}
    // var d = new Date();
    // if (deadline < d) {    
    //     var clock;

    //     clock = $('.widget-clock').FlipClock({
    //         clockFace: 'DailyCounter',
    //         autoStart: false,
    //         callbacks: {
    //             stop: function() {
    //                 $('.message').html('The clock has stopped!')
    //             }
    //         }
    //     });

    
    //     clock.setTime(deadline);
    //     clock.setCountdown(true);
    //     clock.start();
    // }
    // else{
    //     clock.setTime(1);
    //     clock.setCountdown(false);
    //     clock.stop();
    // }

    $('.task_stop').on('click',function(e) {
        clock.stop();
    });

    $('.task_start').on('click',function(e) {
        clock.start();
    });

    var myVar = setInterval(function() {
        //myTimer()
    }, 1000);

    function myTimer() {
        var d = new Date();
        var t = d.toLocaleTimeString();
        document.getElementById("current-time").innerHTML = t;
    }

    function myStopFunction() {
        clearInterval(myVar);
    }
    /* End Flip Clock */
} );