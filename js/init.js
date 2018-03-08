(function (Drupal) {
	var myeditor = {
		attach: function attach(element, format) {},
		detach : function detach(element, format, trigger){},
		onChange: function onChange(element, callback) {}
	};
	Drupal.editors.myeditor = myeditor;
})(Drupal);