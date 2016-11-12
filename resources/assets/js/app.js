
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

const sceneTemplate = '<div><div v-for="data in scenes">{{ doSomething(data) }}</div></div>';

const messages = new Vue({
  el: '.messages-container',
  data: {
    scenes: []
  },
  methods: {
    getScenes: (cb) => {
      fetch('/api/v1/messages/').then(function(response) {
        return response.json();
      }).then(function(data) {
        messages.scenes = data;
      });
    },
    doSomething: (data) => {
      const scene = JSON.parse(data.scene);
      if (scene.hasOwnProperty('text')) {
        return scene.text;
      }
      return 'something else...';
    }
  },
  template: sceneTemplate
});

messages.getScenes();
