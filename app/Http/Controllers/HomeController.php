<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Banner;
use App\BannerType;
use App\Section;
use App\CompanyInfo;
use App\Post;


class HomeController extends Controller
{
    public function index(){

        $homeBanners = Banner::where('banner_type_id',1)->get();
        $aboutUs = Section::where('section_type_id',1)->first();
        $servicesBanners = Banner::where('banner_type_id',2)->get();
        $services = Section::where('section_type_id',2)->first();
        $contact = Section::where('section_type_id',3)->first();
        $galleryBanners = Banner::where('banner_type_id',3)->get();
        $gallery = Section::where('section_type_id',4)->first();
        $companyInfo = CompanyInfo::orderBy('created_at', 'desc')->first();
        $secondary = Section::where('section_type_id',7)->first();
        $secondaryBanner = Banner::where('banner_type_id',6)->get();
        $clients = Section::where('section_type_id',5)->first();
        $clientBanners = Banner::where('banner_type_id',4)->get();

        return view('welcome',compact('homeBanners','aboutUs','servicesBanners','services','companyInfo','contact','gallery','galleryBanners','secondary','secondaryBanner','clients','clientBanners'));
    }

    public function contact(){

        $companyInfo = CompanyInfo::orderBy('created_at', 'desc')->first();
        //Mapa
        $config = array();
        $config['center'] = '-33.434844,-70.626295';
        $config['zoom'] = 15;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;';

            app('map')->initialize($config);

            $marker = array();
            app('map')->add_marker($marker);

            $map = app('map')->create_map();
            $map = array('map_js' => $map['js'], 'map_html' => $map['html']);

        return view('contact',compact('map','companyInfo'));
    }

    public function services(){

        $servicesBanner = Banner::where('banner_type_id',2)->get();
        $services = Section::where('section_type_id',2)->first();
        $companyInfo = CompanyInfo::orderBy('created_at', 'desc')->first();

        return view('services',compact('servicesBanner','services','companyInfo'));
    }

    public function aboutUs(){

        $aboutUs = Section::where('section_type_id',1)->first();
        $mission = Section::where('section_type_id',8)->first();
        $vision = Section::where('section_type_id',9)->first();
        $companyInfo = CompanyInfo::orderBy('created_at', 'desc')->first();
        $clients = Section::where('section_type_id',5)->first();
        $clientBanners = Banner::where('banner_type_id',4)->get();
        $partners = Section::where('section_type_id',6)->first();
        $partnerBanners = Banner::where('banner_type_id',5)->get();

        return view('about',compact('aboutUs','clientBanners','clients','companyInfo','mission','vision','partners','partnerBanners'));
    }

    public function blog(){

        $posts = Post::orderBy('created_at', 'desc')->get();
        $last_posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $companyInfo = CompanyInfo::orderBy('created_at', 'desc')->first();

        return view('blog',compact('posts','last_posts','companyInfo'));
    }

    public function post($id){

        $post = Post::findOrFail($id);
        $last_posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $companyInfo = CompanyInfo::orderBy('created_at', 'desc')->first();

        return view('post',compact('post','last_posts','companyInfo'));
    }
}
