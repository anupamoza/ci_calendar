<!DOCTYPE html>
<html>
    <head>
        <title>Meeting Calendar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            /*Calendar Css*/
            .calendar{
                font-family: Arial;
                font-size: 12px;
            }
            table.calendar{
                border: 15px solid #25BAE4;
                border-collapse:collapse;
                margin-top: 50px;
                margin-left: 250px;
            }
            .calendar td{
                width: 80px;
                height: 80px;
                text-align: center;
                border: 1px solid #e2e0e0; 
                font-size: 18px;
                font-weight: bold;
            }

            table.calendar .content{
                font-size: small;
                font-weight: 100;
            }
            .calendar .days td:hover{
                background-color: #f2f2f2;
            }
            .calendar th{
                height: 50px;
                padding-bottom: 8px;
                background:#25BAE4;
                font-size: 20px;
            }
            .prev_sign a, .next_sign a{
                color:white;
                text-decoration: none;
            }
            tr.week_name{
                font-size: 16px;
                font-weight:400;
                color:red;
                width: 10px;
                background-color: #efe8e8;
            }
            .highlight{
                background-color:#25BAE4;
                padding-top: 13px;
                padding-bottom: 7px;
            }
            /*-----CSS for Right Side Advertisement----*/
            #fugo{
                position: absolute;
                top: 80px;
                left: 1085px;
                margin-top:-30px;
            }

            /* Calendar css Ends*/
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>

