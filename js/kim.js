//javascript functions
/* 
/**
 * @type {Element}
 */

const $ = jQuery;

var root = document.querySelector(':root');

/**
 * @type {boolean}
 */
var def = true;


/**
 * 
 * Inverts the color scheme of the theme
 * 
 * @return {void}
 * 
 */
function invert() {
    if (def) {
        root.style.setProperty('--main-theme-color', '#673AB7');
        root.style.setProperty('--theme-background-color', '#B39DDB');
        root.style.setProperty('--theme-accent-color', '#00C853');
        root.style.setProperty('--theme-accent-shadow', '#1B5E20');
        root.style.setProperty('--theme-accent-shadow', '#1B5E20');
        root.style.setProperty('--theme-color-dark', '#311B92');
    } else {
        root.style.setProperty('--main-theme-color', '#4CAF50');
        root.style.setProperty('--theme-background-color', '#A5D6A7');
        root.style.setProperty('--theme-accent-color', '#7C4DFF');
        root.style.setProperty('--theme-accent-shadow', '#311B92');
        root.style.setProperty('--theme-color-dark', '#1B5E20');
    }
    def = !def;
}

$(document).ready(() => {
    $('img').on('click', event => {
        event.preventDefault();
        console.log(event.target);
        var src = $(event.target).attr('src').replace(/-[0-9]+x[0-9]+\.png$/i, '.png');
        console.log(src);
        $('#modal-container').removeClass('hide');
        var img = document.createElement('img');
        img.src = src;
        img.srcset = $(event.target).attr('srcset');
        img.classList.add('hide');

        $('#modal').append($(img));
        $('#modal-link').attr('href', src);

        var text = src.split('/')[src.split('/').length-1];
        console.log(text);
        $('#modal-link').text(text);

        $(img).on('load', event => {
            img.classList.remove('hide');
            if ($('#modal').width() > $('#modal-image').height()) {
                $('#modal').removeClass('portrait');
                $('#modal').addClass('landscape');
            } else {
                $('#modal').removeClass('landscape');
                $('#modal').addClass('portrait');            
            }
        })

        console.log($('#modal-image').width() > $('#modal-image').height());
    });

    $('#modal-container, #modal-close').on('click', event => {
        if ($('#modal-container').hasClass('hide')) {
            return;
        }
        console.log('closing');
        $('#modal-container').addClass('hide');
        $('#modal img').remove();
    });

    $('#modal-container *:not(#modal-close)').on('click', event => {
        event.stopPropagation();
    });

});