<?php
// Include the login and signup functions
require_once './src/login.php';
require_once './src/signup.php';

// Test cases
$testResults = [];

// Test: Valid login (No password hashing in login)
$expectedLoginResult = "Login Successful";
$actualLoginResult = login("ertyu@gmail.com", "ertyu123");  // Ensure this matches the password stored in the database
$testResults[] = [
    "Test Case" => "Valid Login",
    "Expected" => $expectedLoginResult,
    "Actual" => $actualLoginResult,
    "Status" => ($expectedLoginResult === $actualLoginResult) ? "Pass" : "Fail"
];

// Test: Valid signup (No password hashing in signup)
$expectedSignupResult = "Sign-Up Successful";
$actualSignupResult = signup("newuser@example.com", "StrongPass123");  // Ensure this is inserted directly into the database
$testResults[] = [
    "Test Case" => "Valid Signup",
    "Expected" => $expectedSignupResult,
    "Actual" => $actualSignupResult,
    "Status" => ($expectedSignupResult === $actualSignupResult) ? "Pass" : "Fail"
];

// Render results in the browser
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browser-Based Testing</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .pass {
            color: green;
        }
        .fail {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Test Results</h1>
    <table>
        <thead>
            <tr>
                <th>Test Case</th>
                <th>Expected</th>
                <th>Actual</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testResults as $result): ?>
                <tr>
                    <td><?php echo $result["Test Case"]; ?></td>
                    <td><?php echo $result["Expected"]; ?></td>
                    <td><?php echo $result["Actual"]; ?></td>
                    <td class="<?php echo strtolower($result["Status"]); ?>">
                        <?php echo $result["Status"]; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
