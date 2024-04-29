<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\head;
use App\Models\images;
use App\Models\project_properties;
use App\Models\projects;
use App\Models\properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Routing extends Controller
{
    //

    public function Login()
    {
        if (Session::has('admin')) {
            return redirect()->back();
        } else {
            return view('pages.login');
        }
    }

    public function Index()
    {
        $projects = project_properties::where('status', 'Publish')->get();
        $count = count($projects);
        if ($count > 0) {
            return view('pages.index', ['status' => 200, 'projects' => $projects]);
        } else {
            return view('pages.index', ['status' => 400, 'projects' => $projects]);
        }
    }

    public function Submit_Property_Form()
    {
        return view('pages.submit_property_form');
    }
    public function All_Projects()
    {
        return view('pages.projects');
    }
    public function Admin()
    {
        return view('admin.index');
    }
    public function Appointment()
    {
        return view('admin.appointment');
    }
    public function Inquiry_Admin()
    {
        return view('admin.inquiry');
    }
    public function Submitted_Properties()
    {
        return view('admin.submitted');
    }
    public function Property()
    {
        return view('admin.property');
    }
    public function Prospects()
    {
        return view('admin.prospects');
    }
    public function Layout()
    {
        $logo = head::join('gallery', 'head.id', '=', 'gallery.owner_id')->join('images', 'gallery.id', '=', 'images.gallery_id')
            ->where('role', '1')->first();
        return view('layout.user.layout', ['logo' => $logo]);
    }
    public function Projects()
    {
        return view('admin.projects');
    }
    public function ViewUnits()
    {
        return view('pages.view_units_data');
    }
    public function Projects_Units()
    {
        return view('admin.pages.project_units');
    }
    public function All_Project_Units()
    {
        return view('pages.project_units');
    }
    public function Awards()
    {
        return view('admin.awards');
    }
    public function About()
    {
        return view('admin.about');
    }
    public function Landing_Page()
    {
        return view('admin.pages.index');
    }
    public function About_Us()
    {
        return view('admin.pages.aboutus');
    }
    public function Properties()
    {
        return view('admin.pages.properties');
    }
    public function Gallery()
    {
        return view('admin.pages.gallery');
    }

    public function Locations()
    {
        return view('admin.pages.locations');
    }
    public function Integrations()
    {
        return view('admin.pages.integrations');
    }
    public function User_About()
    {
        return view('pages.about');
    }

    public function Inquiry()
    {
        return view('pages.send_inquiry');
    }
    public function Lease()
    {
        return view('pages.lease');
    }
    public function Sale()
    {
        return view('pages.sale');
    }
    public function Schedule_Viewing()
    {
        return view('pages.setviewing');
    }
}
