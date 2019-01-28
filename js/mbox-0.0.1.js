/***
The MIT License (MIT)
Copyright (c) 2015 Brian Seymour
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
 ***/

;(function($) {
    mbox = {

        template: '' +
            '<div class="mbox-wrapper">' +
                '<div class="mbox z-depth-1">' +
                    '<h5>$$$_message_$$$</h5>' +
                    '$$$_input_$$$' +
                    '<div class="right-align">' +
                        '$$$_buttons_$$$' +
                    '</div>' +
                '</div>' +
            '</div>',

        alert: function(message, cb) {
            this.open('alert', message);

            $('.mbox-wrapper .mbox-ok-button').click(function() {
                mbox.close();
                cb && cb();
            });
        },

        confirm: function(message, cb) {
            this.open('confirm', message);

            $('.mbox-wrapper .mbox-ok-button').click(function() {
                mbox.close();
                cb && cb(true);
            });

            $('.mbox-wrapper .mbox-cancel-button').click(function() {
                mbox.close();
                cb && cb(false);
            });
        },

        prompt: function(message, cb) {
            this.open('prompt', message);

            $('.mbox-wrapper .mbox-ok-button').click(function() {
                var entered_text = $('.mbox-wrapper input').val();

                mbox.close();
                cb && cb(entered_text);
            });

            $('.mbox-wrapper .mbox-cancel-button').click(function() {
                mbox.close();
                cb && cb(false);
            });
        },

        custom: function(options) {
            if (typeof options !== 'object') {
                throw 'Custom box requires argument 1 to be an object';
            }

            var template = this.template;
            template = template.replace(/\$\$\$_input_\$\$\$/gi, '<hr />');

            if (!options.buttons || options.buttons.length === 0) {
                throw 'You must provide at least 1 button';
            }

            var buttons = '';

            var i = 0;
            options.buttons.forEach(function(button) {
                var serialized_button = 'mbox-custom-button-' + i;

                buttons += mbox
                    .gen_button(
                        button.color || 'grey lighten-4',
                        button.label || '',
                        serialized_button
                    );

                ++i;
            });

            template = template.replace(/\$\$\$_message_\$\$\$/gi, options.message || '');
            template = template.replace(/\$\$\$_buttons_\$\$\$/gi, buttons);

            // prevent scrolling on the body
            $('body')
                .append(template)
                .addClass('mbox-open');

            i = 0;
            options.buttons.forEach(function(button) {
                var serialized_button = 'mbox-custom-button-' + i;

                $('.' + serialized_button).click(function() {
                    if (button.callback) {
                        button.callback();
                    } else {
                        mbox.close();
                    }
                });

                ++i;
            });

            // show the box
            $('.mbox-wrapper').show();
        },

        open: function(type, message) {
            var template = this.template;
            var input = '<input type="text" />';
            var buttons;

            switch (type) {
                case 'alert':
                    buttons = this.gen_button('#34a5a1', 'Ok', 'mbox-ok-button');
                    template = template.replace(/\$\$\$_input_\$\$\$/gi, '<hr />');
                    break;

                case 'confirm':
                    buttons = this.gen_button('#34a5a1', 'Ok', 'mbox-ok-button');
                    buttons += this.gen_button('grey darken-2', 'Cancelar', 'mbox-cancel-button');
                    template = template.replace(/\$\$\$_input_\$\$\$/gi, '<hr />');
                    break;

                case 'prompt':
                    buttons = this.gen_button('#34a5a1', 'Ok', 'mbox-ok-button');
                    buttons += this.gen_button('grey darken-2', 'Cancel', 'mbox-cancel-button');
                    template = template.replace(/\$\$\$_input_\$\$\$/gi, input);
                    break;
            }

            if (message) template = template.replace(/\$\$\$_message_\$\$\$/gi, message);
            if (buttons) template = template.replace(/\$\$\$_buttons_\$\$\$/gi, buttons);

            // prevent scrolling on the body
            $('body')
                .append(template)
                .addClass('mbox-open');

            // show the box
            $('.mbox-wrapper').show();
        },

        close: function() {
            // hide the box
            $('.mbox')
                .hide(0, function() {
                    $(this).closest('.mbox-wrapper').remove();
                });

            // allow scrolling on body again
            $('body').removeClass('mbox-open');

            // unbind all the mbox buttons
            $('.mbox-button').unbind('click');
        },

        gen_button: function(color, text, type) {
            return '&nbsp;<button '+
                'type="button" '+
                'class="mbox-button ' + type + ' '+
                'waves-effect waves-light btn ' + color + '">' + text +
                '</button>';
        }

    };
})(jQuery);