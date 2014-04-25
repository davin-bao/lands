/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	//config.uiColor = '#AADC6E';
  //config.removePlugins = 'elementspath';
  //config.resize_enabled = false;

  config.language = 'zh-cn';
  config.filebrowserImageUploadUrl = imageUploadUrl;

  config.toolbar = [
    '/',
    {name: 'paragraph',items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
    {name: 'insert',items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar','Link', 'Unlink','Source', '-', 'Preview']},
    '/',
    { name: 'basicstyles',items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
    { name: 'styles',items: ['Format', 'Font', 'FontSize']},
    { name: 'colors',items: ['TextColor', 'BGColor']}
  ];

  config.toolbar_Full = [
    {name: 'document',items: ['Source', '-', 'DocProps', 'Preview', 'Print', '-']},
    {name: 'clipboard',items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
    {name: 'editing',items: ['Find', 'Replace', '-', 'SelectAll', '-']},
    { name: 'basicstyles',items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
    '/',
    {name: 'paragraph',items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']},
    {name: 'links',items: ['Link', 'Unlink', 'Anchor']},
    {name: 'insert',items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak']},
    '/',
    { name: 'styles',items: ['Styles', 'Format', 'Font', 'FontSize']},
    { name: 'colors',items: ['TextColor', 'BGColor']},
    { name: 'tools',items: [ 'ShowBlocks', '-']}
  ];

};
