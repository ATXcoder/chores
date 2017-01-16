/**
 * Created by Thomas on 1/16/2017.
 */
$(document).ready(function(){
    /**
     * Update icon background and
     * set icon_uri in form
     */
    $("#chore_icons div").click(function(){
        $("#chore_icons div").removeClass('chore_icon_active');
        $(this).addClass('chore_icon_active');
        $('#icon_uri').val(this.id);
    });
});