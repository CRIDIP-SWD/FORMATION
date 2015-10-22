define([
  'app',
  'backbone',
  'core/PreferenceModel'
],
function(app, Backbone, PreferenceModel) {

  "use strict";

  return Backbone.Layout.extend({
    // add bookmark button was moved to sidebar
    // if false is a way to keep it there unavailable just in case
    template: Handlebars.compile('\
    {{#if hasActiveColumn}} \
    <div class="simple-select dark-grey-color simple-gray left" title="Choose which items are displayed"> \
      <span class="icon icon-triangle-down"></span> \
      <select id="visibilitySelect" name="status" class="change-visibility"> \
        <optgroup label="Status"> \
          <option data-status value="{{allKeys}}">View All</option> \
          {{#mapping}} \
            <option data-status value="{{id}}" {{#if isSelected}} selected {{/if}}>View {{capitalize name}}</option> \
          {{/mapping}} \
        </optgroup> \
      </select> \
      <select id="template" style="display:none;width:auto;"><option id="templateOption"></option></select> \
    </div> \
    {{/if}}'),

    tagName: 'div',
    attributes: {
      'class': 'tool'
    },

    events: {
      'change #visibilitySelect': function(e) {
        var $target = $(e.target).find(":selected");
        if($target.attr('data-status') !== undefined && $target.attr('data-status') !== false) {
          var value = $(e.target).val();
          var name = {currentPage: 0};
          name[app.statusMapping.status_name] = value;
          this.collection.setFilter(name);

          this.listenToOnce(this.collection.preferences, 'sync', function() {
            if(this.basePage) {
              this.basePage.removeHolding(this.cid);
            }
            if(this.defaultId) {
              this.collection.preferences.set({title:null, id: this.defaultId});
            }
          });
        }
      }
    },

    serialize: function() {
      var data = {hasActiveColumn: this.options.hasActiveColumn, mapping: []};
      var mapping = app.statusMapping.mapping;
      var statusSelected = this.collection.getFilter(app.statusMapping.status_name);

      var keys = [];
      for(var key in mapping) {
        //Do not show option for deleted status
        if(key != app.statusMapping.deleted_num) {
          data.mapping.push({
            id: key,
            name: mapping[key].name,
            sort: mapping[key].sort,
            isSelected: statusSelected == key ? true : false
          });
          keys.push(key);
        }
      }

      data.mapping.sort(function(a, b) {
        if(a.sort < b.sort) {
          return -1;
        }
        if(a.sort > b.sort) {
          return 1;
        }
        return 0;
      });

      data.allKeys = keys.join(',');
      return data;
    },

    afterRender: function() {
      if(this.options.hasActiveColumn) {
        $('#visibilitySelect').val(this.collection.preferences.get(app.statusMapping.status_name));
      }

      // Adjust dropdown width dynamically
      // var sel = this.$el.find('#visibilitySelect');
      // this.$el.find('#templateOption').text( sel.find(":selected").text() );
      // sel.width( this.$el.find('#template').width() * 1.03 + 10 ); // +10 is for arrow on right
    },
    initialize: function() {
      var activeTable = this.collection.table.id;

      this.basePage = this.options.basePage;

      this.collection.on('sync', this.render, this);

      if(this.collection.table.columns.get(app.statusMapping.status_name)) {
        this.options.hasActiveColumn = true;
      }

      var options = {};
      if(app.router.loadedPreference) {
        options = {newTitle: app.router.loadedPreference};
      }

      this.listenToOnce(this.collection.preferences, 'sync', function() {
        if(this.basePage) {
          this.basePage.removeHolding(this.cid);
        }
        if(this.defaultId) {
          this.collection.preferences.set({title:null, id: this.defaultId});
        }
      });

      this.defaultId = this.collection.preferences.get('id');
      this.collection.preferences.fetch(options);
      if(this.basePage) {
        this.basePage.addHolding(this.cid);
      }
    }
  });
});