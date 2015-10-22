//  Select Core UI component
//  Directus 6.0

//  (c) RANGER
//  Directus may be freely distributed under the GNU license.
//  For all details and documentation:
//  http://www.getdirectus.com

/*
{
  "2up": {
	"name": "2-Up Images",
	"thumb_url": "http://example.com/image.gif",
	"column_blacklist": [
	   "bb_title",
	   "bb_url"
	]
  },
  "3up": {
	"name": "3-Up Images",
	"thumb_url": "http://example.com/image.gif",
	"column_blacklist": [
		"hero_client"
	]
  }
}
*/

define(['app', 'backbone'],function(app, Backbone) {

	"use strict";

	var Module = {};

	var template = '<select name="{{name}}" {{#if readonly}}disabled{{/if}}> \
	{{#if allow_null}}<option value="">{{placeholder_text}}</option>{{/if}}{{#options}} \
	<option value="{{key}}" data-column-blacklist="{{column_blacklist}}" {{#if selected}}selected{{/if}}>{{value}}</option>{{/options}}</select>';

	Module.id = 'template_chooser';
	Module.dataTypes = ['VARCHAR', 'INT', 'TINYINT'];
	Module.variables = [
		{id: 'options', ui: 'textarea', options:{'rows': 25}  },
		{id: 'allow_null', ui: 'checkbox'}
	];

	Module.Input = Backbone.Layout.extend({

		template: Handlebars.compile(template),

		// Event Declarations
		events: {
			'input select': 'updateVisibleColumns'
		},

		tagName: 'div',

		attributes: {
			'class': 'field'
		},

		// Update visible fields/inputs
		updateVisibleColumns: function(e) {
			var columnBlacklist = this.$el.find('select option:selected').data('columnBlacklist').split(",");
			$('.batchcontainer').show(); // Needs to be scoped/limited to this overlay
			for (var i = 0; i < columnBlacklist.length; i++) {
				$("#edit_field_" + columnBlacklist[i]).parent().parent().parent().hide();
			}
		},

		serialize: function() {
			var selectedValue = this.options.value;
			var options = this.options.settings.get('options');

			if (_.isString(options)) {
				try {
					options = $.parseJSON(options);
				} catch (err) {
					console.log("Your 'Template Chooser' UI has malformed JSON");
				}
			}

			options = _.map(options, function(value, key) {
				var item = {};
				item.value = value.name;
				item.thumb_url = value.thumb_url;
				item.column_blacklist = value.column_blacklist;
				item.key = key;
				item.selected = (item.key == selectedValue);
				return item;
			});

			return {
				options: options,
				name: this.options.name,
				comment: this.options.schema.get('comment'),
				readonly: !this.options.canWrite,
				allow_null: this.options.settings.get('allow_null'),
				placeholder_text: (this.options.settings.get('placeholder_text')) ?  this.options.settings.get('placeholder_text') : "Select from Below"
			};
		}

	});

	Module.list = function(options) {
		var val = _.isString(options.value) ? options.value.replace(/<(?:.|\n)*?>/gm, '').substr(0,100) : '';
		return val;
	};

	return Module;
});