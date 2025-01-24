<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

use In3050Inm428WebDev\PhpMvc\Models\StaffModel;

class StaffDashboardController extends Controller
{
    private $staffModel;

    public function __construct()
    {
        // Initialize the StaffModel
        $this->staffModel = new StaffModel();
    }
    public function index()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            $userRole = $_SESSION['userRole'] ?? '';
        }

        // Refirect to dashboard if not logged in
        if (!isset($_SESSION['staffLoggedin'])) {
            header('Location: /dashboard');
            exit;
        }

        $data["pagetitle"] = "Staff | Lancaster's Resturant";

        $this->render('pages/staff/staff', $data);
    }

    public function getStaff()
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
            $response = $this->staffModel->getStaff(
                $email,
            );

            // Return success response
            echo json_encode($response);
        } catch (\Exception $e) {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while getting current staff: ' . $e->getMessage(),
            ]);
        }
    }

    public function getCurrentBookings()
    {
        header('Content-Type: application/json');

        try {
            // Get current bookings from staffModel
            $bookings = $this->staffModel->getCurrentBookings();

            // Send the bookings to frontend
            echo json_encode(['bookings' => $bookings]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function getUpcomingBookings()
    {
        header('Content-Type: application/json');

        // Get upcoming bookings from staff model
        try {
            $bookings = $this->staffModel->getUpcomingBookings();

            // Send the bookings to frontend
            echo json_encode(['bookings' => $bookings]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function getUpcomingServices()
    {
        header('Content-Type: application/json');

        // Get upcoming services from staff model
        try {
            $services = $this->staffModel->getUpcomingServices();

            // Send the services to frontend
            echo json_encode(['services' => $services]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function getBookingsForUpcomingService()
    {
        header('Content-Type: application/json');

        // Get bookings for upcoming service from staff model
        try {
            $services = $this->staffModel->getBookingsForUpcomingService();

            // Send the bookings to frontend
            echo json_encode(['bookings' => $services]);
        } catch (\Exception $e) {
            echo json_encode(['errors' => ['An error occurred: ' . $e->getMessage()]]);
        }
    }

    public function createService()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $serviceDate = $inputData['service_date'] ?? null;
            $startTime = $inputData['start_time'] ?? null;
            $endTime = $inputData['end_time'] ?? null;
            $tablesAvailable = $inputData['tables_available'] ?? null;
            $serviceType = $inputData['service_type'] ?? null;

            if (!$serviceDate || !$startTime || !$endTime || !$tablesAvailable) {
                throw new \Exception("Missing required fields: service_date, start_time, end_time, or tables_available.");
            }

            // Call the createService method in the model
            $response = $this->staffModel->createService(
                $serviceDate,
                $startTime,
                $endTime,
                $tablesAvailable,
                $serviceType
            );

            // Return success response
            echo json_encode($response);
        } catch (\Exception $e) {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while creating the service: ' . $e->getMessage(),
            ]);
        }
    }

    public function getService()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $serviceID = $inputData['serviceID'] ?? null;

            if (!$serviceID) {
                throw new \Exception("Missing required fields: serviceID");
            }

            // Call the createService method in the model
            $service = $this->staffModel->getService(
                $serviceID,
            );

            // Return success response
            echo json_encode(['service' => $service]);
        } catch (\Exception $e) {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while fetching the service: ' . $e->getMessage(),
            ]);
        }
    }

    public function editService()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $serviceID = $inputData['serviceID'] ?? null;
            $serviceDate = $inputData['service_date'] ?? null;
            $startTime = $inputData['start_time'] ?? null;
            $endTime = $inputData['end_time'] ?? null;
            $tablesAvailable = $inputData['tables_available'] ?? null;
            $serviceType = $inputData['service_type'] ?? null;
            if (!$serviceID || !$serviceDate || !$startTime || !$endTime || !$tablesAvailable || !$serviceType) {
                throw new \Exception("Missing required fields: serviceID, serviceType, service_date, start_time, end_time, or tables_available.");
            }

            // Call the editService method
            $response = $this->staffModel->editService(
                $serviceID,
                $serviceDate,
                $startTime,
                $endTime,
                $tablesAvailable,
                $serviceType
            );

            // Return success response
            echo json_encode($response);
        } catch (\Exception $e) {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while updating the service: ' . $e->getMessage(),
            ]);
        }
    }

    public function deleteService()
    {
        header('Content-Type: application/json');

        // Get input data from the request
        $inputData = json_decode(file_get_contents('php://input'), true);

        try {
            // Validate input data
            $serviceID = $inputData['serviceID'] ?? null;
            if (!$serviceID) {
                throw new \Exception("Missing required fields: serviceID.");
            }

            // Call the deleteService method
            $response = $this->staffModel->deleteService(
                $serviceID,
            );

            // Return success response
            echo json_encode($response);
        } catch (\Exception $e) {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while deleting the service: ' . $e->getMessage(),
            ]);
        }
    }

}