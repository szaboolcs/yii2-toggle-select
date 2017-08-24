(function($) {
	$.fn.toggleSelect = function(options) {
		var defaultOptions = {
			'template'      : '<div class="row">{buttons}</div>',
			'buttonTemplate': '{button}',
			'buttonOptions' : {
				'class' : 'btn btn-default'
			}
		};
		var settings = $.extend(defaultOptions, options);

		this.each(function()
		{
			var self     = $(this);
			var selectId = self.attr('id');
			var multiple = this.multiple;
			var options  = self.children('option');
			var buttons  = options.map(function(index, opt) {
				var button = $("<button type='button'></button>")
					.attr('data-ts-class', 'ts-button')
					.attr('data-select-id', selectId)
					.attr('data-value', opt.value)
					.html(opt.text);

				$.each(settings.buttonOptions, function(attribute, value)
				{
					button.attr(attribute, value);
				});
	
				if (opt.selected) {
					button.addClass("active");
				}

				templatedButton = settings.buttonTemplate.replace('{button}', button.prop('outerHTML'));

				return $(templatedButton)[0];
			});

			buttons.each(function(index, row) {
				button = (settings.buttonTemplate == defaultOptions.buttonTemplate ? row : $(row).find('button[data-select-id="' + selectId + '"][data-ts-class="ts-button"]'));

				$(button).click(function() {
					self.parent().find('button[data-select-id="' + selectId + '"][data-ts-class="ts-button"]').removeClass('active');

					self.children("option:selected").prop("selected", false);

					$(this).toggleClass('active');
					
					if ($(this).hasClass('active')) {
						self.val($(this).attr('data-value'));
					}
				});
			});

			var template = $($(settings.template.replace('{buttons}', '<div data-ts-class="ts-content"></div>'))[0]);

			template.find('div[data-ts-class="ts-content"]').replaceWith(buttons);

			self.after(template);
			self.hide();
		});
	}
}(jQuery));