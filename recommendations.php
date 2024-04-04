<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Health Recommendations - HealthCoach</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        background-image: url("image1.png");
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        font-family: Arial, sans-serif;
      }
      header {
        background-color: #4caf50;
        color: white;
        width: 100%;
        padding: 20px 0;
        text-align: center;
      }
      header h1 {
        margin: 0;
      }
      .recommendations {
        text-align: center;
        padding: 20px;
      }
      .bmi {
        text-align: center;
        padding: 20px;
      }
      .chart {
        margin-top: 20px;
      }
      nav {
        background-color: #333;
        overflow: hidden;
      }
      nav a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
      }
      nav a:hover {
        background-color: #ddd;
        color: black;
      }
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }
      .container {
        width: 500px;
        /* margin: 50px; */
        background-color: #fff;
        padding: 60px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .form-group {
        margin-bottom: 20px;
      }
      .form-group label {
        display: block;
        margin-bottom: 5px;
      }
      .form-group input[type="text"],
      .form-group input[type="email"],
      .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .form-group textarea {
        height: 100px;
      }
      .form-group button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      .form-group button:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div style="color: black" class="recommendations">
      <div class="container">
        <h2>Lifestyle and personal data</h2>
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
          </div>
          <div class="form-group">
            <label for="prof">Your Profession</label>
            <input type="text" id="prof" name="prof" required />
          </div>
          <div class="form-group">
            <label for="blood">Blood Group</label>
            <select id="blood" name="blood" required>
              <option>A+</option>
              <option>A-</option>
              <option>B+</option>
              <option>B-</option>
              <option>O+</option>
              <option>O-</option>
              <option>AB+</option>
              <option>AB-</option>
            </select>
            
            <div class="form-group" style="margin-top:20px ;">
                <label for="work">Do you Workout?</label>
                <label for="">yes</label>
                <input type="radio" id="work" name="work"  value="yes" required />
                <label for="">no</label>
                <input type="radio" id="work" name="work" value="no" required />
              </div>
          </div>

          <div class="form-group">
            <label for="symptoms">Symptoms if any:</label>
            <textarea id="symptoms" name="symptoms" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <footer
      style="
        background-color: #4caf50;
        width: 100%;
        padding: 1px 0;
        bottom: 0;
        text-align: center;
        color: white;
      "
    >
      <h1>Health Coach</h1>
    </footer>
  </body>
  <?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "database@123";
$database = "health";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data validation
    $name = validate_input($_POST["name"]);
    $email = validate_input($_POST["email"]);
    $profession = validate_input($_POST["prof"]);
    $blood_group = validate_input($_POST["blood"]);
    $workout = validate_input($_POST["work"]);
    $symptoms = validate_input($_POST["symptoms"]);

    // SQL query to insert data into database
    $sql = "INSERT INTO user_data (name, email, profession, blood_group, workout, symptoms) VALUES ('$name', '$email', '$profession', '$blood_group', '$workout', '$symptoms')";

    if ($conn->query($sql) === TRUE) {
        echo "Data uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to validate input data
function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close connection
$conn->close();
?>

</html>
