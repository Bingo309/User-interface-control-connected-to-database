<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Directional Controls</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .controls {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-rows: 1fr 1fr 1fr;
      grid-gap: 10px;
      width: 200px;
      height: 200px;
    }

    .controls button {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
    }

    .controls button:hover {
      background-color: #45a049;
    }

    .controls button:focus {
      outline: none;
    }

    .controls #up {
      grid-column: 2 / 3;
      grid-row: 1 / 2;
    }

    .controls #left {
      grid-column: 1 / 2;
      grid-row: 2 / 3;
    }

    .controls #right {
      grid-column: 3 / 4;
      grid-row: 2 / 3;
    }

    .controls #down {
      grid-column: 2 / 3;
      grid-row: 3 / 4;
    }

    .controls #stop {
      grid-column: 2 / 3;
      grid-row: 2 / 3;
      background-color: red;
    }
  </style>
</head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "robotcontrol";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $direction = $_POST['direction'];

    $sql = "INSERT INTO direction (Direction) VALUES ('$direction')";

    if ($conn->query($sql) !== TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  ?>
  <form method="post">
    <div class="controls">
      <button type="submit" name="direction" value="Up" id="up">Up</button>
      <button type="submit" name="direction" value="Left" id="left">Left</button>
      <button type="submit" name="direction" value="Right" id="right">Right</button>
      <button type="submit" name="direction" value="Down" id="down">Down</button>
      <button type="submit" name="direction" value="Stop" id="stop">Stop</button>
    </div>
  </form>
</body>
</html>
