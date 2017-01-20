$(document).ready(function(){

    /**
     * Update Task Status
     */
    $('.btn').click(function(){

        var id = this.id;
        var url = $(location).attr('href') + "/" + id;
        alert("Posting to: " + url);

        $.post(url,
            {
                id: id,
                status: "Complete"
            });

    });
});
