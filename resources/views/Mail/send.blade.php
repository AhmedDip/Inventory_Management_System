<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hisab Kitab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     

</head>

<body style="background-color: rgb(225, 234, 235);">

   <h1 style="color:rgb(250, 156, 16); text-align:center;">হিসাব কিতাব</h1>


    <table class="table table-bordered" style="width: 100%; border: 1px solid rgb(161, 158, 158); ">
            <thead>
                <tr>
                    <th style="border: 1px solid rgb(161, 158, 158);" scope="col">Name</th>
                    <th style="border: 1px solid rgb(161, 158, 158);"  scope="col">Email</th>
                    <th style="border: 1px solid rgb(161, 158, 158);" scope="col">Subject</th>
                    <th style="border: 1px solid rgb(161, 158, 158);" scope="col">Message</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid rgb(161, 158, 158);">{{ $name }}</td>
                    <td style="border: 1px solid rgb(161, 158, 158);">{{ $email }}</td>
                    <td style="border: 1px solid rgb(161, 158, 158);">{{ $subject }}</td>
                    <td style="border: 1px solid rgb(161, 158, 158);">{{ $msg }}</td>

                </tr>

            </tbody>
        </table>
</body>

</html>
