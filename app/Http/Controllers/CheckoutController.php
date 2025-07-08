<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseSubscribedMail;


class CheckoutController extends Controller
{
    /**
     * Redirect to Stripe Checkout for the selected course.
     */
    public function index(Course $course)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $course->title,
                    ],
                    'unit_amount' => $course->price, // Ensure price is in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['courseId' => $course->id]),

            'cancel_url' => route('payment.cancel'),
        ]);

        // Redirect user to Stripe payment page
        return redirect($session->url);
    }

    /**
     * Handle successful payment.
     */
public function success(Request $request, $courseId)
{
    $course = Course::findOrFail($courseId);
    $user = auth()->user();

    // Attach the course to the user (prevent duplicates)
    $user->subscribedCourses()->syncWithoutDetaching([$course->id]);

    // Send email (queued)
    Mail::to($user->email)->queue(new CourseSubscribedMail($course));

    return redirect()->route('courses.mycourses')->with('success', 'Subscription successful!');
}



    /**
     * Handle payment cancellation.
     */
    public function cancel()
    {
        return view('checkout.cancel');
    }
}
