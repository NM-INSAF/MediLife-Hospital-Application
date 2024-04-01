<?php
include 'libs/load.php';

if (isset($_GET['query'])) {
    $output = '';
    $search = '%' . $_GET['query'] . '%'; // Add wildcards for LIKE search
    $query = "SELECT * FROM tb_doc WHERE doc_name LIKE ?";
    
    // Prepare the statement
    $conn = Database::getConnection();
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("s", $search);
        
        // Execute the statement
        $stmt->execute();
        
        // Get result set
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output .= '<li class="list-group-item">' . $row['doc_name'] . '</li>';
            }
        } else {
            $output = '<li class="list-group-item" >No results found</li>';
        }
        
        // Close the statement
        $stmt->close();
    }

    echo $output;
}


if (isset($_GET['special'])) {

    $output = '';
        $search = '%' . $_GET['query'] . '%'; 
        $query = "SELECT * FROM tb_special WHERE sp_name LIKE ?";
        
        // Prepare the statement
        $conn = Database::getConnection();
        $stmt = $conn->prepare($query);
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("s", $search);
            
            // Execute the statement
            $stmt->execute();
            
            // Get result set
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $output .= '<li class="list-group-item">' . $row['sp_name'] . '</li>';
                }
            } else {
                $output = '<li class="list-group-item" >No results found</li>';
            }
            
            // Close the statement
            $stmt->close();
        }
    
        echo $output;
    }

