<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daily Task Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #6366f1;
            --accent: #10b981;
            --bg-light: #f9fafb;
            --bg-dark: #111827;
            --text-light: #ffffff;
            --text-dark: #1f2937;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: #fff;
        }

        .table th {
            background-color: var(--primary);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        header {
            background: linear-gradient(to right, #0d6efd, #6610f2);
            color: white;
            padding: 30px 0;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        h1 {
            font-weight: 700;
        }

        .btn {
            border-radius: 30px;
        }

        .table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background-color: #0d6efd;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #eef2f7;
        }

        .modal-header {
            background: #0d6efd;
            color: white;
        }

        .modal-footer {
            border-top: none;
        }

        .icon-btn {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        body.dark {
            background-color: var(--bg-dark);
            color: var(--text-light);
        }

        body.dark .table {
            background: #1f2937;
            color: #e5e7eb;
        }

        body.dark .table th {
            background: var(--secondary);
        }

        body.dark header {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
        }

        body.dark .modal-content {
            background: #1f2937;
            color: #e5e7eb;
        }

        body.dark .form-control {
            background: #374151;
            color: #e5e7eb;
            border-color: #4b5563;
        }

        footer {
            font-size: 0.9rem;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container">
        <header>
            <h1><i class="bi bi-check2-square"></i> Daily Task Tracker</h1>
            <button id="theme-toggle" class="btn btn-sm btn-light mt-2">
                🌙 Toggle Dark/Light
            </button>

            <p class="mb-0">Track and manage daily tasks easily</p>
        </header>

        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h5>📅 Today: <strong>{{ $today }}</strong></h5>
            <div class="d-flex gap-2">
                <button class="btn btn-primary icon-btn" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                    <i class="bi bi-plus-circle"></i> Add Task
                </button>
                <a href="/report" class="btn btn-outline-primary icon-btn">
                    <i class="bi bi-graph-up"></i> Report
                </a>
                <a href="/export-pdf" class="btn btn-danger icon-btn">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover shadow-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task Name</th>
                        <th>Branch</th>
                        <th>Staff</th>
                        <th>Summary</th>
                        <th>Status</th>
                        <th>Handed Over</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->task_id }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->branch }}</td>
                            <td>{{ $task->staff }}</td>
                            <td>{{ $task->summary }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->handed_over }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No tasks added for today yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="/tasks" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Add New Task</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">Task Name</label>
                        <input name="name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Branch/Department</label>
                        <input name="branch" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Staff</label>
                        <input name="staff" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Summary</label>
                        <textarea name="summary" class="form-control" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Status</label>
                        <input name="status" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Handed Over (Optional)</label>
                        <input name="handed_over" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary icon-btn">
                        <i class="bi bi-save"></i> Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggle = document.getElementById('theme-toggle');
        toggle.addEventListener('click', () => {
            if (document.body.classList.contains('dark')) {
                document.body.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.body.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });

        // On load, apply saved theme
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
        }
    </script>
    <footer class="text-center py-3 mt-4 text-muted">
        &copy; {{ date('Y') }} YourCompanyName — All rights reserved.
    </footer>

</body>

</html>
