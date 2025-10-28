<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;
use App\Http\Traits\SeoTrait;
use App\Models\Page;
use App\Models\PaymentDetail;
use App\Models\Registration;


class HomeController extends Controller
{
    use SeoTrait;

    public function welcome()
    {
        // SEO
        $page = Page::with('seo')->where('slug','home')->firstOrFail();
        $this->setSeo([
            'title'       => $page->seo->meta_title ?? $page->title,
            'description' => $page->seo->meta_description ?? '',
            'keywords'    => $this->formatKeywords($page->seo->meta_keywords ?? ''),
            'image'       => $page->seo->og_image ?? '',
            'canonical'   => url()->current(),
        ]);
        $seotags = $this->generateTags();

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
        ]);
        return view('frontend.welcome', compact('seotags','breadcrumbs'));
    }
    public function activities()
    {
        return view('frontend.pages.activities');
    }

    public function chairmanMessage()
    {
        return view('frontend.pages.chairman-message');
    }

    public function committeeMembers(Request $request)
    {
        $query = Registration::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('member_code', 'like', "%{$search}%");
            });
        }

        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        $members = $query->paginate(15)->withQueryString(); // keep search params in URL
        $districts = DB::table('districts')->orderBy('name', 'asc')->get();

        return view('frontend.pages.committee-members', compact('members', 'districts'));
    }



    public function memberList()
    {
        $members = Registration::all();

        return view('frontend.pages.member-list', compact('members'));
    }

    public function photoGallery()
    {
        return view('frontend.pages.photo-gallery');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    // ____________ NEWS
    public function news()
    {
        return view('frontend.pages.news');
    }

    public function newsDetails($slug)
    {
        // You can later load news details from the database using $slug
        return view('frontend.pages.news-details', compact('slug'));
    }

}
