/**
 * Protect window.console method calls, e.g. console is not defined on IE
 * unless dev tools are open, and IE doesn't define console.debug
 *
 * Chrome 41.0.2272.118: debug,error,info,log,warn,dir,dirxml,table,trace,assert,count,markTimeline,profile,profileEnd,time,timeEnd,timeStamp,timeline,timelineEnd,group,groupCollapsed,groupEnd,clear
 * Firefox 37.0.1: log,info,warn,error,exception,debug,table,trace,dir,group,groupCollapsed,groupEnd,time,timeEnd,profile,profileEnd,assert,count
 * Internet Explorer 11: select,log,info,warn,error,debug,assert,time,timeEnd,timeStamp,group,groupCollapsed,groupEnd,trace,clear,dir,dirxml,count,countReset,cd
 * Safari 6.2.4: debug,error,log,info,warn,clear,dir,dirxml,table,trace,assert,count,profile,profileEnd,time,timeEnd,timeStamp,group,groupCollapsed,groupEnd
 * Opera 28.0.1750.48: debug,error,info,log,warn,dir,dirxml,table,trace,assert,count,markTimeline,profile,profileEnd,time,timeEnd,timeStamp,timeline,timelineEnd,group,groupCollapsed,groupEnd,clear
 */
(function () {
    // Union of Chrome, Firefox, IE, Opera, and Safari console methods
    var methods = ["assert", "cd", "clear", "count", "countReset",
        "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed",
        "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd",
        "select", "table", "time", "timeEnd", "timeStamp", "timeline",
        "timelineEnd", "trace", "warn"];
    var length = methods.length;
    var console = (window.console = window.console || {});
    var method;
    var noop = function () {
    };
    while (length--) {
        method = methods[length];
        // define undefined methods as noops to prevent errors
        if (!console[method])
            console[method] = noop;
    }
})();

//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 2000;  //time in ms
var $input = $('#perscode');

//on keyup, start the countdown
$input.on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
});
//on keydown, clear the countdown
$input.on('keydown', function () {
    clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping() {
    //If more than 2 integers in the field
    if ($('#perscode').val().length > 2) {
        //Makes a get request
        $.get("/patients/" + $('#perscode').val(), function (data) {
            //Clears results
            $(".results").html("");
            if (data.length != 0) {
                var dataJson = jQuery.parseJSON(data);
                if (dataJson.error) {
                    $(".error").html("");
                    window.console.log(dataJson.error);
                    $(".error").append("<p>" + dataJson.error + "</p>");
                } else {
                    $(".error").html("");
                    //Loops result data
                    for (var i = 0; i < dataJson.length; i++) {
                        var object = dataJson[i];
                        $(".results").append(" <p class=\"dropdown-item js-fill-field\">" + object.name+' ' +object.surname+ ' ' +object.personal_code + "</p>");
                    }
                }
            }
        });
    }
}

$(document).on("click", ".js-fill-field", function () {
    $('#perscode').val($(this).html());
});

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}