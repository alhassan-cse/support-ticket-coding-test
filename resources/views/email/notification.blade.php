<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Notification</title>
    <style>
        .layout {
            width: 600px;
            margin: 0 auto;
        }
        .header-top {
            text-align: center;
            border-bottom: 1px solid #EBEBEC;
            padding: 20px 0;
        }
        .header-top img{
            width: 120px;
        }
        .logo-top{
            text-transform: uppercase;
            color: #0D6EFD;
            font-weight: bold;
            font-size: 28px;
        }
        .greadings{
             padding: 20px 0;
             border-bottom: 1px solid #EBEBEC;
        }
        .name{
            text-transform: capitalize;
        }
        .btn{
            background-color: #0D6EFD;
            padding: 10px 10px;
            border:1px solid #fff;
            color: #fff;
            border-radius: 5%;
            text-decoration: none
        }
        .condition-message{
            padding: 20px 0;
        }
        .atlassian-footer{
            text-align: center;
            padding: 30px 0;
        }
        .atlassian-footer img{
            width: 80px;
        }
        .logo-bottom{
            text-transform: uppercase;
            color: #424242;
            font-weight: bold;
            font-size: 20px;

        }
        .email{
            font-weight: bold;
        }
        .set-button{
            padding: 20px 0;
            color: #fff;
        }
    </style>
</head>
<body>
    <section>
        <div class="layout">
            <div class="header-top">
                <span class="logo-top">Hello, {{ $name }}</span>
            </div>
            <div class="greadings">
                <p>Your issue ([Ticket ID: {{ $ticket_id }}]) is currently being open on by our team. We will get back to you in hours. Thank you for your patience.</p>
            </div>
            <div class="atlassian-footer">
                Thanks,<br>
               <br>
               [Agent Name]
               [Company Name]
            </div>
        </div>
    </section>
</body>

</html>