//javascript functions

/**
 * @type {Element}
 */
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