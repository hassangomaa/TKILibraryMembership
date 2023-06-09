<!DOCTYPE html>
<html>
<head>
    <title>TKI Library Membership Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>TKI Library Membership Form</h1>
    <form method="POST" action="{{ route('submit-form') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Your JavaScript code for form validation and country autocomplete
</script>
</body>
</html>
