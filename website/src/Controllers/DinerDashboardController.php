<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

use In3050Inm428WebDev\PhpMvc\Models\DinerModel;

class DinerDashboardController extends Controller
{
    private $dinerModel;

    public function __construct()
    {
        // Initialize the DinerModel
        $this->dinerModel = new DinerModel();
    }
    public function index()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Refirect to dashboard if not logged in
        if (!isset($_SESSION['dinerLoggedin'])) {
            header('Location: /dashboard');
            exit;
        }

        $data["pagetitle"] = "Diner | Lancaster's Resturant";


        $this->render('pages/diner/diner', $data);
    }

    public function getDiner()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $email = $inputData['email'] ?? null;

            if (!$email) {
                throw new \Exception("Missing required fields: email.");
            }

            // Call the getStaff method in the model
            $response = $this->dinerModel->getDiner(
                $email,
            );

            // Return success response
            echo json_encode($response);
        } catch (\Exception $e) {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while getting current diner: ' . $e->getMessage(),
            ]);
        }
    }

    public function getBookings()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $email = $inputData['email'] ?? null;

            if (!$email) {
                throw new \Exception("Missing required fields: email.");
            }

            // Get current bookings from dinerModel
            $bookings = $this->dinerModel->getBookings($email);

            // Send the bookings to frontend
            echo json_encode(['bookings' => $bookings]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function getBookingsByServiceId()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $serviceId = $inputData['serviceId'] ?? null;
            $date = $inputData['date'] ?? null;

            if (!$serviceId || !$date) {
                throw new \Exception("Missing required fields: email or date.");
            }

            // Get current bookings from dinerModel
            $bookings = $this->dinerModel->getBookingsByServiceId($serviceId, $date);

            // Send the bookings to frontend
            echo json_encode(['bookings' => $bookings]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function getLatestBooking()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $email = $inputData['email'] ?? null;

            if (!$email) {
                throw new \Exception("Missing required fields: email.");
            }

            // Get latest booking from dinerModel
            $booking = $this->dinerModel->getLatestBooking($email);

            // Send the booking to frontend
            echo json_encode(['booking' => $booking]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function changePassword()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (!$inputData) {
            echo "Invalid input data: " . file_get_contents('php://input');
            exit();
        }

        try {
            // Validate input data
            $email = $inputData['email'] ?? null;
            $oldPassword = $inputData['oldPassword'] ?? null;
            $newPassword = $inputData['newPassword'] ?? null;

            if (!$email || !$oldPassword || !$newPassword) {
                echo json_encode(['errors' => 'Missing required fields: oldPassword, or newPassword']);
            }

            // Change Password
            $response = $this->dinerModel->changePassword($email, $oldPassword, $newPassword);

            echo json_encode(['message' => $response]);

        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function bookReservation()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $requiredFields = ['date', 'party_size', 'service_type', 'booking_time', 'customer_name', 'customer_email', 'service_id', 'tables_needed'];
            foreach ($requiredFields as $field) {
                if (empty($inputData[$field])) {
                    throw new \Exception("Missing required field: $field.");
                }
            }

            // Save the booking to the database
            $this->dinerModel->bookReservation($inputData);

            $data["username"] = $inputData['customer_name'];
            $data["userEmail"] = $inputData['customer_email'];
            $data["bookingTime"] = $inputData['booking_time'];
            $data["bookingDate"] = $inputData['date'];
            $data["bookingService"] = $inputData['service_type'];
            $data["bookingPartySize"] = $inputData['party_size'];
            $data["bookingTablesAssigned"] = $inputData['tables_needed'];

            $this->render('pages/diner/diner', $data);
        } catch (\Exception $e) {
            echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function addToCalendar()
    {
        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=booking.ics');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        // Validate input data
        $customerName = $inputData['customerName'] ?? null;
        $bookingDate = $inputData['bookingDate'] ?? null;
        $bookingTime = $inputData['bookingTime'] ?? null;


        if (!$customerName || !$bookingDate || !$bookingTime) {
            throw new \Exception('Missing required booking information');
        }

        $uid = uniqid();
        $dtstamp = gmdate(format: 'Ymd\THis\Z');
        $eventDate = date(format: 'Ymd', timestamp: strtotime(datetime: $bookingDate));
        $eventTime = date(format: 'His', timestamp: strtotime(datetime: $bookingTime));

        // Build the calendar content
        $calendar = "BEGIN:VCALENDAR\r\n";
        $calendar .= "VERSION:2.0\r\n";
        $calendar .= "PRODID:-//Lancaster's Restaurant//EN\r\n";
        $calendar .= "BEGIN:VEVENT\r\n";
        $calendar .= "UID:$uid\r\n";
        $calendar .= "DTSTAMP:$dtstamp\r\n";
        $calendar .= "DTSTART;TZID=Europe/London:$eventDate" . "T" . "$eventTime" . "Z\r\n";
        $calendar .= "DURATION:PT2H\r\n";
        $calendar .= "SUMMARY:Lancaster's Booking\r\n";
        $calendar .= "DESCRIPTION:Reservation for $customerName at Lancaster's Restaurant\r\n";
        $calendar .= "LOCATION:52 Haymarket\\, London\\, SW1Y 4RP\r\n";
        $calendar .= "END:VEVENT\r\n";
        $calendar .= "END:VCALENDAR\r\n";

        echo $calendar;
        exit();
    }

    public function emailConfirmation()
    {
        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (!$inputData) {
            echo "Invalid input data: " . file_get_contents('php://input');
            exit();
        }

        // Validate input data
        $customerName = $inputData['customerName'] ?? null;
        $bookingDate = $inputData['bookingDate'] ?? null;
        $bookingTime = $inputData['bookingTime'] ?? null;
        $bookingService = $inputData['bookingService'] ?? null;
        $bookingPartySize = (int) $inputData['bookingPartySize'] ?? null;
        $bookingTablesAssigned = (int) $inputData['bookingTablesAssigned'] ?? null;
        $userEmail = $inputData['userEmail'] ?? null;


        if (!$customerName || !$bookingDate || !$bookingTime || !$bookingService || !$bookingPartySize || !$bookingTablesAssigned || !$userEmail) {
            throw new \Exception('Missing required booking information');
        }

        $from = 'noreply@lancastersreservations.co.uk';
        $to = $userEmail;
        $subject = "Lancaster's Reservation Confirmation";
        $body = "
            Dear $customerName,
            
            Thank you for making a reservation with us at Lancaster's Restaurant.

            Details of your reservation:
             - Name: $customerName
             - Service: $bookingService
             - Date: $bookingDate
             - Time: $bookingTime
             - Party Size: $bookingPartySize
             - Tables Assigned: $bookingTablesAssigned
            
            We're looking forward to making your experience great.

            Kind Regards
            Lancaster's Resturant
        ";

        $emailContent = "From: $from\r\n";
        $emailContent .= "To: $to\r\n";
        $emailContent .= "Subject: $subject\r\n";
        $emailContent .= "ContentType: text/plain; carset=UTF-8\r\n\r\n";
        $emailContent .= $body;


        echo $emailContent;
        exit();
    }
}