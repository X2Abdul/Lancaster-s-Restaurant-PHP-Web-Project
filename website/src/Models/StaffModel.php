<?php

namespace In3050Inm428WebDev\PhpMvc\Models;

require_once('./includes/dbconnect.php');

class StaffModel
{
    private $connection;

    public function __construct()
    {
        // Connect to the database
        $this->connection = db_connect();
    }

    public function getStaff($email)
    {
        try {
            // Query all staff for currect staff
            $query = "SELECT fullname FROM staff WHERE email = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();
            $staff = $result->fetch_assoc();

            $stmt->close();
            return $staff;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching current staff: " . $e->getMessage());
        }
    }

    public function getCurrentBookings()
    {
        try {
            // Query all todays bookings
            $query = "SELECT * FROM bookings WHERE date = CURDATE()";
            $stmt = $this->connection->prepare($query);
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
            throw new \Exception("Error fetching current bookings: " . $e->getMessage());
        }
    }

    public function getUpcomingBookings()
    {
        try {
            // Query all upcoming bookings by asending order
            $query = "SELECT * FROM bookings WHERE date > CURDATE() ORDER BY date ASC";
            $stmt = $this->connection->prepare($query);
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
            throw new \Exception("Error fetching upcoming bookings: " . $e->getMessage());
        }
    }

    public function getUpcomingServices()
    {
        try {
            // Query all upcoming services by asending order
            $query = "SELECT * FROM services WHERE service_date >= CURDATE() ORDER BY service_date ASC";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();
            $services = [];

            while ($row = $result->fetch_assoc()) {
                $services[] = $row;
            }

            $stmt->close();
            return $services;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching upcoming services: " . $e->getMessage());
        }
    }

    public function getBookingsForUpcomingService()
    {
        try {
            // Query all bookings for upcoming service by asending order
            $query = "WITH next_service AS (
                        SELECT service_date, service_type 
                        FROM services 
                        WHERE service_date >= CURDATE() 
                        ORDER BY service_date ASC, start_time ASC 
                        LIMIT 1
                    )
                    SELECT 
                        b.booking_time,
                        b.party_size,
                        b.customer_name
                    FROM bookings b
                    JOIN next_service ns 
                        ON b.date = ns.service_date 
                        AND b.service_type = ns.service_type
                    WHERE b.status = TRUE
                    ORDER BY b.booking_time ASC";

            $stmt = $this->connection->prepare($query);
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
            throw new \Exception("Error fetching bookings for upcoming service: " . $e->getMessage());
        }
    }

    public function createService($serviceDate, $startTime, $endTime, $tablesAvailable, $serviceType = null)
    {
        try {
            // Validate required inputs
            if (empty($serviceDate) || empty($startTime) || empty($endTime) || empty($tablesAvailable)) {
                throw new \Exception("Missing required fields: service date, start time, end time, or tables available.");
            }

            // Check if the service already exists for the given date and type
            $checkQuery = "SELECT COUNT(*) as count FROM services WHERE service_date = ? AND service_type = ?";
            $checkStmt = $this->connection->prepare($checkQuery);

            if (!$checkStmt) {
                throw new \Exception("Error preparing check statement: " . $this->connection->error);
            }

            $checkStmt->bind_param("ss", $serviceDate, $serviceType);

            if (!$checkStmt->execute()) {
                throw new \Exception("Error executing check query: " . $checkStmt->error);
            }

            $result = $checkStmt->get_result();
            $row = $result->fetch_assoc();

            if ($row['count'] > 0) {
                return [
                    "success" => false,
                    "message" => "This service type for the given date already exists."
                ];
            }

            // Prepare the SQL query
            $query = "INSERT INTO services (service_date, service_type, start_time, end_time, tables_available) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);

            if (!$stmt) {
                throw new \Exception("Error preparing statement: " . $this->connection->error);
            }

            // Bind parameters
            $stmt->bind_param(
                "ssssi",
                $serviceDate,
                $serviceType,
                $startTime,
                $endTime,
                $tablesAvailable
            );

            // Execute the query
            if (!$stmt->execute()) {
                throw new \Exception("Error executing query: " . $stmt->error);
            }

            // Close the statement
            $checkStmt->close();
            $stmt->close();

            // Return success response
            return [
                "success" => true,
                "message" => "Service created successfully."
            ];
        } catch (\Exception $e) {
            // Handle exceptions
            throw new \Exception("Error creating service: " . $e->getMessage());
        }
    }

    public function getService($serviceId)
    {
        try {
            // Query service by service ID
            $query = "SELECT * FROM services WHERE id = $serviceId";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();
            $service = [];

            while ($row = $result->fetch_assoc()) {
                $service[] = $row;
            }

            $stmt->close();
            return $service;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching service: " . $e->getMessage());
        }
    }

    public function editService($serviceID, $serviceDate, $startTime, $endTime, $tablesAvailable, $serviceType)
    {
        try {
            // Prepare the SQL query to update the service
            $query = "UPDATE services SET service_date = ?, service_type = ?, start_time = ?, end_time = ?, tables_available = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);

            if (!$stmt) {
                throw new \Exception("Error preparing statement: " . $this->connection->error);
            }

            // Bind parameters
            $stmt->bind_param(
                "ssssii",
                $serviceDate,
                $serviceType,
                $startTime,
                $endTime,
                $tablesAvailable,
                $serviceID
            );

            // Execute the query
            if (!$stmt->execute()) {
                throw new \Exception("Error executing query: " . $stmt->error);
            }

            // Close the statement
            $stmt->close();

            // Return success response
            return [
                "success" => true,
                "message" => "Service updated successfully."
            ];
        } catch (\Exception $e) {
            throw new \Exception("Error updating service: " . $e->getMessage());
        }
    }

    public function deleteService($serviceID)
    {
        try {
            // Prepare the SQL query to update the service
            $query = "DELETE FROM services WHERE id = ?";
            $stmt = $this->connection->prepare($query);

            if (!$stmt) {
                throw new \Exception("Error preparing statement: " . $this->connection->error);
            }

            // Bind parameters
            $stmt->bind_param(
                "s",
                $serviceID
            );

            // Execute the query
            if (!$stmt->execute()) {
                throw new \Exception("Error executing query: " . $stmt->error);
            }

            // Close the statement
            $stmt->close();

            // Return success response
            return [
                "success" => true,
                "message" => "Service deleted successfully."
            ];
        } catch (\Exception $e) {
            throw new \Exception("Error deleting service: " . $e->getMessage());
        }
    }
}