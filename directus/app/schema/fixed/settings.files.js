define(function(require, exports, module) {

  "use strict";

  var SettingsFilesSchema = module.exports;

  SettingsFilesSchema.structure = [
    {id: 'file_naming', ui: 'select', char_length: 255, options: {allow_null: false, options: '{ \
        "file_name":"File Name", \
        "file_id":"Files ID", \
        "file_hash":"File Hash" \
      }'}, comment: "The file-system naming convention for uploads"
    },
    {id: 'thumbnail_quality', ui: 'numeric', char_length: 255, options: {options: 'small'}, comment: "The quality percentage for Directus thumbnails"},
    {id: 'thumbnail_crop_enabled', ui: 'checkbox', comment: 'Uncheck if your project requires seeing uncropped Directus Thumbnails'}
  ];

  return SettingsFilesSchema;
});