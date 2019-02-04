
$(function(){
    $('.resource-delete').on('click', function(event){
        if(confirm('Вы уверены?')){
            var $thisEl = $(this);
            $.ajax({
                url: $thisEl.attr('href'),
                method: "POST",
                data: {
                    '_method': 'Delete',
                    '_token' : $('#token').text()
                },
                success: function(data){
                    console.info('Server response: ', data);
                    if(data.status == 'success'){
                        $thisEl.parents('tr').fadeOut(3000);
                    }
                    alert(data.message);
                }
            })
        }
        event.preventDefault();

    });
    $('.resource-save').on('click', function(event){
        //alert('tut');
        get_wysiwyg();
        var data = $('form#resource-form').serialize();
        // var $thisEl = $(this);
        $.ajax({
            url: '',
            method: "POST",
            data: data,
            success: function(data){
                console.info('Server response: ', data);
                if(data.status == 'success'){
                    alert(data.message);
                }else{
                    alert('Помилка: ' + data.message)
                }

                if(data.redirect){
                    document.location = data.redirect;
                }
                if(data.status == 'fail'){
                    alert(data.message);
                }
            },
            error: function(data, type, details){
                console.info('Server error: ', arguments);

                var message = 'Помилка збереження:\n';
                if(data.responseJSON){
                    for(var key in data.responseJSON){
                        message += data.responseJSON[key] + '\n';
                    }
                }else{
                    message += details;
                }

                alert(message);
            }
        });
        event.preventDefault();

    });

    init_wysiwyg();
});

function init_wysiwyg(){
    var id = '';
    var editors = $('textarea');
    editors.each(function(i, editor){;
        $(editor).attr('id', 'textarea-wysiwyg-'+i);
        CKEDITOR.replace('textarea-wysiwyg-'+i);
    });
}

function get_wysiwyg(){
    var id = '';
    var editors = $('textarea');
    editors.each(function(i, editor){
        id = $(editor).attr('id')
        if(id && CKEDITOR.instances[id]) {
            $('#' + id).val(CKEDITOR.instances[id].getData());
        }
    });
}