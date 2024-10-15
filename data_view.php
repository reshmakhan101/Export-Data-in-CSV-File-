<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Download CSV</title>
    <style>
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
    </style>
</head>
<body style="padding: 10px;">
   
   
    <form method="post" class="form group" action="<?php echo site_url('DataController/download_csv'); ?>">
        
        <input type="text" id="phone" name="phone" class="form group" placeholder="Enter Number" style="border-radius: 3px;"> <br><br>
        <button type="submit" class="btn btn-primary">Download CSV</button>
    </form>
</body>
</html>
