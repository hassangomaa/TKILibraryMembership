<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Form Submission</title>
</head>
<body>
<h1>New Form Submission</h1>

<p>Thank you for submitting the form. Here are the details:</p>

<table>
    <tr>
        <td>Name:</td>
        <td>{{ $formData->first_name }} {{ $formData->last_name }}</td>
    </tr>
    <tr>
        <td>Company:</td>
        <td>{{ $formData->company }}</td>
    </tr>
    <tr>
        <td>Country:</td>
        <td>{{ $formData->country }}</td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td>{{ $formData->prefix }}{{ $formData->phone_number }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{ $formData->email }}</td>
    </tr>
</table>

<p>Thank you!</p>
</body>
</html>
