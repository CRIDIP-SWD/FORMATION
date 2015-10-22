define([
  'app',
  'backbone'
],
function(app, Backbone) {

  "use strict";

  return Backbone.Layout.extend({

    template: Handlebars.compile('{{#if count}}{{number count}} Selected{{/if}}'),

    tagName: 'div',

    attributes: {
      class: 'tool vertical-center pagination-number'
    },

    serialize: function() {
      return this.options.widgetOptions;
    },

    updateCount: function() {
      this.options.widgetOptions.count = $('.select-row:checked').length;
      this.render();
    },

    initialize: function() {
      this.options.widgetOptions = {};
      this.updateCount();
      this.collection.on('select', this.updateCount, this);
    }
  });
});