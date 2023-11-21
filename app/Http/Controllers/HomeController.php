<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\PostComment;
use App\Rules\MatchOldPassword;
use Hash;
use Auth;
use Carbon\Carbon;
use App\Models\OTP;
use Mail;
use App\Mail\SendEmailOTP;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(){
        return view('user.index');
    }

    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('user.users.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }

    // Order
    public function orderIndex(){
        $orders=Order::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders',$orders);
    }
    public function userOrderDelete($id)
    {
        $order=Order::find($id);
        if($order){
           if($order->status=="process" || $order->status=='delivered' || $order->status=='cancel'){
                return redirect()->back()->with('error','You can not delete this order now');
           }
           else{
                $status=$order->delete();
                if($status){
                    request()->session()->flash('success','Order Successfully deleted');
                }
                else{
                    request()->session()->flash('error','Order can not deleted');
                }
                return redirect()->route('user.order.index');
           }
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderShow($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('user.order.show')->with('order',$order);
    }
    // Product Review
    public function productReviewIndex(){
        $reviews=ProductReview::getAllUserReview();
        return view('user.review.index')->with('reviews',$reviews);
    }

    public function productReviewEdit($id)
    {
        $review=ProductReview::find($id);
        // return $review;
        return view('user.review.edit')->with('review',$review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewUpdate(Request $request, $id)
    {
        $review=ProductReview::find($id);
        if($review){
            $data=$request->all();
            $status=$review->fill($data)->update();
            if($status){
                request()->session()->flash('success','Review Successfully updated');
            }
            else{
                request()->session()->flash('error','Something went wrong! Please try again!!');
            }
        }
        else{
            request()->session()->flash('error','Review not found!!');
        }

        return redirect()->route('user.productreview.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewDelete($id)
    {
        $review=ProductReview::find($id);
        $status=$review->delete();
        if($status){
            request()->session()->flash('success','Successfully deleted review');
        }
        else{
            request()->session()->flash('error','Something went wrong! Try again');
        }
        return redirect()->route('user.productreview.index');
    }

    public function userComment()
    {
        $comments=PostComment::getAllUserComments();
        return view('user.comment.index')->with('comments',$comments);
    }
    public function userCommentDelete($id){
        $comment=PostComment::find($id);
        if($comment){
            $status=$comment->delete();
            if($status){
                request()->session()->flash('success','Post Comment successfully deleted');
            }
            else{
                request()->session()->flash('error','Error occurred please try again');
            }
            return back();
        }
        else{
            request()->session()->flash('error','Post Comment not found');
            return redirect()->back();
        }
    }
    public function userCommentEdit($id)
    {
        $comments=PostComment::find($id);
        if($comments){
            return view('user.comment.edit')->with('comment',$comments);
        }
        else{
            request()->session()->flash('error','Comment not found');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userCommentUpdate(Request $request, $id)
    {
        $comment=PostComment::find($id);
        if($comment){
            $data=$request->all();
            // return $data;
            $status=$comment->fill($data)->update();
            if($status){
                request()->session()->flash('success','Comment successfully updated');
            }
            else{
                request()->session()->flash('error','Something went wrong! Please try again!!');
            }
            return redirect()->route('user.post-comment.index');
        }
        else{
            request()->session()->flash('error','Comment not found');
            return redirect()->back();
        }

    }

    public function changePassword(){
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('user')->with('success','Password successfully changed');
    }



    //verify email : form
    public function verifyEmail(){
        $user = Auth::user();
        // dd($user);

        return view('user.users.verify-email',compact("user"));
    }

    //verify email : form POST
    public function verifyEmailPost(Request $request){
        // dd($request->all());

        //get the user
        $user = User::where('email',$request->email)->first();

        $currentTime = Carbon::now();  // Get the current time
        $timestampIn10Minutes = $currentTime->addMinutes(10);  // Add 10 minutes

        
        $otp = null;

        //check for existing OTP
        $check_otp = OTP::latest()->where('user_id', $user->id);


        if(!empty($check_otp) && $check_otp > now()){
            //&& $check_otp >= now()
            $otp = $check_otp;

        //    $formattedDatetime = Carbon::parse($check_otp->expiration)->format('Y-m-d H:i:s');
             

        //     if($formattedDatetime->gt($currentTime) ){
        //         $otp = $check_otp;
        //     }else{

        //         $otp = new OTP();
        //         $otp->otp = $randomNumber = mt_rand(100000, 999999); // Generates a random 6-digit number

        //         //otp expires in 10 minutes
        //         $otp->expiration = $timestampIn10Minutes;

        //         $otp->user_id = $user->id;
                
        //         // dd($otp);

        //         $otp->save();

        //     }


        }else{
        
            $otp = new OTP();
            $otp->otp = $randomNumber = mt_rand(100000, 999999); // Generates a random 6-digit number

            //otp expires in 10 minutes
            $otp->expiration = $timestampIn10Minutes;

            $otp->user_id = $user->id;
            
            // dd($otp);

            $otp->save();
        }


        

        // dd($otp);
        
        $user->send_subject = "Email OTP Verification";
        $user->send_message = $otp->otp;

        Mail::to($user->email)->send(new SendEmailOTP($user));


        session()->flash('success','We have sent the OTP verification to your email. Please check you email');

        return redirect()->route('email.verify-otp');

    }

    //verify email OTP : form
    public function verifyEmailOTP(){
        $user = Auth::user();
        // dd($user);



        return view('user.users.verify-email-otp',compact("user"));
    }
    
    public function verifyEmailOTPPost(Request $request){
        // dd($request->all());

        $check_otp = OTP::latest()->where('user_id', $request->user_id)->first();
        // dd($check_otp);

        // dd($request);

        if( $check_otp->otp != $request->otp){
            return redirect()->back()->with('error','Wrong OTP ');
        }else{
            $user = User::find($request->user_id);
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('user-profile')->with('success',"Email verified Successfully");
        }


    }


}
