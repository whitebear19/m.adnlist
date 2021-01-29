<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe;
use App\User;
use App\Models\Poster;
use App\Models\Adn;
use App\Models\Post_Category;
use App\Models\PosterCategory;
use App\Models\Contact;
use App\Mail\SendCode;
use App\Mail\FeedbackMail;
use App\Mail\Receipts;

use Illuminate\Support\Facades\Mail;
use Exception;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $post_id = $request->get('post_id');
        $cur_poster = Poster::find($post_id);

        return view('stripe',compact('cur_poster'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        if(!empty($request->get('which')))
        {
            $adn_id = $request->get('post_id');
            $selected_plan = $request->get('selected_plan');
            $sel_adn = Adn::find($adn_id);
            if(!empty($sel_adn->price))
            {
                return back();
            }
            $site_record = Contact::find("1");
            switch ($selected_plan) {               
                case "premium":                    
                    $plan_day = date('Y-m-d', strtotime('15 days'));
                    $price = $site_record->price_premium;
                    break;
                case "platinum":
                    $plan_day = date('Y-m-d', strtotime('30 days'));
                    $price = $site_record->price_platinum;
                    break;
                case "dimond":
                    $plan_day = date('Y-m-d', strtotime('45 days'));
                    $price = $site_record->price_dimond;
                    break;               
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 
            
            try {
                $temp = Stripe\Charge::create ([
                    "amount" => 100 * $price,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Payment from adnlist.com." 
                ]);
            }
            catch(Exception $e) {           
                return back()->with("error",$e->getMessage()); 
            }
            
            if($temp->status == "succeeded")
            {            
                $sel_adn->price = $price;
                $sel_adn->plan = $selected_plan;
                $sel_adn->exp_date = $plan_day;
                $sel_adn->status = "1";
                $sel_adn->save();
                return redirect(route('admin_ads'));
            }
            else
            {
                return back();
            }


        }
        else
        {
            if(empty($request->get('post_id')))
            {            
                return view("user.stored");            
            }
            $post_id = $request->get('post_id');
            $selected_plan = $request->get('selected_plan');
            $cur_poster = Poster::find($post_id);       
            $category_id = $cur_poster->category_id;  
            
            if($cur_poster->plan)
            {            
                return view("user.stored");
                // return redirect(route("post_stored"));
            }
            $cur_category = Post_Category::find($category_id);
            
            switch ($selected_plan) {
                case "basic":
                    $price = $cur_category->basic;
                    break;
                case "premium":
                    $price = $cur_category->premium;
                    break;
                case "platinum":
                    $price = $cur_category->platinum;
                    break;
                case "dimond":
                    $price = $cur_category->dimond;
                    break;
                default:
                    $price = $cur_category->basic;
            }
            
        
            if($selected_plan == "basic")
            {
                $cur_poster->paid_status  = "Free";
                $cur_poster->user_confirm = "1";
                $cur_poster->total_price = $price;
                $cur_poster->plan = $selected_plan;
                $cur_poster->save();            

                Session::flash('success', 'Register successful!');          
                
                $feedback = array();
                $feedback["lname"] = Auth::user()->lname;      
                $feedback["paid_status"] = Poster::find($post_id)->paid_status;      
                $feedback["price"] = $price;      
                $toEmail = Auth::user()->email;
                Mail::to($toEmail)->send(new FeedbackMail($feedback));

                $receipts = array();
                $receipts['name'] = Auth::user()->fname." ".Auth::user()->lname;
                $receipts['price'] = $price;
                $receipts['category'] = Post_Category::find($category_id)->name;
                $receipts['plan'] = $selected_plan;
                $receipts['subcategory'] = PosterCategory::where('poster_id',$post_id)->get();
                $receipts['mail'] = Contact::find('1')->report;
                
                Mail::to($toEmail)->send(new Receipts($receipts));

                
                return redirect(route('final_page'));
            }          
            else
            {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 
            
                try {
                    $temp = Stripe\Charge::create ([
                        "amount" => 100 * $price,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "Payment from adnlist.com." 
                    ]);
                }
                catch(Exception $e) {           
                    return back()->with("error",$e->getMessage()); 
                }
                
                if($temp->status == "succeeded")
                {            
                    $cur_poster->paid_status  = "Paid";
                    $cur_poster->user_confirm = "1";
                    $cur_poster->total_price = $price;
                    $cur_poster->plan = $selected_plan;
                    $cur_poster->paid_address = $request->get('paid_address');
                    $cur_poster->paid_city    = $request->get('paid_city');
                    $cur_poster->paid_state   = $request->get('paid_state');
                    $cur_poster->paid_zip     = $request->get('paid_zip');
        
                    $cur_poster->save();
        
                    Session::flash('success', 'Payment successful!');          
                    
                    $feedback = array();               
        
                    $receipts = array();
                    $receipts['name'] = Auth::user()->fname." ".Auth::user()->lname;
                    $receipts['price'] = $price;
                    $receipts['category'] = Post_Category::find($category_id)->name;
                    $receipts['plan'] = $selected_plan;
                    $receipts['subcategory'] = PosterCategory::where('poster_id',$post_id)->get();
                    $receipts['mail'] = Contact::find('1')->report;
                    $toEmail = Auth::user()->email;
                    Mail::to($toEmail)->send(new Receipts($receipts));
                    if(!Auth::user()->email_verified_at)
                    {
                        $post_id = \Illuminate\Support\Facades\Crypt::encryptString($post_id);
                        $data = array();
                        $data["subject"] = $cur_poster->title; 
                        $data['subcategory'] = PosterCategory::where('poster_id',$post_id)->get();
                        $data["category"] = Post_Category::find($cur_poster->category_id)->name;
                        $data["location"] = $cur_poster->address.", ".$cur_poster->in_city.", ".$cur_poster->in_state.", ".$cur_poster->in_country;
                        $data["code"] = $post_id;
                        $sendmail = Auth::user()->email;
                        Mail::to($sendmail)->send(new SendCode($data));                    
                    }
                    else
                    {
                        $feedback["lname"] = Auth::user()->lname;      
                        $feedback["paid_status"] = Poster::find($post_id)->paid_status;      
                        $feedback["price"] = $price;      
                        $toEmail = Auth::user()->email;
                        Mail::to($toEmail)->send(new FeedbackMail($feedback));

                        $request->session()->put('poster_id','');
                        $temp = Poster::find($post_id); 
                        $feedback["name"] = Auth::user()->name;
                        $feedback["postID"] = $post_id;
                        $feedback["location"] = $temp->in_city.",".$temp->in_state.",".$temp->in_country;
                        $feedback["category"] = Post_Category::find($temp->category_id)->name;
                        $feedback["subcategory"] = PosterCategory::where('poster_id',$post_id)->get();
                        $toEmail = Contact::find('1')->global;                      
                        Mail::to($toEmail)->send(new FeedbackMail($feedback));
                    }
                    
                    return redirect(route('final_page'));
                }
                else
                {
                    return back();
                }        
            }
        }       
        
    }

    public function view_invoice(Request $request,$id)
    {       
        $cur_posterID = \Illuminate\Support\Facades\Crypt::decryptString($id);
        $cur_poster = Poster::find($cur_posterID);    
        $parent_id = $cur_poster->category_id;    
        $cur_poster_sub = PosterCategory::where('poster_id',$cur_posterID)->get();
        $price_plan = Post_Category::find($parent_id);   
        
        return view('user.view_invoice',compact('cur_poster','cur_poster_sub','price_plan'));
    }
}
