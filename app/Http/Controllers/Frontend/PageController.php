<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Home Page
    public function homePage()
    {
        return view("Frontend.Pages.Home.index");
    }


    // Member page
    public function memberPage()
    {
        $members = Member::Publish()->Order()->paginate(10);
        return view("Frontend.Pages.Member.index", compact("members"));
    }
}
