<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Request as RequestChecker;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Handles upload avatar photo and save uploader information
     * Make use of Storage class for assigning certain disk set in config/filesystems.php
     *
     * @param Request
     * @return $path
     */
    public function upload(Request $request)
    {
        if(!is_null($request->photo))
        {
            $firstname = self::explodeString($request->firstname);
            $lastname = self::explodeString($request->lastname);

            $photo = $request->photo;
            list($type, $photo) = explode(';', $photo);
            list(, $photo) = explode(',', $photo);
            $photo = base64_decode($photo);
            $name = str_random(8) . $firstname[0] . '.' . $lastname[0] . time() . '.jpg';
            $path = now()->format('Y') . '/' . now()->format('F') . '/' . now()->format('d') . '/' . $name;

            if(Storage::disk('avatars')->put($path, $photo))
            {
                $uploader = Upload::create(['firstname' => ucfirst($firstname[0]),
                                            'lastname' => ucfirst($request->lastname),
                                            'avatar_filepath' => $path
                                         ]);
                
                if(! $uploader):
                    // throws 409 error code
                    return RequestChecker::ajax() ? response()->json(['message' => 'Upload photo failed. Please try again.'], 409) : abort('400');
                endif;
                
                return self::formatResultSet($uploader);
            }

        }
        return false;
    }

    private function formatResultSet($data)
    {
        return array('id' => $data->id,
                     'firstname' => strtolower($data->firstname),
                     'lastname' => str_replace(' ', '-', strtolower($data->lastname)),
                     'avatar_filepath' => $data->avatar_filepath,
                     'created_at' => $data->created_at
                        
        );
    }

    private function explodeString($data)
    {
        return explode(' ', trim($data));
    }

}

?>
