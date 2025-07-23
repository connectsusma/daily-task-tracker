<!DOCTYPE html>
<html>
<head>
    <title>Task Report PDF</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #008453;
            padding-bottom: 10px;
        }

        .header .logo {
            max-height: 60px;
        }

        .header .company-details {
            text-align: right;
        }

        .company-name {
            font-size: 20px;
            color: #008453;
            font-weight: bold;
        }

        .department {
            font-size: 14px;
            color: #ff9e2f;
        }

        .report-meta {
            margin-bottom: 20px;
        }

        .report-meta span {
            display: inline-block;
            margin-right: 30px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #008453;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #ff9e2f;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef6f2;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="company-details">
            <div class="company-name">Laxmi Laghubitta Bittya Sanstha Limited</div>
            <div class="department">IT Department</div>
        </div>
    </div>

    <h1>Daily Task Report</h1>

    <div class="report-meta">
        <span>Name of Staff:Susmasagar Bhattarai </span>
    </div>

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
