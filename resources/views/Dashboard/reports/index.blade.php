<!-- resources/views/reports/tasks/index.blade.php -->
@extends('Dashboard.Header')

@section('mm')



 <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
            color: #333;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        } */
        
        /* .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        } */
        
        /* header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
            padding: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        } */
        
        header h1 {
            font-size:30px;
            margin-bottom: 10px;
        }
        
        header p {
            font-size:20px;
            opacity: 0.9;
        }
        
        .filter-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-bottom: 40px;
        }
        
        .filter-card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1a2a6c;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 1.1rem;
        }
        
        .form-control {
            width: 90%;
            padding: 14px 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            background: #f8f9fa;
        }
        
        .form-control:focus {
            border-color: #1a2a6c;
            box-shadow: 0 0 0 3px rgba(26, 42, 108, 0.2);
            outline: none;
            background: white;
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px 12px;
            padding-right: 40px;
        }
        
        .btn-filter {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 35px;
            margin-left: 25%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-filter:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            background: linear-gradient(135deg, #b21f1f, #1a2a6c);
        }
        
        .btn-filter:active {
            transform: translateY(0);
        }
        
        .results-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            overflow-x: auto;
        }
        
        .results-section h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1a2a6c;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }
        
        th, td {
            padding: 16px 20px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }
        
        th {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.2s;
        }
        
        .no-results {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-size: 1.2rem;
        }
        
        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .filter-form {
                grid-template-columns: 1fr;
            }
            
            header h1 {
                font-size: 2.2rem;
            }
            
            .stats {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>

<body>
    <div class="container">
        <!-- <header>
            <h1><i class="fas fa-filter"></i> نظام الفلترة المتقدم</h1>
            <p>تصفية البيانات حسب الاسم والفترة الزمنية المحددة</p>
        </header> -->
        
        <div class="filter-card">
            <h2><i class="fas fa-sliders-h"></i>Detailed reports</h2>
            <form class="filter-form" action="{{ route('tasks.report') }}" method="post" target="_blank">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Choose the name:</label>
                    <select class="form-control" name="IdName" id="name">
                        <option value="All">All</option>
                        @foreach ($users as $user )
                                <option value="{{$user->id}}">{{ $user->name }}</option>              
                        @endforeach

                    </select>
                </div>
                
                <div class="form-group">
                    <label for="fromDate"><i class="fas fa-calendar-alt"></i> From the date:</label>
                    <input name="star_id" type="date" class="form-control" id="fromDate">
                </div>
                
                <div class="form-group">
                    <label for="toDate"><i class="fas fa-calendar-alt"></i> To date:</label>
                    <input name="end_id" type="date" class="form-control" id="toDate">
                </div>

                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Choose the status:</label>
                    <select class="form-control" name="status" id="status">
                        <option value="All">All</option>
                        <option value="pending">pending</option>
                        <option value="in_progress">in_progress</option>
                        <option value="completed">completed</option>

                    </select>
                </div>

                
                <div class="form-group">
                    <button type="submit" class="btn-filter" id="filterBtn">
                        <i class="fas fa-filter"></i> print report
                    </button>
                </div>
            </form>
        </div>
        
    </div>

    <script>

        function openReport() {
            let idName = document.getElementById('employee').value;
            let dateFrom = document.getElementById('date_from').value;
            let dateTo = document.getElementById('date_to').value;

            let url = `/tasks-report?IdName=${idName}&date_from=${dateFrom}&date_to=${dateTo}`;
            window.open(url, '_blank');
        }







        document.addEventListener('DOMContentLoaded', function() {
            const filterBtn = document.getElementById('filterBtn');
            const resultsTable = document.getElementById('resultsTable');
            const noResults = document.getElementById('noResults');
            const totalResults = document.getElementById('totalResults');
            const dateRange = document.getElementById('dateRange');
            const selectedName = document.getElementById('selectedName');
            
            // Sample data
            const data = [
                { id: 1, name: "أحمد محمد", email: "ahmed@example.com", department: "المبيعات", date: "2023-10-15", status: "نشط" },
                { id: 2, name: "فاطمة علي", email: "fatima@example.com", department: "التسويق", date: "2023-10-18", status: "نشط" },
                { id: 3, name: "علي حسن", email: "ali@example.com", department: "الدعم الفني", date: "2023-10-20", status: "غير نشط" },
                { id: 4, name: "سارة عبد الله", email: "sara@example.com", department: "التطوير", date: "2023-10-22", status: "نشط" },
                { id: 5, name: "محمد خالد", email: "mohammed@example.com", department: "المبيعات", date: "2023-10-25", status: "نشط" },
                { id: 6, name: "نورة سعيد", email: "nora@example.com", department: "التسويق", date: "2023-10-28", status: "غير نشط" },
                { id: 7, name: "خالد عمر", email: "khalid@example.com", department: "التطوير", date: "2023-11-01", status: "نشط" },
                { id: 8, name: "ليلى عبد الرحمن", email: "laila@example.com", department: "الدعم الفني", date: "2023-11-05", status: "نشط" }
            ];
            
            // Set today's date as default "to" date
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('toDate').value = today;
            
            // Set 30 days ago as default "from" date
            const thirtyDaysAgo = new Date();
            thirtyDaysAgo.setDate(thirtyDaysAgo.getDate() - 30);
            document.getElementById('fromDate').value = thirtyDaysAgo.toISOString().split('T')[0];
            
            filterBtn.addEventListener('click', function() {
                const nameFilter = document.getElementById('name').value;
                const fromDate = document.getElementById('fromDate').value;
                const toDate = document.getElementById('toDate').value;
                
                // Filter data
                const filteredData = data.filter(item => {
                    const matchesName = nameFilter === '' || item.name.toLowerCase().includes(nameFilter);
                    const matchesDate = (!fromDate || item.date >= fromDate) && (!toDate || item.date <= toDate);
                    return matchesName && matchesDate;
                });
                
                // Update results display
                displayResults(filteredData);
                
                // Update stats
                totalResults.textContent = filteredData.length;
                dateRange.textContent = fromDate && toDate ? `${fromDate} إلى ${toDate}` : 'غير محدد';
                selectedName.textContent = nameFilter ? document.getElementById('name').options[document.getElementById('name').selectedIndex].text : 'جميع الأسماء';
            });
            
            function displayResults(data) {
                if (data.length === 0) {
                    resultsTable.innerHTML = '';
                    noResults.style.display = 'block';
                    return;
                }
                
                noResults.style.display = 'none';
                
                let tableHTML = '';
                data.forEach(item => {
                    tableHTML += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.email}</td>
                            <td>${item.department}</td>
                            <td>${item.date}</td>
                            <td><span class="status ${item.status === 'نشط' ? 'active' : 'inactive'}">${item.status}</span></td>
                        </tr>
                    `;
                });
                
                resultsTable.innerHTML = tableHTML;
                
                // Add styling to status cells
                document.querySelectorAll('.status').forEach(status => {
                    if (status.textContent === 'نشط') {
                        status.style.backgroundColor = '#d4edda';
                        status.style.color = '#155724';
                    } else {
                        status.style.backgroundColor = '#f8d7da';
                        status.style.color = '#721c24';
                    }
                    status.style.padding = '5px 10px';
                    status.style.borderRadius = '20px';
                    status.style.fontWeight = '500';
                    status.style.display = 'inline-block';
                });
            }
            
            // Initial filter on page load
            // filterBtn.click();
        });
    </script>
</body>




@endsection






