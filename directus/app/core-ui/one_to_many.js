//  Relational core UI component
//  Directus 6.0

//  (c) RANGER
//  Directus may be freely distributed under the GNU license.
//  For all details and documentation:
//  http://www.getdirectus.com
/*jshint multistr: true */

define(['app', 'backbone', 'core/table/table.view', 'schema/SchemaManager', 'core/UIView'], function(app, Backbone, TableView, SchemaManager, UIView) {

  "use strict";

  var Module = {};

  Module.id = 'one_to_many';
  Module.dataTypes = ['ONETOMANY'];

  Module.variables = [
    {id: 'visible_columns', ui: 'textinput', char_length: 255, required: true},
    {id: 'result_limit', ui: 'numeric', char_length: 10, def: '100', comment: 'Maximum number of results to fetch'},
    {id: 'add_button', ui: 'checkbox'},
    {id: 'remove_button', ui: 'checkbox'}
  ];

  var template = '<div class="related-table"></div> \
                  <div class="btn-row">{{#if showAddButton}}<button class="btn btn-primary" data-action="add" type="button">Add New {{{capitalize tableTitle}}} Item</button>{{/if}}';

  Module.Input = UIView.extend({

    tagName: 'div',

    attributes: {
      'class': 'field'
    },

    template: Handlebars.compile(template),
    events: {
      'click div.related-table > div td:not(.delete)': 'editRow',
      'click button[data-action=add]': 'addRow',
      'click td.delete': 'deleteRow'
    },

    editRow: function(e) {
      if (!this.canEdit) {
        return;
      }
      var cid = $(e.target).closest('tr').attr('data-cid');
      var model = this.relatedCollection.get(cid, true);
      this.editModel(model);
    },

    deleteRow: function(e) {
      var cid = $(e.target).closest('tr').attr('data-cid');
      var model = this.relatedCollection.get(cid);
      var relatedColumnName = this.columnSchema.relationship.get('junction_key_right');

      if (model.isNew()) return this.relatedCollection.remove(model);

      model.set(relatedColumnName, '');
    },

    addRow: function() {
      var collection = this.relatedCollection;
      this.addModel(new collection.model({}, {collection: collection, parse: true, structure: collection.structure, table: collection.table, privileges: collection.privileges}));
    },

    editModel: function(model) {
      var EditView = require("modules/tables/views/EditView");
      var columnName = this.columnSchema.relationship.get('junction_key_right');
      var view = new EditView({model: model, hiddenFields: [columnName]});

      view.headerOptions.route.isOverlay = true;
      view.headerOptions.route.breadcrumbs = [];
      view.headerOptions.basicSave = true;

      view.events = {
        'click .saved-success': function() {
          this.save();
        },
        'click #removeOverlay': function() {
          app.router.removeOverlayPage(this);
        }
      };

      app.router.overlayPage(view);
      
      view.save = function() {
        model.set(model.diff(view.editView.data()));
        app.router.removeOverlayPage(this);
      };
    },

    addModel: function(model) {

      var EditView = require("modules/tables/views/EditView");
      var collection = this.relatedCollection;
      var columnName = this.columnSchema.relationship.get('junction_key_right');
      var id = this.model.id;
      var view = new EditView({
        model: model,
        collectionAdd: true,
        hiddenFields: [columnName],
        parentField: {
          name: columnName,
          value: id
      }});

      view.headerOptions.route.isOverlay = true;
      view.headerOptions.route.breadcrumbs = [];
      view.headerOptions.basicSave = true;

      view.events = {
        'click .saved-success': function() {
          this.save();
        },
        'click #removeOverlay': function() {
          app.router.removeOverlayPage(this);
        }
      };

      app.router.overlayPage(view);

      view.save = function() {
        var data = view.editView.data();
        data[columnName] = id;
        model.set(data);
        if (model.isValid()) {
          app.router.removeOverlayPage(this);
          collection.add(model, {nest: true});
        }
      };
    },

    serialize: function() {
      return {
        title: this.name,
        tableTitle: this.relatedCollection.table.get('table_name'),
        canEdit: this.canEdit,
        showChooseButton: this.showChooseButton, //&& this.canEdit,
        showAddButton: this.showAddButton && this.canEdit
      };
    },

    afterRender: function() {
      this.setView('.related-table', this.nestedTableView).render();
    },

    validateRelationship: function() {
    },

    initialize: function (options) {

      // Make sure that the relationship type is correct
      if (!this.columnSchema.relationship ||
           'ONETOMANY' !== this.columnSchema.relationship.get('type')) {
        throw "The column " + this.columnSchema.id + " need to have a relationship of the type ONETOMANY inorder to use the one_to_many ui";
      }

      this.canEdit = !(options.inModal || false);

      var relatedCollection = this.model.get(this.name);
      var joinColumn = this.columnSchema.relationship.get('junction_key_right');

      var ids = [];

      ids = relatedCollection.pluck('id');

      if(ids.length > 0) {

        //Make sure column we are joining on is respected
        var filters = relatedCollection.filters;
        if(filters.columns_visible) {
          filters.columns_visible.push(joinColumn);
        } else {
          filters.columns_visible = [joinColumn];
        }
        //Pass this filter to select only where column = val
        filters.related_table_filter = {column: joinColumn, val: this.model.id};

        if(this.columnSchema.options.get('result_limit') !== undefined) {
          filters.perPage = this.columnSchema.options.get('result_limit');
        }

        relatedCollection.fetch({includeFilters: false, data: filters});
      }

      this.showRemoveButton = this.columnSchema.options.get('remove_button') === "1";
      this.showAddButton = this.columnSchema.options.get('add_button') === "1";

      this.nestedTableView = new TableView({
        collection: relatedCollection,
        selectable: false,
        sortable: false,
        footer: false,
        saveAfterDrop: true,
        deleteColumn: (relatedCollection.structure.get(joinColumn).get('is_nullable') === "YES") && this.canEdit && this.showRemoveButton,
        hideColumnPreferences: true,
        hideEmptyMessage: true,
        tableHead: false,
        filters: {
          booleanOperator: '&&',
          expressions: [
            //@todo, make sure that this can also nest
            {column: joinColumn, operator: '===', value: this.model.id}
          ]
        }
      });

      if(this.columnSchema.has('sort')) {
        relatedCollection.setOrder('sort','ASC',{silent: true});
      }

      this.listenTo(relatedCollection, 'change', function() {
        //Check if any rendered objects in collection to show or hide header
        if(this.relatedCollection.filter(function(d){return d.get(app.statusMapping.status_name) !== app.statusMapping.deleted_num;}).length > 0) {
          this.nestedTableView.tableHead = true;
        } else {
          this.nestedTableView.tableHead = false;
        }
        this.nestedTableView.render();
      }, this);

      this.relatedCollection = relatedCollection;
    }

  });

  Module.list = function() {
    return 'x';
  };

  return Module;
});