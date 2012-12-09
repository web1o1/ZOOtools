/* ===================================================
 * ZOOtoolsSeparatorZLField
 * https://zoolanders.com/extensions/zoocompare
 * ===================================================
 * Copyright (C) JOOlanders SL 
 * http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * ========================================================== */
(function ($) {
	var Plugin = function(){};
	Plugin.prototype = $.extend(Plugin.prototype, {
		name: 'ZOOtoolsSeparatorZLField',
		options: {},
		initialize: function(body, options) {
			this.options = $.extend({}, this.options, options);
			var $this = this;

			$(document).ready(function() {

				// Edit view
				$('.ui-sortable').on('sortstop', function(event, ui)
				{
					$this.element = ui.item,
					$this.element_position = $this.element.closest('ul.element-list').data('position'),
					$this.element_type = $this.element.find('.zlinfo').data('element-type');
	
					if ($this.element_type == 'separator'){

						// add class
						$this.element.addClass('zl-separator');

						// launch the Element Title feature
						$this.initOranizerTitle();
					}
				})
				// first time must be triggered manually
				.find('li.element').each(function(){
					$(this).parent().trigger('sortstop', { item: $(this) });
				});

				// apply actions when new element on type
				$('.col-left ul.element-list').on('element.added', function(event, element){ 
					$(element).parent().trigger('sortstop', { item: $(element) });
				});

				// Assignment view
				$('.element-list.unassigned li.element, .element-list[data-position=unassigned] li.element')
				.each(function()
				{
					$this.element = $(this),
					$this.element_type = $this.element.find('.zlinfo').data('element-type');

					if ($this.element_type == 'separator'){

						// add class
						$this.element.addClass('zl-separator');

						// remove draggable feature, if not in submission view
						$('.element-list.unassigned')[0] && $this.element.draggable('destroy');

						// remove unnecesary name data
						$this.element.find('.name span').remove();
					}
				})

				// Submission view, cancel sorting
				$('.element-list[data-position=unassigned]').sortable({ cancel: ".element.zl-separator" });
			})
		},
		initOranizerTitle: function() {
			if (!this.element.data('zootools-actions-inited')) // only once
			{
				var $this = this,
					select = $this.element.find('.zlfield .row[data-id=_layout] select'),
					name = $this.element.find('.name');

				select.on('loaded.zlfield', function(){
						
					var title_input = $this.element.find('.zlfield .row[data-id=name] input');

					// change the title and listen to new inputs
					title_input.on('keyup zlinit', function(){
						name.html(title_input.val());
					}).trigger('zlinit');
			
				}).trigger('loaded.zlfield');

			this.element.data('zootools-actions-inited', !0)}
		}
	});
	// don't touch
	$.fn[Plugin.prototype.name] = function() {
		var args   = arguments;
		var method = args[0] ? args[0] : null;
		return this.each(function() {
			var element = $(this);
			if (Plugin.prototype[method] && element.data(Plugin.prototype.name) && method != 'initialize') {
				element.data(Plugin.prototype.name)[method].apply(element.data(Plugin.prototype.name), Array.prototype.slice.call(args, 1));
			} else if (!method || $.isPlainObject(method)) {
				var plugin = new Plugin();
				if (Plugin.prototype['initialize']) {
					plugin.initialize.apply(plugin, $.merge([element], args));
				}
				element.data(Plugin.prototype.name, plugin);
			} else {
				$.error('Method ' +  method + ' does not exist on jQuery.' + Plugin.name);
			}
		});
	};
})(jQuery);