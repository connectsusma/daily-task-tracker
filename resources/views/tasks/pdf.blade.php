<!DOCTYPE html>
<html>
<head>
    <title>Task Report PDF</title>
    <style>
        @page {
            size: A4 landscape; /* Force landscape A4 */
            margin: 20mm;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #568b2a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #ff9e2f;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e8f0fe;
        }
    </style>
</head>
<body>
    <h1>Task Report - {{ $date }}</h1>
    <table>
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Branch</th>
                <th>Staff</th>
                <th>Summary</th>
                <th>Status</th>
                <th>Handed Over</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->branch }}</td>
                    <td>{{ $task->staff }}</td>
                    <td>{{ $task->summary }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->handed_over }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
