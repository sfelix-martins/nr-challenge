<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Biddings;
use App\Attachments;
use App\Objects;

class BiddingsController extends Controller
{
    public function index()
    {
        $biddings = Biddings::get();
        $attachments = Attachments::get()->where('bidding_id', 1);
        $objects = Objects::get()->where('bidding_id', 1);

        return view('biddings', compact('biddings', 'attachments', 'objects'));
    }
}
