import Simditor from 'simditor';

Simditor.locale = 'en-US';
$( document ).ready(function() {
    if( $('.body-editor').length ) {
        var editor = new Simditor({
            textarea: $('.body-editor')
            //optional options
        });
    }
});
