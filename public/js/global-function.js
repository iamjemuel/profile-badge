	function RequestHandler($modelURI = '')
	{
		this.modelURI = $modelURI;

		this.formData = null;

		this.prepareFormData = function($form)
		{
			this.formData = $form;
			return this;
		}

		this.request = function($callback)
		{
			if(this.formData == null)
			{
				console.log('Form data is empty!');
				return false;
			}
			
			$.ajax({
					method: 'POST',
					url: this.modelURI,
					data: this.formData,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					beforeSend: function()
					{
						// Add loader here
						console.log('Preparing request form...');
					},
					success: function($response)
					{
						// Add Success popup/notification here
						console.log('Success AJAX request');
					},
					error: function($jqXHR, $textStatus, $errorThrown)
					{
						// Add Error popup/notification here
						console.log('Error AJAX request');
					},
					complete: function($jqXHR, textStatus)
					{
						console.log("Complete AJAX request!");
						$callback($jqXHR);
					}
         	});
		}
	}

	var $accepted_image_type = ['image/JPEG', 'image/jpeg', 'image/JPG', 'image/jpg', 'image/PNG', 'image/png'];

	function in_array($needle, $haystack) 
	{
		for(var $i in $haystack) 
		{
			if($haystack[$i] == $needle) return true;
		}
		return false;
	}

	/**
	 * Dynamic notification pop up
	 *
	 * @param string $message -> Message to be display
	 * @param string $type -> Type of notif ( success, info, warning, danger )
	 */
	var popup = function($message, $type)
	{
		$.notify({
				// options
				message: $message
			},
			{
				// settings
				type: $type,
				allow_dismiss: true,
				animate: {enter: "animated fadeInRight", exit: "animated fadeOutRight"},
				placement: {from: "bottom", align: "left"},
				z_index: 2000
			});
	}