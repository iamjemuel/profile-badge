$(function()
{
    $('.avatar-container').hide();

    var $home = new RequestHandler('upload');

    console.log('Home.js loaded successfully.');

    // Initialize Croppie plugin with target div
    $avatar = $('#avatar').croppie({
        viewport: { width: 300, height: 330, type: 'square' },
        boundary: { width: 330, height: 360 },
        showZoomer: true,
        enableOrientation: true,
        enableExif: true
    });

    $(document).on('click', '.control-rotate', function($ev)
    {
        $avatar.croppie('rotate', parseInt($(this).data('deg')));
    });

    $(document).on('change', 'input[name=photo]', function()
    {
        $file = $(this)[0].files[0];

        if(! $file)
        {
            popup('Image file cannot be empty.', 'danger');
            return false;
        }

        if(! in_array($file.type, $accepted_image_type))
        {
            popup('Accepts image type of file only.', 'danger');
            return false;
        } 

        $('.avatar-container').fadeIn(2000);

        $('.custom-file-label').text($file.name);

        $reader = new FileReader();

        $reader.onload = function($event)
        {
            $avatar.croppie('bind', {
            url: $event.target.result,
            orientation: 1,
            zoom: 0
            });
        }

        $reader.readAsDataURL(this.files[0]);
    });

    $('#upload-form').submit(function($event)
    {
        $event.preventDefault();

        $avatar.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        })
        .then(function($canvas)
        {
            $home.formData = {
                photo: $canvas, 
                firstname: $('input[name=firstname]').val(),
                lastname: $('input[name=lastname]').val()
            };

            $home.request(function($response)
            {
                if($response.status === 200 || $response.status === 201)
                {
                    $responseData = $response.responseJSON;
                    window.location.href = $responseData.url;
                }
                else if($response.status === 422)
                {
                    return false;
                }
                else
                {
                    console.log('Response status: ' + $response.status);
                    return false;
                }
            });
        });
        
    });
});