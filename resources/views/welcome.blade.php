

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">
    <title>Weclome to school sys</title>




    <style>
        body{
            background-color:#F0F2F5;
            min-width: 500px;
            line-height: 1.34;
            font-size: 20px;
        }
        img{
            margin: 30px;
            position: absolute;
            left:200px;
            top:150px;
        }
        h2{
            font-size: 28px;
            font-family: Helvetica,'Noto Sans JP', sans-serif;
            font-weight: normal;
            line-height: 32px;
            width: 550px;
            letter-spacing: normal;
            color: #1C1E21;
            padding: 20px 0;
            position:relative;
            left:222px;
            top:233px;

        }
        .forms{
            width:400px;
            height: 260px;
            background-color: #ffffff;
            display: inline-block;
            position: absolute;
            top:95px;
            right:234px;
            align-items: center;
            background-color: #fff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            box-sizing: border-box;
            margin: 40px 0 0;
            padding: 20px 0 28px;
            width: 396px;
        }
        .email{
            padding: 0px 16px;
        }
        #email{
            padding: 14px 16px;
            font-size: 17px;
            padding: 14px 16px;
            width: 360px;
            border-width: 1px;
            border-radius: 8px;
            box-sizing: border-box;
            border-color: rgb(221,223,226);
        }
        #email:hover{
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            border-color:#1877f2;
        }
        #email:focus{
            border-style: none;
        }
        .password{
            padding: 10px 16px;
        }
        #pass{
            padding: 14px 16px;
            font-size: 17px;
            padding: 14px 16px;
            width: 360px;
            border: 1px solid;
            border-color: rgb(221,223,226);
            border-radius: 8px;
            box-sizing: border-box;
        }
        #pass:hover{
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            border-color:#1877f2;
        }
        #pass:focus{
            border-style: none;
        }
        .botton{
            background-color: #1877f2;
            border: none;
            border-radius: 6px;
            font-size: 20px;
            line-height: 48px;
            padding: 0 16px;
            width: 332px;
            margin-left: 16px;
            font-size: 17px;
            padding: 0px 16px;
            width: 366px;
        }
        #login{
            font: 400 13.3333px Arial;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            white-space: nowrap;
            font-size: 20px;
            font-family: Helvetica, Arial,sans-serif;
            font-weight: bolder;
            color: #fff;
        }
        .botton:hover{
            background-color: #166fe5;
        }
        .fgt{
            margin-top: 16px;
            text-align: center;

        }
        .forget{
            margin-top: 16px;
            font-size: 12px;
            text-align: center;
            text-decoration: none;
            color: #1877f2;
            font: 14px Helvetica, Arial, monospace;
        }
        .forget:hover{
            text-decoration: underline;
        }
        #br{
            margin: 6px 16px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #dadde1;
        }
        .acc{
            padding-top: 6px;
            margin-top: 17px;
            text-align: center;
        }
        .newacc{
            border: none;
            border-radius: 6px;
            font-size: 17px;
            line-height: 48px;
            padding: 12px 16px;
        }
        #new:hover{
            background-color: #36a420;
        }
        #new{
            color: #fff;
            background-color: #42b72a;
            font-weight: bold;
            text-decoration: none;
            position: relative;
        }
        .newpage {
            font-size: 14px;
            color: #000;
            margin-top: 62px;
            text-align: center;
            font-family: Arial, Helvetica;
            color: #000;
            margin-bottom: 56px;
        }
        .create{
            text-decoration: none;
            font-family: sans-serif, Arial;
            font-weight: bolder;
            color:#000;
            margin-bottom: 450px;
        }
        .create:hover{
            text-decoration: underline;
        }

        ul{
            list-style: none;
            padding: 0;
        }
        ul li{
            padding: 10px 15px;
            margin-top: 20px;
            background: #c0c1c8;
        }
        ul li a{
            text-decoration: none;
        }
    </style>





</head>

<body>


<div class="general">
    <h2>School Sys</h2>
</div>
<div class="forms" style="text-align: center">


    <ul>
        <li>
            <a href="/school/login">School login</a>
        </li>
        <li>
            <a href="/student/login">Student login</a>
        </li>
        <li>
            <a href="/teacher/login">Teacher login</a>
        </li>

    </ul>
</div>



</body>

</html>

