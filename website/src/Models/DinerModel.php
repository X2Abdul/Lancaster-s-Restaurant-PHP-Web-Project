<?php

namespace In3050Inm428WebDev\PhpMvc\Models;

require_once('./includes/dbconnect.php');

class DinerModel
{
    private $connection;

    public function __construct()
    {
        // Connect to the database
        $this->connection = db_connect();
    }

    public function changePassword($email, $oldPassword, $newPassword)
    {
        try {
            $query = "SELECT password FROM user WHERE email = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();

            // If no user found with that email
            if ($result->num_rows === 0) {
                return 'User not found';
            }

            $user = $result->fetch_assoc();

            if (!password_verify($oldPassword, $user["password"])) {
                return 'Old Password is Wrong!';
            }

            $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            $updateQuery = "UPDATE user SET password = ? WHERE email = ?";
            $updateStmt = $this->connection->prepare($updateQuery);
            $updateStmt->bind_param("ss", $hashedNewPassword, $email);
            $updateStmt->execute();

            $stmt->close();
            $updateStmt->close();

            return "Password has changed Successfully";
        } catch (\Exception $e) {
            throw new \Exception("Error fetching current diner: " . $e->getMessage());
        }
    }

    public function getDiner($email)
    {
        try {
            // Query all user for currect diner
            $query = "SELECT fullname FROM user WHERE email = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();
            $diner = $result->fetch_assoc();

            $stmt->close();
            return $diner;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching current diner: " . $e->getMessage());
        }
    }

    public function getBookings($email)
    {
        try {
            // Query all bookings for email
            $query = "SELECT * FROM bookings WHERE customer_email = ? AND date >= CURDATE() ORDER BY date ASC, booking_time ASC";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();
            $bookings = [];

            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row;
            }

            $stmt->close();
            return $bookings;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching bookings: " . $e->getMessage());
        }
    }

    public function getLatestBooking($email)
    {
        try {
            // Query to fetch the latest booking by date and time
            $query = "
            SELECT * 
            FROM bookings 
            WHERE customer_email = ? 
            AND date >= CURDATE() 
            ORDER BY date ASC, booking_time ASC 
            LIMIT 1";

            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Fetch the result
            $result = $stmt->get_result();
            $latestBooking = $result->fetch_assoc();

            $stmt->close();
            return $latestBooking;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching the latest booking: " . $e->getMessage());
        }
    }

    public function getBookingsByServiceId($serviceId, $date)
    {
        try {
            // Query all bookings for email
            $query = "SELECT * FROM bookings WHERE service_id = ? AND date = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ss", $serviceId, $date);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();
            $bookings = [];

            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row;
            }

            $stmt->close();
            return $bookings;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching bookings: " . $e->getMessage());
        }
    }

    public function bookReservation($data)
    {
        try {
            // Add booking to bookings table
            $query = "INSERT INTO bookings (date, party_size, service_type, booking_time, customer_name, customer_email, service_id, tables_needed)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->connection->prepare($query);

            $stmt->bind_param(
                "sissssii",
                $data['date'],
                $data['party_size'],
                $data['service_type'],
                $data['booking_time'],
                $data['customer_name'],
                $data['customer_email'],
                $data['service_id'],
                $data['tables_needed'],
            );
            $stmt->execute();


            // Deduct tables from service table
            $deductQuery = "UPDATE services SET tables_available = tables_available - ? WHERE id = ?";
            $deductStmt = $this->connection->prepare($deductQuery);

            $deductStmt->bind_param("ii", $data['tables_needed'], $data['service_id']);
            $deductStmt->execute();

            $this->connection->commit();

            $stmt->close();
            $deductStmt->close();
        } catch (\Exception $e) {
            $this->connection->rollback();
            throw new \Exception("Error saving booking: " . $e->getMessage());
        }
    }

}