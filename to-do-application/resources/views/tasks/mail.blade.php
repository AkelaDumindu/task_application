<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Overdue Task Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        .content {
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Reminder: Overdue Task</h2>
        <p>Hi {{ $task->user->name }},</p>
        <div class="content">
            <p>You have an overdue task assigned to you:</p>
            <ul>
                <li><strong>Title:</strong> {{ $task->title }}</li>
                <li><strong>Due Date:</strong> {{ $task->duedate }}</li>
                <li><strong>Description:</strong> {{ $task->description }}</li>
            </ul>
            <p>Please take the necessary action as soon as possible.</p>
        </div>
        <div class="footer">
            <p>Thank you,<br>Your Task Management System</p>
        </div>
    </div>
</body>

</html>