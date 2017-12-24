<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Sitemap\SitemapGenerator;

class SiteMapController extends Controller
{
    protected function index()
    {
        $path = public_path('site_map.xml');
        SitemapGenerator::create('https://vic.com.ro')->writeToFile($path);
        $xml = file_get_contents($path);
        $links = simplexml_load_file($path);
        return view('admin.site-map', compact('xml', 'links'));
    }
}
