define([
  'app',
  'backbone'
],
function(app, Backbone) {

  "use strict";

  return Backbone.Layout.extend({
    template: Handlebars.compile(' \
      <ul class="tools left big-space"> \
        {{#mapping}} \
          <li class="tool"><span data-value="{{id}}" style="color: {{color}}" class="action actionBtn">{{name}}</span></li> \
        {{/mapping}} \
        {{#if batchEdit}} \
        <li class="tool div-left"><span id="batchEditBtn" class="action">Batch Edit</span></li> \
        {{/if}} \
      </ul> \
    '),

    tagName: 'li',
    attributes: {
      'class': 'input-and-button'
    },

    events: {
      'click .actionBtn': function(e) {
        var value = $(e.target).closest('span').attr('data-value');
        if(value == 0) {
          var that = this;
          app.router.openModal({type: 'confirm', text: 'Are you sure? This item will be removed from the system!', callback: function() {
            that.doAction(e);
          }});
        } else {
          this.doAction(e);
        }
      },
      'click #batchEditBtn': function(e) {
        var $checked = $('.select-row:checked');
        var ids = $checked.map(function() {
          return this.value;
        }).toArray().join();

        var route = Backbone.history.fragment.split('/');
        route.push(ids);
        app.router.go(route);
      }
    },

    doAction: function(e) {
      var value = $(e.target).closest('span').attr('data-value');
      var collection = this.collection;
      var active = collection.getFilter('active');

      var $checked = $('.select-row:checked');
      var expectedResponses = $checked.length;


      if(!isNaN(active)) {
        var name = {};
        name[app.statusMapping.status_name] = parseInt(active);
        var startCount = collection.where(name).length;
      }

      var success = function() {
        expectedResponses--;
        if (expectedResponses === 0) {
          collection.trigger('visibility');
          collection.trigger('select');
          if(startCount) {
            var name = {};
            name[app.statusMapping.status_name] = parseInt(active);
            if(collection.where(name).length != startCount) {
              collection.updateActiveCount(startCount - collection.where({name: parseInt(active)}).length);
            }
          }
        }
      };

      $checked.each(function() {
        var id = this.value;
        var model = collection.get(id);
        var options = {silent: true, patch:true, validate:false, success: success};
        
        try {
          app.changeItemStatus(model, value, options);
        } catch(e) {
          setTimeout(function() {
            app.router.openModal({type: 'alert', text: e.message});
          }, 0);
        }
      });
    },

    serialize: function() {
      var data = this.options.widgetOptions;
      var canDelete = this.collection.hasPermission('delete') || this.collection.hasPermission('bigdelete');
      var hasStatusColumn = this.collection.table.columns.get(app.statusMapping.status_name);

      var mapping = app.statusMapping.mapping;
      data.mapping = [];
      for (var key in mapping) {
        // if there's not permission to delete, we skip delete
        if (!canDelete && key==app.statusMapping.deleted_num) {
          continue;
        }

        // if there's not status column we skip everything but delete
        if (!hasStatusColumn && key != app.statusMapping.deleted_num) {
          continue;
        }
        
        var entry = mapping[key];
        entry.id = key;
        data.mapping.push(entry);
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

      return this.options.widgetOptions;
    },
    beforeRender: function() {
      this.stopListening(this.collection, 'select');
      this.listenTo(this.collection, 'select', function() {
        var batchEdit = $('.select-row:checked').length > 1;
        if(this.options.widgetOptions.batchEdit != batchEdit) {
          this.options.widgetOptions.batchEdit = batchEdit;
          this.render();
        }
      }, this);
    },
    initialize: function() {
      if(!this.options.widgetOptions) {
        this.options.widgetOptions = {};
      }
    }
  });
});