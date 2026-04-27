<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            direction: ltr;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px 8px;
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
            font-size: 18px;
        }
        p {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <h2>Tasks Report</h2>
   <!-- <h2>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</h2> -->
    <p>Period: {{ $start_id }} to {{ $end_id}}</p>
    <p>Employee: {{ $user ? $user->name : 'All Employees' }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <!-- <th>Created At</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $index => $task)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $task->user->name }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->created_at->format('Y-m-d') }}</td>
                <!-- <td>{{ $task->start_date }} to {{ $task->end_date }}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
