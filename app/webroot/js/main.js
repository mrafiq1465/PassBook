
$(document).ready(function() {

    $('.blacklist').change(function(e){
        var id = $(this).attr('id');
        var blacklist = 0;
        if($(this).attr('checked') == 'checked') {
            blacklist =1;
        }
        $.ajax({
            type:"POST",
            url:'/events/photo_update',
            data:{'data[id]':id, 'data[blacklist]':blacklist},
            dataType:"json",
            success:function (json) {
                if (json.status == 'success') {
                }
            }
        });
    });

    $('#resetPassword').click(function(e){
        var email = $('#email').val();
        $.ajax({
            type:"POST",
            url:'/users/send_password',
            data:{'data[email]':email },
            dataType:"json",
            success:function (json) {
                if (json.success !== undefined) {
                    $('#loginModal .modal-body .error').text(json.success).show();
                } else {
                    $('#loginModal .modal-body .error').text(json.error).show();
                }
            }
        });

    });

    $(":date").dateinput({
        format: 'yyyy-mm-dd',	// the format displayed for the user
        selectors: true,             	// whether month/year dropdowns are shown
        min: 0,                    // min selectable day (100 days backwards)
        max: 100,                    	// max selectable day (100 days onwards)
        offset: [-10, 0],            	// tweak the position of the calendar
        speed: 'fast',               	// calendar reveal speed
        firstDay: 1                  	// which day starts a week. 0 = sunday, 1 = monday etc..
    });

    var num = $('[id^=EventImgOverlay]').length;
    if(num == 5) {
        $('#add_more_image').remove();
    }

    $('#add_more_image').click(function(){
        var $this = $(this);
        num = $('[id^=EventImgOverlay]').length+1;
        $this.before('<br><input type="file" id="EventImgOverlay'+num+'" name="data[Event][img_overlay_'+num+']">');
        if(num == 5){
            $this.remove();
        }
    });

    $('.del-btn').each(function(){
        $(this).click(function(){
            var ans = confirm('Do you want to delete ' + $(this).attr('item_name') + ' from list?');
            if(!ans){
                return false;
            }
        });
    });

    $('.delete_image').each(function(){
        $(this).click(function(){
            var dataName = $(this).attr('data-name');
            $("img[data-name="+ dataName + "]").remove();
            $(this).before('<input type="hidden" name=data[Event]['+ dataName+ '_delete]" value="delete" />');
            $(this).remove();
        });
    })

    //Popover control
    var $form = $("#EventAddForm, #EventEditForm");
    $('a.pop', $form).click(function(){
        return false;
    });

    $('a.pop', $form).mouseenter(function(){
        $(this).popover('show');
    });

    $('a.pop', $form).mouseout(function(){
        $(this).popover('hide');
    });

    $('select', $form).addClass('span4');

});