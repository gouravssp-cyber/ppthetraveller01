<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Handle the booking form submission and send email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendBookingMail(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_date' => 'required|date|after_or_equal:today',
            'travelers' => 'required|integer|min:1|max:100',
            'package_id' => 'required|integer|exists:packages,id',
            'package_title' => 'required|string',
            'total_price' => 'required|numeric|min:0',
            'requirements' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        try {
            // For now, logging the booking request
            // You can implement actual email sending later
            
            \Log::info('Booking Request Received', [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'package' => $data['package_title'],
                'start_date' => $data['start_date'],
                'travelers' => $data['travelers'],
                'total_price' => $data['total_price'],
                'requirements' => $data['requirements'] ?? 'None',
            ]);

            // TODO: Uncomment when ready to send emails
            // Mail::send('emails.booking', $data, function ($message) use ($data) {
            //     $message->to(config('mail.admin_email', 'admin@example.com'))
            //             ->subject('New Booking Request - ' . $data['package_title']);
            // });

            return response()->json([
                'message' => 'Booking request submitted successfully!',
                'success' => true
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Booking Error: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'An error occurred while processing your booking. Please try again.',
                'success' => false
            ], 500);
        }
    }
}