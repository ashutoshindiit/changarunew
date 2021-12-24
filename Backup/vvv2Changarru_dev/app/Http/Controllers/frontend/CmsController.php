<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests, DB, Session, Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Admin;
use App\Models\SellerCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactUs;
use App\Models\AdminAboutUsInformation;
use App\Models\ChangarruFeature;
use App\Models\HomepageInformation;
use App\Models\Testimonial;
use App\Models\Page;
use exception;
use DateTime;
use Date;
use Auth;
use Carbon;

class CmsController extends Controller
{
    public function index(Request $request){

        $blogs  = Blog::with('blogCategory')
                        ->whereNull('deleted_at')
                        ->orderBy('id','desc')
                        ->get();
        
        $sellerCategories = SellerCategory::whereNull('deleted_at')
                                            ->orderBy('id','desc')
                                            ->get();

        $ChangarruFeatures   = ChangarruFeature::orderBy('id','desc')
                                            ->limit('4')
                                            ->get();

        $homepageInformation = HomepageInformation::first();

        $testimonials = Testimonial::get();

        $pages = Page::get();   

        return view('frontend.landingPages.index',compact('blogs','sellerCategories','ChangarruFeatures','homepageInformation','testimonials','pages'));
    }

    
    public function getPageSlug(Request $request,$page_name){


        $homepageInformation = HomepageInformation::first();

        $testimonials = Testimonial::get();

        $pages = Page::get();   
        $pageData = Page::where('page_name',$page_name)->first();
        return view('frontend.landingPages.privary-policy',compact('pageData','pages','homepageInformation','testimonials'));
    }

    public function getAboutUs(Request $request){
        $adminAboutUsInformation = AdminAboutUsInformation::first();
        $pages = Page::get();   
        return view('frontend.landingPages.about',compact('adminAboutUsInformation','pages'));
    }

    public function getBlog(Request $request){
        
        $blogs  = Blog::with('blogCategory')
                        ->whereNull('deleted_at')
                        ->orderBy('id','desc')
                        ->paginate(6); 

        $blogCategories  = BlogCategory::whereNull('deleted_at')
                                        ->orderBy('id','desc')
                                        ->get();   
        
        $pages = Page::get();   
        return view('frontend.landingPages.blog',compact('blogs','blogCategories','pages'));
    }

    public function getBlogDetail(Request $request,$slug_id){
        // dd('here');                                
        $blog  = Blog::with('blogCategory')
                        ->whereNull('deleted_at')
                        ->where('slug',$slug_id)
                        ->orderBy('id','desc')
                        ->first();

        $blogCategories  = BlogCategory::whereNull('deleted_at')
                                        ->orderBy('id','desc')
                                        ->get();   
        $admin = Admin::where('id',2)->first();
        $pages = Page::get();   

        return view('frontend.landingPages.blog-details',compact('pages','blog','blogCategories','admin','slug_id'));
    }

    public function getBlogCategoryWiseDetail(Request $request)
    {
        try {
            $payload   = $request->all();
            $data = [];
            // dd($payload);
            if ($payload['categoryId']==0) {
                $blogs  = Blog::with('blogCategory')
                                 ->whereNull('deleted_at')
                                 ->orderBy('id','DESC')
                                 ->paginate(6);

                $data['html'] = view('frontend.element.categoryWiseBlog', ['blogs'=>$blogs])->render();
                return json_encode($data);
            }

            if (isset($payload['search'])) {
                $search = $payload['search'];
                $blogs = Blog::with('blogCategory')
                            ->where('status', 'enable')->whereNull('deleted_at')
                            ->where(function ($query) use ($search) {
                                    if($search){
                                        $query->where('content', 'LIKE', '%'.$search.'%');
                                        $query->orWhere('title', 'LIKE', '%'.$search.'%');
                                    }
                            })->orderBy('id','DESC')
                            ->paginate(6); 
                dd($blogs);            
                $data['html'] =  view::make('frontend.element.categoryWiseBlog',['blogs'=>$blogs])->render();

            
            }else{
                $blogs  = Blog::with('blogCategory')
                                 ->where('category_id',$payload['categoryId'])
                                 ->whereNull('deleted_at')
                                 ->orderBy('id','DESC')
                                 ->paginate(6);

                $data['html'] = view('frontend.element.categoryWiseBlog', ['blogs'=>$blogs])->render();
                // dd($data);
            }
            
            return json_encode($data);
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    // public function getBlogSearch(Request $request){
    //    $inputs =  $request->all();

    //    return array('html' => $resultshtml, 'blogs' => $blogs);
    // }

    public function getFaq(Request $request){
        $pages = Page::get();   
        
        $faqs = Faq::get();
        return view('frontend.landingPages.faq',compact('faqs','pages'));
    }
    
    public function getContactUs(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $validator = Validator::make($data, [
                 'email'        => 'required|email|unique:contact_us',
                 // 'email'        => 'unique:contact_us,email',
                 'full_name'    => 'required',
                 'phone'        => 'required',
                 'subject'      => 'required',
                 'message'      => 'required',
            ]);

            if ($validator->fails()) {
                 $response['status'] = false;
                 $response['message'] = $validator->errors()->first();
                 Session::flash('error','The email has already been taken.');
                 return redirect('/home/contact-us');
            }

            $allContacts = contactUs::where('email',$data['email'])->first();
            if ($allContacts) {
                Session::flash('error','The email has already been taken.');
                return redirect('/home/contact-us');
            }

            $contactUs                    =  new contactUs;
            $contactUs->full_name         =  $data['full_name'];
            $contactUs->email             =  $data['email'];
            $contactUs->phone             =  $data['phone'];
            $contactUs->subject           =  $data['subject'];
            $contactUs->message           =  $data['message'];
            if($contactUs->save()){
                return redirect('/home/contact-us')->with('success','Admin will get back to you soon');
            }else{
                return redirect()->back()->with('error','Something went wrong, Please try again later.');
            }
        }

        $pages = Page::get();   
        return view('frontend.landingPages.contact',compact('pages'));
    }

    
    
}
