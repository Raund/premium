var pageHash = window.location.hash.substr(1);
if(pageHash.indexOf("service") + 1){
    window.location.hash = '';
}

$(function(){
    /* парсим списки и таблицу в описании номера */
    $('.rooms-block').each(function () {
        $(this).find('ul').appendTo($(this).find('.conveniences-block'));
    });
    /* END парсим списки и таблицу в описании номера */

    /* появление и пропадание удобств */
    /*перша відкрита за умовчанням*/
    if(!pageHash) {
        $('.services-hide:first').addClass('webstudio-active');
        $('.services-arrow:first').addClass('rotate-90');
    }
    /* END перша відкрита за умовчанням*/
    $('.r-tab').on('click', function(){
        $(this).parent().find('.conveniences-block').toggleClass('webstudio-active');
        $(this).find('.arrow-conveniences').toggleClass('rotate-90');
    });

    $('.services-title, .services-arrow').on('click', function(){
        var $block = $(this).closest('.services-block'),
        $description = $block.find('.services-hide'),
        $arrow = $block.find('.services-arrow');

        $description.toggleClass('webstudio-active');
        $arrow.toggleClass('rotate-90');

        if($description.hasClass('webstudio-active')){
            $('body').animate({
                scrollTop: $block.offset().top
            }, 1000);
        }
    });

    $('#' + pageHash).find('.services-title').trigger('click');

    /* END появление и пропадание удобств */

    /* выбор даты бронирования */
    var dateFormat = "dd/mm/yy",
        from = $( "#from" )
            .datepicker({
                defaultDate: "0",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: dateFormat,
                minDate: new Date()
            })
            .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            }),
        to = $( "#to" ).datepicker({
                defaultDate: "0",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: dateFormat,
                minDate: new Date()
            })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }

        return date;
    }
    /* END выбор даты бронирования */

    /* просмотр фото номеров */
    $('.webstudio-gallery-rooms').each(function(){
        $(this).unitegallery({
            gallery_theme: "compact",
            gallery_width:"100%",              //gallery width
            gallery_height:285,
            thumb_width:85,
            thumb_height:55,
            strip_space_between_thumbs:0,
            thumb_border_width:0,
            thumb_over_border_width:0,
            thumb_image_overlay_effect:false,
            thumb_border_effect:false,
            thumb_color_overlay_effect:false,
            slider_enable_arrows: false,
            slider_enable_zoom_panel: false,
            strippanel_enable_handle: false,
            strippanel_padding_top:0,         //space from top of the panel
            strippanel_padding_bottom:0,
            strippanel_padding_right:0,         //space from top of the panel
            strippanel_padding_left:0,
            slider_enable_zoom_panel: false,
            slider_control_zoom: false,
            slider_loader_type: 7,
        });
    });
    /* END просмотр фото номеров */

    /* просмотр фото на страницах Услуги, События, Галерея */
    $('.webstudio-gallery').each(function(){
        var MyWidthEvents = $(this).parent().width()/4;
        var MyHeightEvents = MyWidthEvents/1.5;
        $(this).unitegallery({
            gallery_theme: "tilesgrid",
            gallery_width:"100%",              //gallery width
            grid_space_between_cols:0,
            grid_space_between_rows:0,
            grid_space_between_mobile:0,
            tile_enable_border:false,
            tile_enable_shadow:false,
            grid_padding:0,
            tile_width: MyWidthEvents,
            tile_height: MyHeightEvents,
            grid_num_rows:10
        });
    });

    /* END просмотр фото на страницах Услуги, События, Галерея */

    /* слайдер на главной*/
    var sliderApi = $("#webstudio-slider").unitegallery({
        gallery_theme: "slider",
        gallery_width:"100%",              //gallery width
        gallery_height:470,
        slider_enable_text_panel: true,       //true,false - enable the text panel
        slider_textpanel_always_on: true,      //true,false - text panel are always on, false - show only on mouseover
        slider_textpanel_text_valign:"bottom",
        slider_textpanel_padding_bottom:20,
        slider_textpanel_height: null,
        slider_textpanel_bg_color:"#000000",      //textpanel background color
        slider_textpanel_bg_opacity: 0.5,
        slider_textpanel_title_text_align:"left",
        slider_textpanel_title_color:"#fffafa",        //textpanel title color. if null - take from css
        slider_textpanel_title_font_family:"GeorgiaBoldItalic",    //textpanel title font family. if null - take from css
        slider_textpanel_title_font_size: 34,
        slider_textpanel_desc_text_align:"left",
        slider_textpanel_desc_color:"#fffafa",        //textpanel title color. if null - take from css
        slider_textpanel_desc_font_family:"RobotoBold",    //textpanel title font family. if null - take from css
        slider_textpanel_desc_font_size: 20,
        slider_enable_bullets: false,
        slider_enable_progress_indicator: false,
        slider_control_zoom: false,
        slider_arrow_left_offset_hor:60,
        slider_arrow_right_offset_hor:60
    });
    /* END слайдер на главной*/

    /* фото отеля в футере */
    var MyWidthFooter = $("div.hotel-photo").width()/3;
    var MyHeightFooter = MyWidthFooter/1.5;
    $("#webstudio-bottom-gallery").unitegallery({
        gallery_theme: "tilesgrid",
        gallery_width:"100%",              //gallery width
        grid_space_between_cols:0,
        grid_space_between_rows:0,
        grid_space_between_mobile:0,
        tile_enable_border:false,
        tile_enable_shadow:false,
        grid_padding:0,
        tile_width: MyWidthFooter,
        tile_height: MyHeightFooter,
        grid_num_rows:2
    });
    /* END фото отеля в футере */

    /*sliderApi.on("item_change", function(num, data){
    console.info(num, data);
    console.info('link>>>', $('#webstudio-slider img:nth-child('+num+')').attr('data-link'))
    });*/

    $('#booking-btn').on('click', function(e){
        if(!$('#from').val() || !$('#to').val()){
            e.preventDefault();
            return false;
        }
    });

    $('#menu-name').on('click', function () {
        $('#menu').animate({right:0}, 1500);
        $(this).animate({opacity:0}, 1500);
        $('#menu-close').animate({opacity:1}, 1500);
    })
    $('#menu-close').on('click', function () {
        $('#menu').animate({right:-330}, 1500);
        $(this).animate({opacity:0}, 1500);
        $('#menu-name').animate({opacity:1}, 1500);
    })

});
//Скрипт формы обратной связи

document.addEventListener("DOMContentLoaded", function(){
    $("#contactform").submit(function(e){
        e.preventDefault();
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var message = $("textarea[name=message]").val();
        var token = $("#token").text();
        //var dataString = 'name='+name+'&email='+email+'&message'+message+'&_token='+token;
        var data = {
            name: name,
            email: email,
            message: message,
            '_token': token
        }
        $.ajax({
            method: "POST",
            url : "/contact",
            data : data,
            dataType : "json",

            success: function(data){
                console.info('Server response: ', data);
                if(data.status == 'success'){
                    swal("Ваше повідомлення успішно відправлено!"," ","success");
                    jQuery("#contactform").trigger("reset");
                }
            },
            error:function(data){
                swal ("Сталася помилка при відправці повідомлення!");
                jQuery("#contactform").trigger("reset");
            }
        },"json");

    });
});
