<?php

use App\Http\Controllers\About;
use App\Http\Controllers\auth;
use App\Http\Controllers\Awards;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ChatBot;
use App\Http\Controllers\Client_Controller;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Inquiry;
use App\Http\Controllers\Integrations;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Properties;
use App\Http\Controllers\Prospects;
use App\Http\Controllers\Routing;
use App\Http\Controllers\UserInterFace;
use App\Http\Controllers\Visitation;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [Routing::class, 'Login']);
Route::post('/login-account', [auth::class, 'Login']);
Route::get('/logout', [auth::class, 'Logout']);
Route::get('/', [Routing::class, 'Index']);
Route::get('/property', [Routing::class, 'Property_View']);
Route::get('/send-property', [Routing::class, 'Submit_Property_Form']);
Route::get('/our-property/view', [UserInterFace::class, 'View_Property']);
Route::get('/our-property/featured', [UserInterFace::class, 'propertyCarousel']);
Route::get('/user/logo/interface', [UserInterFace::class, 'Logo']);
Route::get('/our-properties/data/{id}', [UserInterFace::class, 'PropertyInformation']);
Route::get('/our-properties/images/{id}', [UserInterFace::class, 'PropertyImages']);
Route::get('/our-properties/features_amenities/{id}', [UserInterFace::class, 'Features_Amenities']);
Route::get('/our-properties/plans/{id}', [UserInterFace::class, 'PlansData']);
Route::get('/our-properties/plans/view/{id}', [UserInterFace::class, 'PlansLoader']);
Route::get('/our-properties/construnction-updates/{id}', [UserInterFace::class, 'Construction_Updates']);
Route::get('/our-properties/recommendation-list/{id}', [UserInterFace::class, 'RecommendatinListings']);


Route::get('/layout', [Routing::class, 'Layout']);
Route::get('/admin/inquiry', [Routing::class, 'Inquiry_Admin']);
Route::get('/admin/submitted-properties', [Routing::class, 'Submitted_Properties']);
Route::get('/admin/dashboard', [Routing::class, 'Admin']);
Route::get('/admin/property', [Routing::class, 'Property']);
Route::get('/admin/projects', [Routing::class, 'Projects']);
Route::get('/admin/awards', [Routing::class, 'Awards']);
Route::get('/admin/about', [Routing::class, 'About']);
Route::get('/schedule-viewing', [Routing::class, 'Schedule_Viewing']);

Route::get('/admin/appointments', [Routing::class, 'Appointment']);
Route::get('/admin/pages/index', [Routing::class, 'Landing_Page']);
Route::get('/admin/pages/about-us', [Routing::class, 'About_Us']);
Route::get('/admin/pages/locations', [Routing::class, 'Locations']);
Route::get('/admin/pages/properties', [Routing::class, 'Properties']);
Route::get('/admin/pages/integrations', [Routing::class, 'Integrations']);

Route::get('/projects', [Routing::class, 'All_Projects']);
Route::get('/our-properties/lease', [Routing::class, 'Lease']);
Route::get('/our-properties/sale', [Routing::class, 'Sale']);
Route::get('/our-properties/locations', [Routing::class, 'Location']);
Route::get('/our-properties/city/{location}', [UserInterFace::class, 'City_Property']);
Route::post('/search-sale', [UserInterFace::class, 'Search_Sale']);
Route::post('/search-lease', [UserInterFace::class, 'Search_Lease']);


Route::get('/admin/property/index', [Routing::class, 'Property_Main']);
Route::get('/admin/property/gallery', [Routing::class, 'Gallery']);
Route::get('/admin/clients', [Client_Controller::class, 'GetAllRequest']);
Route::get('/admin/clients/{id}', [Client_Controller::class, 'GetPropertyDetails']);



Route::get('/admin/project-data', [Projects::class, 'Display_Projects']);
Route::post('/admin/project/create', [Projects::class, 'Create_Projects']);
Route::post('/admin/create-project', [Projects::class, 'Create_Projects']);
Route::get('/admin/project/units', [Routing::class, 'Projects_Units']);
Route::get('/project-units', [Routing::class, 'All_Project_Units']);
Route::get('/project/all-units/{id}', [UserInterFace::class, 'All_Project_Units_Data']);
Route::get('/project/sale-units', [UserInterFace::class, 'All_Project_Sale_Units_Data']);
Route::get('/project/lease-units', [UserInterFace::class, 'All_Project_Lease_Units_Data']);
Route::post('/create-schedule-visit', [UserInterFace::class, 'Create_Schedule_Visit']);
Route::get('/view-units', [Routing::class, 'ViewUnits']);
Route::post('/admin/project-create-unit', [Projects::class, 'Create_Project_Units']);
Route::get('/change-project-status/{id}', [Projects::class, 'Update_Project_Status']);
Route::get('/change-unit-status/{id}', [Projects::class, 'Update_Unit_Status']);
Route::get('/edit-project-data/{id}', [Projects::class, 'GetProjectdata']);
Route::get('/edit-project-unit-data/{id}', [Projects::class, 'GetProjectUnitdata']);
Route::post('/admin/update-project-unit', [Projects::class, 'Update_Project_Unit_Data']);
Route::get('/project-details/{id}', [UserInterFace::class, 'Project_Details']);
Route::get('/project-unit-information/{id}', [UserInterFace::class, 'Display_Unit_Information']);



Route::post('/admin/update-project', [Projects::class, 'Update_Project_data']);

Route::get('/admin/project-units', [Projects::class, 'Display_Project_Units']);
Route::get('/admin/project/data', [Projects::class, 'ProjectList']);
Route::get('/admin/projects/delete-project/{id}', [Projects::class, 'Delete_Project']);
Route::get('/admin/project/view/{id}', [Projects::class, 'View_Project']);
Route::post('/admin/project/upload', [Projects::class, 'UploadSnapAndVideos']);
Route::post('/admin/project/unit/upload', [Projects::class, 'UnitUploadSnapAndVideos']);

Route::post('/admin/awards/create', [Awards::class, 'CreateAwards']);
Route::get('/admin/awards/data', [Awards::class, 'AwardsList']);
Route::get('/admin/awards/delete-award/{id}', [Awards::class, 'DeleteAward']);

Route::post('/admin/about/create', [About::class, 'CreateAbout']);
Route::post('/admin/about/objective/create', [About::class, 'CreateAboutObjective']);
Route::get('/admin/about/list', [About::class, 'AboutList']);
Route::get('/admin/about/delete-data/{id}', [About::class, 'DeleteAbout']);
Route::get('/admin/property/company-objective/data', [About::class, 'DisplayObjective']);

Route::get('/admin/integrations/primary-logo', [Integrations::class, 'PrimaryLogo']);
Route::get('/admin/integrations/secondary-logo', [Integrations::class, 'SecondaryLogo']);
Route::get('/admin/integrations/gallery/primary', [Integrations::class, 'Primary_Logos']);
Route::get('/admin/integrations/gallery/secondary', [Integrations::class, 'Secondary_Logos']);
Route::post('/admin/integrations/create', [Integrations::class, 'Create_Head']);
Route::post('/admin/integrations/upload-primary', [Integrations::class, 'Upload_Primary_Logo']);
Route::post('/admin/integrations/upload-secondary', [Integrations::class, 'Upload_Secondary_Logo']);
Route::get('/admin/integrations/publish-logo/{id}', [Integrations::class, 'Publish_Logo']);
Route::get('/admin/integrations/unpublish-logo/{id}', [Integrations::class, 'UnPublish_Logo']);
Route::get('/admin/integrations/logo/display', [Integrations::class, 'Display_Logo']);
Route::get('/admin/integrations/tagline/display', [Integrations::class, 'Display_Tagline']);
Route::get('/admin/integrations/delete-logo/{id}', [Integrations::class, 'Delete_Logo']);
Route::post('/admin/integrations/tagline/create', [Integrations::class, 'Create_Tagline']);
Route::get('/admin/integrations/tagline/list', [Integrations::class, 'Tagline_List']);
Route::get('/admin/integrations/tagline/publish/{id}', [Integrations::class, 'Publish_Tagline']);
Route::get('/admin/integrations/tagline/unpublish/{id}', [Integrations::class, 'UnPublish_Tagline']);
Route::get('/admin/integrations/tagline/delete/{id}', [Integrations::class, 'Delete_Tagline']);


Route::get('/user/logo/interface', [UserInterFace::class, 'Logo']);
Route::get('/user/tagline/interface', [UserInterFace::class, 'Tagline']);
Route::get('/properties/data', [UserInterFace::class, 'Properties']);
Route::get('/company-objective', [UserInterFace::class, 'Comapany_Objective']);
Route::get('/company-do', [UserInterFace::class, 'Comapany_Do']);
Route::get('/company-missions', [UserInterFace::class, 'Missions']);
Route::get('/company-vision', [UserInterFace::class, 'Vision']);
Route::get('/company-awards', [UserInterFace::class, 'Awards']);
Route::get('/company-awards/{year}', [UserInterFace::class, 'SelectAwards']);

Route::get('/chage/logo', [UserInterFace::class, 'LogoView']);

Route::get('/company-projects', [UserInterFace::class, 'Projects']);
Route::get('/company-project/data/{city}', [UserInterFace::class, 'SelectProjectsData']);
Route::get('/about', [Routing::class, 'User_About']);


Route::get('/our-properties/lease/data', [UserInterFace::class, 'LeaseUnits']);
Route::get('/our-properties/sale/data', [UserInterFace::class, 'SaleUnits']);

Route::get('/our-properties/lease/locations', [UserInterFace::class, 'Location_list']);
Route::get('our-properties/lease/data/view/unit/{id}', [UserInterFace::class, 'ShowLeaseUnitData']);
Route::post('/our-properties/lease/search-property', [UserInterFace::class, 'SearchLeaseUnits']);
Route::post('/our-properties/sale/search-property', [UserInterFace::class, 'SearchSaleUnits']);



Route::get('/our-properties', [Routing::class, 'User_Our_Properties']);
Route::get('/our-properties/locations/list', [UserInterFace::class, 'LocationList']);
Route::get('/our-properties/list/data', [UserInterFace::class, 'ListOfOurProperties']);
Route::post('/search/property/data', [UserInterFace::class, 'SearchProperties']);

Route::get('/selling-properties', [Routing::class, 'UserProspects']);
Route::get('/selling-properties/data/{location}', [UserInterFace::class, 'ListOfProspectsData']);

Route::get('/inquiry', [Routing::class, 'Inquiry']);
Route::post('/inquiry/submit', [UserInterFace::class, 'Send_Message']);
Route::post('/newsletter/subscribe', [UserInterFace::class, 'Send_Subscription_Mail']);



Route::post('/submit-client-property', [Client_Controller::class, 'Submit_Property']);

Route::get('/all-project-properties', [UserInterFace::class, 'All_Project_Properties']);




Route::get('/approved-appointments', [Visitation::class, 'Approve_Appointments']);
Route::get('/pending-appointments', [Visitation::class, 'Pending_Appointments']);
Route::get('/completed-appointments', [Visitation::class, 'Completed_Appointments']);
Route::get('/show-appoitnment-details/{id}', [Visitation::class, 'Show_Appointment_Data']);
Route::get('/approve-appointment/{id}', [Visitation::class, 'Approve_Appointment']);
Route::get('/decline-appointment/{id}', [Visitation::class, 'Decline_Appointment']);
Route::get('/appointment/{status}/{id}', [Visitation::class, 'Change_Status']);
Route::get('/complete-appointment/{id}', [Visitation::class, 'Complete_Appointment']);



Route::get('/project-count', [Dashboard::class, 'Project_Count']);
Route::get('/unit-count', [Dashboard::class, 'Units_Count']);
Route::get('/request-count', [Dashboard::class, 'Request_Count']);
Route::get('/inquiry-count', [Dashboard::class, 'Inquiry_Count']);




Route::get('/pending-inquiry', [Inquiry::class, 'Pending_Inquiry']);
Route::get('/view-inquiry-details/{id}', [Inquiry::class, 'View_Inquiry']);
Route::post('/send-response-message', [Inquiry::class, 'Send_Inquiry_Response']);
