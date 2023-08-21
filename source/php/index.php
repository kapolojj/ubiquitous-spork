<!-- <!DOCTYPE html>
<html>
<head>
    <title>Calculate Rates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 15px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Calculate Rates</h1>
    <form id="rateForm">
        <label for="unitName">Unit Name:</label>
        <input type="text" id="unitName" name="unitName" required><br><br>
        <label for="arrival">Arrival:</label>
        <input type="date" id="arrival" name="arrival" required><br><br>
        <label for="departure">Departure:</label>
        <input type="date" id="departure" name="departure" required><br><br>
        <label for="occupants">Occupants:</label>
        <input type="number" id="occupants" name="occupants" required><br><br>
        <label for="ages">Ages:</label>
        <input type="text" id="ages" name="ages" required><br><br>
        <button type="button" id="calculateBtn">Calculate Rates</button>
    </form>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Rate Calculator</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Rate Calculator</h1>
    <form id="rateForm">
        <label for="unitName">Unit Name:</label>
        <input type="text" id="unitName" name="unitName" required><br><br>
        <label for="arrival">Arrival:</label>
        <input type="date" id="arrival" name="arrival" required><br><br>
        <label for="departure">Departure:</label>
        <input type="date" id="departure" name="departure" required><br><br>
        <label for="occupants">Occupants:</label>
        <input type="number" id="occupants" name="occupants" required><br><br>
        <label for="ages">Ages:</label>
        <input type="text" id="ages" name="ages" required><br><br>
        <button type="button" id="calculateBtn">Calculate Rates</button>
    </form>
    <div id="result"></div>
    <script>
        $(document).ready(function () {
            $('#calculateBtn').click(function () {
                // Gather form data
                var formData = {
                    'Unit Name': $('#unitName').val(),
                    'Arrival': $('#arrival').val(),
                    'Departure': $('#departure').val(),
                    'Occupants': $('#occupants').val(),
                    'Ages': $('#ages').val().split(',').map(Number)
                };

                // Send POST request to API
                $.ajax({
                    type: 'POST',
                    // url: 'http://php-backend-container:8080/api.php/calculate-rates',
                    url: 'http://php-backend-container:8080/api.php/calculate-rates', // Replace with actual container name
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function (data) {
                        // Display response on the page
                        $('#result').html(
                            '<p>Unit Name: ' + data['Unit Name'] + '</p>' +
                            '<p>Rate: $' + data['Rate'] + '</p>' +
                            '<p>Date Range: ' + data['Date Range'] + '</p>' +
                            '<p>Availability: ' + (data['Availability'] ? 'Available' : 'Not Available') + '</p>'
                        );
                    }
                });
            });
        });
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Rate Calculator</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>Rate Calculator</h1>
    </header>
    <div class="container">
        <form id="rateForm">
            <label for="unitName">Unit Name:</label>
            <input type="text" id="unitName" name="unitName" required>
            <label for="arrival">Arrival:</label>
            <input type="date" id="arrival" name="arrival" required>
            <label for="departure">Departure:</label>
            <input type="date" id="departure" name="departure" required>
            <label for="occupants">Occupants:</label>
            <input type="number" id="occupants" name="occupants" required>
            <label for="ages">Ages (comma-separated):</label>
            <input type="text" id="ages" name="ages" required>
            <button type="button" id="calculateBtn">Calculate Rates</button>
        </form>
        <div id="result"></div>
    </div>
    <script>
        $(document).ready(function () {
            $('#calculateBtn').click(function () {
                // Gather form data
                var formData = {
                    'Unit Name': $('#unitName').val(),
                    'Arrival': $('#arrival').val(),
                    'Departure': $('#departure').val(),
                    'Occupants': $('#occupants').val(),
                    'Ages': $('#ages').val().split(',').map(Number)
                };

                // Send POST request to API
                $.ajax({
                    type: 'POST',
                    url: 'gcn-php', // Replace with actual container name
                    // url: 'http://php-backend-container:8080/api.php/calculate-rates', // Replace with actual container name
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function (data) {
                        // Display response on the page
                        $('#result').html(
                            '<p>Unit Name: ' + data['Unit Name'] + '</p>' +
                            '<p>Rate: $' + data['Rate'] + '</p>' +
                            '<p>Date Range: ' + data['Date Range'] + '</p>' +
                            '<p>Availability: ' + (data['Availability'] ? 'Available' : 'Not Available') + '</p>'
                        );
                    }
                });
            });
        });
    </script>
</body>
</html>
