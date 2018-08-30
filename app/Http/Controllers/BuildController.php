<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Request as RequestChecker;
use Illuminate\Support\Facades\Storage;

class BuildController extends Controller
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
    public function index($id, $fullname)
    {
        $user = Upload::find($id);
        
        if(! $user)
            // throws 409 error code
            return RequestChecker::ajax() ? response()->json(['message' => 'Request uploader not found. Please try again.'], 404) : abort('404');

        $user_firstname = strtolower($user->firstname) . '-';
        $user_lastname = str_replace(' ', '-', strtolower($user->lastname));
        $user_fullname = $user_firstname . $user_lastname;

        if($user_fullname != $fullname)
        {
            // throws 409 error code
            return RequestChecker::ajax() ? response()->json(['message' => 'Request uploader not found. Please try again.'], 404) : abort('404');
        }
            
        return view('build.index', compact('user'));
    }

    /**
     * Build and upload result
     *
     * @param Illuminate\Http\Request;
     * @return void
     */
    public function build($id, Request $request)
    {
        $user = Upload::find($id);

        if(! $user)
        // throws 409 error code
            return RequestChecker::ajax() ? response()->json(['message' => 'Request uploader not found. Please try again.'], 404) : abort('404');
        
        if(!is_null($request->canvas))
        {
            $canvas = $request->canvas;
            list($type, $canvas) = explode(';', $canvas);
            list(, $canvas) = explode(',', $canvas);
            $canvas = base64_decode($canvas);

            $name = str_random(8) . $user->firstname . '.' . $user->lastname . time() . '.jpg';

            $path = now()->format('Y') . '/' . now()->format('F') . '/' . now()->format('d') . '/' . $name;

            if(Storage::disk('badges')->put($path, $canvas))
            {
                $user->update(['badge_filepath' => $path]);
                
                return response()->json(['message' => 'Build successful.', 
                                         'url' => 'download/' . $user->id . '/' . strtolower($user->firstname) . '-' . strtolower($user->lastname)
                                        ], 200);
            }

            return RequestChecker::ajax() ? response()->json(['message' => 'Upload error. Please try again.'], 404) : abort('404');
        }
    }

    /**
     * Validate request
     *
     * @param Illuminate\Http\Request;
     * @return void
     */
    public function validation($request)
    {
        
          $rules = array('firstname' => 'required|string|max:9',
                         'lastname' => 'required|string|max:255');

        $message = array('required' => 'The :attribute cannot be null.',
                         'max' => 'The :attribute accepts maximum of 9 characters.');

        $this->validate($request, $rules, $message);
    }
}

?>