/**
 * Created by Thomas on 1/16/2017.
 */
$(document).ready(function() {
   // Catch Upload button click
    $("#uploadBtn").change(function(){
        var fileName = $(this).val();
        console.debug(this);
    });
});