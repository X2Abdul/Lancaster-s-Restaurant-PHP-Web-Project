<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

require_once('./includes/dbconnect.php');

use In3050Inm428WebDev\PhpMvc\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['staffLoggedin'])) {
            header('Location: /dashboard/staff');
            exit;
        }

        if (isset($_SESSION['dinerLoggedin'])) {
            header('Location: /dashboard/diner');
            exit;
        }

        $data["pagetitle"] = "Login Dashboard | Lancaster's Resturant";

        $this->render('pages/login/login', $data);
    }

    public function getUserRole()
    {
        header('Content-Type: application/json');

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        error_log('Session data: ' . print_r($_SESSION, true));
        $response = ['role' => $_SESSION['userRole'] ?? 'guest', 'email' => $_SESSION['userEmail'] ?? ''];
        echo json_encode($response);

        // Ensures headers are sent properly
        //ob_end_flush();
    }

    public function register()
    {
        header('Content-Type: application/json');

        // Get form data
        $fullname = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? '';

        // Validate inputs
        $errors = [];
        if (empty($fullname))
            $errors[] = "Full name is required.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Invalid email address.";
        if (strlen($password) < 8)
            $errors[] = "Password must be at least 8 characters long.";
        if (!in_array($role, ['staff', 'customer']))
            $errors[] = "Invalid role.";

        if (!empty($errors)) {
            echo json_encode(['errors' => $errors]);
            exit();

        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Connect to the database
        $connection = db_connect();

        if (!$connection) {
            echo json_encode(['errors' => ['Database connection failed.']]);
            exit();
        }

        // Get table
        $table = $role === 'customer' ? 'user' : 'staff';

        // Insert user into the database
        try {
            if ($stmt = $connection->prepare("INSERT INTO $table (fullname, email, password) VALUES (?, ?, ?)")) {
                $stmt->bind_param("sss", $fullname, $email, $hashedPassword);
                $stmt->execute();

                $stmt->close();
                $connection->close();

                echo json_encode([
                    'success' => 'Account created successfully. Please log in.',
                    'accountDetails' => [
                        'fullname' => $fullname,
                        'email' => $email
                    ]
                ]);
                exit();
            } else {
                throw new \Exception("Failed to prepare the SQL statement.");
            }
        } catch (\Exception $e) {
            // Handle errors
            $errors[] = "An error occurred: " . $e->getMessage();
            if ($connection->errno === 1062) {
                $errors[] = "The email address is already in use.";
            }
            echo json_encode(['errors' => $errors]);
            $connection->close();
            exit();
        }
    }

    public function authenticate()
    {
        header('Content-Type: application/json');

        // Get form data
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? '';

        // Validate inputs
        $errors = [];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Invalid email address.";
        if (strlen($password) < 8)
            $errors[] = "Password must be at least 8 characters long.";
        if (!in_array($role, ['staff', 'customer']))
            $errors[] = "Invalid role.";

        if (!empty($errors)) {

            echo json_encode(['errors' => $errors]);
            exit();
        }

        // Connect to the database
        $connection = db_connect();

        if (!$connection) {
            echo json_encode(['errors' => ['Database connection failed.']]);
            exit();
        }

        // Get table
        $table = $role === 'customer' ? 'user' : 'staff';

        // Insert user into the database
        try {
            $stmt = $connection->prepare("SELECT fullname, email, password FROM $table WHERE email = ?");
            if (!$stmt) {
                throw new \Exception("Failed to prepare the SQL statement: " . $connection->error);
            }

            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result->num_rows === 0) {
                // Email not found
                echo json_encode(['errors' => ["Invalid email or password."]]);
                $stmt->close();
                $connection->close();
                exit();
            }

            // Fetch user data
            $user = $result->fetch_assoc();
            $stmt->close();

            // Verify password
            if (!password_verify($password, $user['password'])) {
                $connection->close();
                echo json_encode(['errors' => ["Invalid email or password."]]);
                exit();
            }


            echo json_encode(['loginSuccess' => 'User authenticated successfully.']);

            // Start session if not exist
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if ($role === 'customer') {
                $_SESSION["dinerLoggedin"] = true;

                $_SESSION['userRole'] = 'customer';
            } else {
                $_SESSION["staffLoggedin"] = true;
                $_SESSION['userRole'] = 'staff';
            }
            $_SESSION["userEmail"] = $email;
            session_write_close();
            exit();
        } catch (\Exception $e) {
            // Handle errors
            echo json_encode(['errors' => ["An error occurred: " . $e->getMessage()]]);
            $connection->close();
            exit();
        }
    }

    public function logout()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Destroy session and redirect to dahsboard
        session_destroy();
        header('Location: /dashboard');
        exit;
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
        $userEmail = $inputData['userEmail'] ?? null;


        if (!$customerName || !$userEmail) {
            throw new \Exception('Missing required booking information');
        }

        $from = 'noreply@lancastersaccounts.co.uk';
        $to = $userEmail;
        $subject = "Lancaster's Account Confirmation";
        $body = "
            Dear $customerName,
            
            Thank you for making a diner account with Lancaster's Restaurant.
            
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