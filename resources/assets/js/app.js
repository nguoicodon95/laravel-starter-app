
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('child', {
  beforeCreate: () => {
    //
  },
  template: '<div>Child component?</div>'
});

new Vue({
  el: '#app',
  beforeCreate: () => {
    fetch('/api/v1/messages/').then(function(response) {
      return response.json();
    }).then(function(data) {
      console.log(JSON.parse(data[0].scene).text);
    });
  },
  data: {
   message: 'Wrapping message...'
  }
});
