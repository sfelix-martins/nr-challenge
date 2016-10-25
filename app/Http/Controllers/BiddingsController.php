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

        return view('biddings', compact('biddings'));
    }

    public function bidding($id)
    {
        $biddings = Biddings::get()->where('id', $id);
        $attachments = Attachments::get()->where('bidding_id', $id);
        $objects = Objects::get()->where('bidding_id', $id);

        return view('onebidding', compact('biddings', 'attachments', 'objects'));
    }
}
