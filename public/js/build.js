$(function()
{
	var $build = new RequestHandler('build');

    console.log('Buildjs loaded successfully.');
    
    //to make a div draggable
    $('.movable_text').draggable(
        {containment: "#canvas", scroll: false}
    );
    $('.movable_img').draggable(
        {containment: "#canvas", scroll: false}
    );

    //here is the hero, after the capture button is clicked
    //he will take the screen shot of the div and save it as image.
	$('#btn-build').click(function()
	{
        
        //get the div content
        $div_content = document.querySelector("#canvas");

        // make it as html5 canvas
		html2canvas($div_content).then(function($canvas) 
		{
            //change the canvas to jpeg image
			$data = $canvas.toDataURL('image/jpeg');

            //then call a super hero php to save the image
            save_img($data);
        });
	});
	
    //to save the canvas image
	function save_img($data)
	{
        console.log('Yes');
		$build.formData = {canvas: $data};

		//ajax method.
		$build.request(function($response)
		{
			$responseData = $response.responseJSON;
			
            window.location.href = $responseData.url;

		}, '/build/'+ $('#btn-build').attr('data-id'));
    } // end save_img()	

});