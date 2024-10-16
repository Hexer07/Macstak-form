<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <h1>Registration</h1>

    <form action="conn.php" method="post">

        <div>
            <label for="fname">First Name : </label>
            <input type="text" autofocus placeholder="Sanchit" name="fname" id="fname" required>

            <label for="lname">Last Name :</label>
            <input type="text" placeholder="Garg" name="lname" id="lname">
        </div>


        <div>
            <label for="course">Course :</label>
            <input type="text" placeholder="BA Programme" name="course" id="course" required>


            <label for="year">Year :</label>
            <input type="text" placeholder="3rd year" name="year" id="year" required>
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" placeholder="abc@gmail.com" name="email" id="email" required>

            <label for="phone">Phone No. :</label>
            <input type="tel" placeholder="1234567890" name="phone" id="phone"  maxlength="10" required>
        </div>

        <div>
            <label for="question">How do you see yourself contributing to the society?</label>
            <br>
            <textarea name="question" id="question" maxlength="100" required></textarea>
        </div>

        <input type="submit" value="Submit">
    </form>
</body>

</html>