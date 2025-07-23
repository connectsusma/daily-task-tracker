<!DOCTYPE html>
<html>
<head>
    <title>Daily Task Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
    <h1>📊 Task Report</h1>
    <div class="text-center mt-4">
    <a href="/" class="btn btn-lg btn-outline-primary">
        ⬅️ Return to Homepage
    </a>
</div>

    
    <form method="GET" action="/report" class="mb-3">
        <label for="date">Select Date:</label>
        <input type="date" name="date" value="{{ $date }}" class="form-control" style="max-width: 250px;">
        <button type="submit" class="btn btn-primary mt-2">Load Report</button>
    </form>

    <a href="/export-pdf/{{ $date }}" class="btn btn-danger mb-3">Export Report PDF</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
</div>
</body>
</html>
