<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Request as RequestChecker;

class DownloadController extends Controller
{
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

        if($user->kebabCaseFullName() != $fullname)
        {
            // throws 409 error code
            return RequestChecker::ajax() ? response()->json(['message' => 'Request uploader not found. Please try again.'], 404) : abort('404');
        }
            
        return view('download.index', compact('user'));
    }
}
