<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Making Course Booking</title>


    <!-- Main Stylesheets -->
	<link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
    <div class="container">
        <h1>Book a Movie Making sreekutty Course</h1>
        <form id="bookingForm">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="course">Select Course</label>
            <select id="course" name="course" required>
                <option value="">-- Choose a Course --</option>
                <option value="moving_castle">Moving Castle Creations (3D Animation)</option>
                <option value="film_basics">Film Making Basics</option>
                <option value="script_writing">Script Writing Essentials</option>
            </select>

            <label for="requests">Nice-to-Have Requests</label>
            <textarea id="requests" name="requests" placeholder="Enter any additional requests..."></textarea>

            <button type="submit">Submit Booking</button>
        </form>
    </div>

    <script>
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission for demo purposes

            alert('Booking submitted successfully!');
        });
    </script>
</body>
</html>
