
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '328537609d1c2f4f43bd',
    cluster: 'mt1',
    encrypted: true
});

function blinker() {
    $('.blinking').fadeOut(500);
    $('.blinking').fadeIn(500);
}
setInterval(blinker, 1000);

window.Echo.channel('test-channel').listen('LinkCreated', e => {
    e.message = 'A new link has been created ';
      $('.notify-hide').removeClass('notify-hide').addClass('notifications-menu');
      $('.blink').removeClass('fa-bell-o').addClass('fa-bell blinking');
      $('.notification-menu').append(
        '<a class="text-black dropdown-item display-4" href="#" aria-expanded="false">\
         <i class="fa fa-users text-aqua"></i> ' + e.message + 'at \
         <br><a href="/links/"'+ e.link.id + '" target="_blank">' + e.link.address + '\
        </a></a>'
      );
});

window.Echo.channel('traian').listen('CategoryCreated', e => {
    e.message = 'A new category has been created !!';
    $('.notify-hide').removeClass('notify-hide').addClass('notifications-menu');
      $('.blink').removeClass('fa-bell-o').addClass('fa-bell blinking');
      $('.notification-menu').append(
        '<a class="text-black dropdown-item display-4" href="#" aria-expanded="false">\
          <i class="fa fa-users text-aqua"></i> ' + e.message + '<br>' + e.category.name + '\
        </a>'
      );
});

setTimeout(function(){
   var data = { message: 'test notification' };
   $('.notify-hide').removeClass('notify-hide').addClass('notifications-menu');
   $('.blink').removeClass('fa-bell-o').addClass('fa-bell blinking');
   $('.notification-menu').append(
  '<a class="text-black dropdown-item display-4" href="#" aria-expanded="false">\
    <i class="fa fa-users text-aqua"></i> '+data.message+'</a>');
}, 120000);
