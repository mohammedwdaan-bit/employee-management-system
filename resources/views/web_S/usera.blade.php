<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
         <!-- ربط ملف CSS -->
        @if (App::getLocale()=='ar')

    <link rel="stylesheet" href="{{ asset('build/web_S/mm_ar.css') }}">
    
    @else
    <link rel="stylesheet" href="{{ asset('build/web_S/mm.css') }}">
        
    @endif
</head>
<body>
    <div class="container">
    <header>
        
        <div class="logo">
            <i class="fas fa-project-diagram"></i>
            <h1>{{ trans('user_trans.Project_Management') }}</h1>
        </div>
        
        <div class="search-box">
            <input type="text" placeholder="{{ trans('user_trans.Search_tasks') }}">
            <i class="fas fa-search"></i>
        </div>

                  {{-- شريط اختيار اللغة --}}
    <div style="text-align: center; margin: 20px;">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a 
                rel="alternate" 
                hreflang="{{ $localeCode }}" 
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                style="margin: 0 10px; text-decoration: none; font-weight: bold;"
            >
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div>

        
        <div class="profile-container" id="profileContainer">
            <div class="profile-toggle">
                <div class="user-avatar">AC</div>
                <div class="user-name">{{ Auth::user()->name }}</div>
                <i class="fas fa-chevron-down"></i>
            </div>
            
            <div class="dropdown-menu">
                <div class="profile-header">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                    <!-- <div class="member-badge">Offline 783</div>
                    <div class="ratings">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>73</span>
                    </div> -->
                </div>
                
                <div class="dropdown-content">
                    <div class="menu-item" id="profileItem">
                        <i class="fas fa-user"></i>
     
                        <div {{-- {{ request()->routeIs('profile.edit') ? 'active' : '' }}  onclick="window.location.href='{{ route('profile.edit') }}'"--}}>
                            <h3>{{trans('user_trans.Profile')}}</h3>
                            <p>{{trans('user_trans.Edit_Profile')}}</p>
                        </div>
                    </div>
                    
                    <!-- <div class="menu-item" id="itSoldItem">
                        <i class="fas fa-chart-line"></i>
                        <div>
                            <h3>IT SOLD</h3>
                            <p>at week</p>
                        </div>
                        <div class="stats-value">0.50</div>
                    </div>
                    
                    <div class="menu-item" id="messagesItem">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Index</h3>
                            <p>Messages</p>
                        </div>
                    </div> -->
                    
                    <div class="menu-item" id="settingsItem">
                        <i class="fas fa-cog"></i>
                        <div>
                            <h3>{{trans('user_trans.Account_Settings')}}</h3>
                        </div>
                    </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    
                    <div class="menu-item" id="languageMenu" style="cursor: pointer; position: relative;">
                    <i class="fas fa-globe"></i>
                    <div>
                        <h3>{{ LaravelLocalization::getCurrentLocaleName() }}</h3>
                        <p>تغيير اللغة</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>

                    <!-- Dropdown -->
                    <div class="language-dropdown" style="position: absolute; top: 100%; right: 0; background: white; border: 1px solid #ccc; border-radius: 8px; display: none; z-index: 1000;">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="language-option" style="display: block; padding: 10px 15px; color: #333; text-decoration: none;">
                                <i class="fas fa-flag"></i> {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const languageMenu = document.getElementById('languageMenu');
                        const dropdown = languageMenu.querySelector('.language-dropdown');

                        languageMenu.addEventListener('click', function () {
                            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                        });

                        document.addEventListener('click', function (e) {
                            if (!languageMenu.contains(e.target)) {
                                dropdown.style.display = 'none';
                            }
                        });
                    });
                </script>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////                     -->
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="menu-item" id="signOutItem">
                        <i class="fas fa-sign-out-alt sign-out"></i>
                        <div>
                           <a href="#" style="text-decoration: none;"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <h3>{{trans('user_trans.Sign_Out')}}</h3>
                            </a> 
                        </div>
                        <!-- <i class="fas fa-chevron-right sign-out"></i> -->
                    </div>
                </form>


                </div>
            </div>
        </div>


        
    </header>

            <div class="stats">
            <div class="stat-card">
                <div class="stat-number">{{count($task_pending)+count($task_in_progress)+count($task_completed)}}</div>
                <div class="stat-label">{{trans('user_trans.Total_Tasks')}}</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{count($task_pending)}}</div>
                <div class="stat-label">{{trans('user_trans.New_Tasks')}}</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{count($task_in_progress)}}</div>
                <div class="stat-label">{{trans('user_trans.In_Progress')}}</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{count($task_completed)}}</div>
                <div class="stat-label">{{trans('user_trans.Completed')}}</div>
            </div>
        </div>

        

        <div class="board">
            <!-- New Tasks Column -->
        <div class="column new-tasks">
                <div class="column-header">
                    <div class="column-title">
                        <i class="fas fa-plus-circle"></i>
                        {{trans('user_trans.New_Tasks')}}
                    </div>
                    <div class="task-count">{{count($task_pending)}} {{trans('user_trans.tasks')}}</div>
                </div>
            
                <div class="task-list">
                @foreach ($task_pending as $task )
                    <div class="task">
                        <span class="priority high"></span>
                        <div class="task-header">
                            <div class="task-title">
                                <i class="fas fa-tasks "></i>
                                {{$task->title}}
                            </div>
                            <i class="fas fa-eye eye-icon" onclick="toggleDetails(this)"></i>
                        </div>
                        <!-- <div class="task-content fw-bold">
                            الإعداد الأولي للمشروع وتهيئة البيئة
                        </div> -->
                        <div class="task-dates">
                            <div class="date-item">
                                <i class="fas fa-calendar-alt"></i>
                                {{trans('user_trans.from')}} : {{ $task->start_date }}
                            </div>
                            <div class="date-item">
                                <i class="fas fa-calendar-check"></i>
                                {{trans('user_trans.to')}} : {{ $task->end_date }}
                            </div>
                            <div class="date-item">
                                <i class="fas fa-upload"></i>
                                {{ date('Y-m-d', strtotime($task->created_at)) }}
                               
                            </div>
                        </div>
                        <div class="task-tags">
                            <div class="tag admin">{{$task->priority}}</div>
                        </div>  

                    <form id="statusForm-{{ $task->id }}" method="post" action="{{ route('status.update', $task->id) }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <div class="task-details">
                            <h3>{{ trans('user_trans.Task_Details') }}:</h3>
                            <p>{{ $task->description }}</p>
                            
                            <h4>{{ trans('user_trans.Change_task_status:') }}</h4>
                            
                            <div class="status-controls">
                                <button type="button" class="status-btn pending active" 
                                        onclick="changeStatus('pending', '{{ $task->id }}')">
                                    <i class="fas fa-clock"></i>
                                    {{ trans('user_trans.New_Tasks') }}
                                </button>
                                <button type="button" class="status-btn in-progress" 
                                        onclick="changeStatus('in-progress', '{{ $task->id }}')">
                                    <i class="fas fa-spinner"></i>
                                    {{ trans('user_trans.In_Progress') }}
                                </button>
                                <button type="button" class="status-btn completed" 
                                        onclick="changeStatus('completed', '{{ $task->id }}')">
                                    <i class="fas fa-check-circle"></i>
                                    {{ trans('user_trans.Completed') }}
                                </button>
                            </div>

                            <div class="status-checkbox">
                                <div class="status-option selected" 
                                    onclick="changeStatus('pending', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.New_Tasks') }}</span>
                                    <input type="radio" name="status" value="pending" checked>
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="status-option" 
                                    onclick="changeStatus('in-progress', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.In_Progress') }}</span>
                                    <input type="radio" name="status" value="in_progress">
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="status-option" 
                                    onclick="changeStatus('completed', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.Completed') }}</span>
                                    <input type="radio" name="status" value="completed">
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                            </div>
                            
                            <!-- زر التعديل الجديد -->
                            <button type="submit" class="edit-btn" >
                                <i class="fas fa-edit"></i>
                                {{ trans('user_trans.Modify_task_status') }}
                            </button>
                        </div>
                    </form>
                         
                <!-- <form id="statusForm-{{ $task->id }}" method="post" action="{{ route('status.update', $task->id) }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">

                    <div class="task-details">
                        <h3>{{ trans('user_trans.Task_Details') }}:</h3>
                        <p>{{ $task->description }}</p>
                        
                        <h4>{{ trans('user_trans.Change_task_status:') }}</h4>
                        
                        <div class="status-controls">
                            <button type="button" class="status-btn pending active" 
                                    onclick="updateStatus('pending', '{{ $task->id }}')">
                                <i class="fas fa-clock"></i>
                                {{ trans('user_trans.New_Tasks') }}
                            </button>
                            <button type="button" class="status-btn in-progress" 
                                    onclick="updateStatus('in-progress', '{{ $task->id }}')">
                                <i class="fas fa-spinner"></i>
                                {{ trans('user_trans.In_Progress') }}
                            </button>
                            <button type="button" class="status-btn completed" 
                                    onclick="updateStatus('completed', '{{ $task->id }}')">
                                <i class="fas fa-check-circle"></i>
                                {{ trans('user_trans.Completed') }}
                            </button>
                        </div>

                        <div class="status-checkbox">
                            <div class="status-option selected" 
                                onclick="updateStatus('pending', '{{ $task->id }}')">
                                <span class="status-indicator"></span>
                                <span class="status-label">{{ trans('user_trans.New_Tasks') }}</span>
                                <input type="radio" name="status" value="pending" checked>
                                <span class="check-icon"><i class="fas fa-check"></i></span>
                            </div>
                            <div class="status-option" 
                                onclick="updateStatus('in-progress', '{{ $task->id }}')">
                                <span class="status-indicator"></span>
                                <span class="status-label">{{ trans('user_trans.In_Progress') }}</span>
                                <input type="radio" name="status" value="in_progress">
                                <span class="check-icon"><i class="fas fa-check"></i></span>
                            </div>
                            <div class="status-option" 
                                onclick="updateStatus('completed', '{{ $task->id }}')">
                                <span class="status-indicator"></span>
                                <span class="status-label">{{ trans('user_trans.Completed') }}</span>
                                <input type="radio" name="status" value="completed">
                                <span class="check-icon"><i class="fas fa-check"></i></span>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                function updateStatus(status, taskId) {
                    // 1. تحديث الواجهة البصرية أولاً
                    const form = document.getElementById(`statusForm-${taskId}`);
                    
                    // تحديث الأزرار
                    const buttons = form.querySelectorAll('.status-btn');
                    buttons.forEach(btn => btn.classList.remove('active'));
                    
                    const buttonStatusMap = {
                        'pending': 'pending',
                        'in-progress': 'in-progress',
                        'completed': 'completed'
                    };
                    
                    if (buttonStatusMap[status]) {
                        form.querySelector(`.status-btn.${buttonStatusMap[status]}`).classList.add('active');
                    }
                    
                    // تحديث خيارات الراديو
                    const statusValueMap = {
                        'pending': 'pending',
                        'in-progress': 'in_progress',
                        'completed': 'completed'
                    };
                    
                    const newValue = statusValueMap[status] || status;
                    const radio = form.querySelector(`input[type="radio"][value="${newValue}"]`);
                    
                    if (radio) {
                        radio.checked = true;
                        
                        // تحديث المظهر البصري
                        const options = form.querySelectorAll('.status-option');
                        options.forEach(option => option.classList.remove('selected'));
                        radio.closest('.status-option').classList.add('selected');
                    }
                    
                    // 2. إرسال النموذج تلقائياً
                    setTimeout(() => {
                        // إظهار رسالة تحميل (اختياري)
                        const taskElement = document.querySelector(`#statusForm-${taskId}`).closest('.task');
                        taskElement.classList.add('updating');
                        
                        // إرسال النموذج
                        form.submit();
                    }, 300); // تأخير بسيط لتحسين تجربة المستخدم
                }
                </script> -->

                    </div>
                @endforeach                 
                    <!-- <div class="task">
                        <div class="task-title">
                            <i class="fas fa-bug"></i>
                            Fix Session Login Issue
                        </div>
                        <div class="task-content">
                            Perbaiki session login 401 yang kecepetan
                        </div>
                        <div class="task-tags">
                            <div class="tag admin">admin</div>
                            <div class="tag api">API</div>
                        </div>
                    </div> -->
<!--                     
                    <div class="task">
                        <div class="task-title">
                            <i class="fas fa-bug"></i>
                            Fix 401 Error
                        </div>
                        <div class="task-content">
                            Perbaiki 401 yang kecepetan
                        </div>
                        <div class="task-tags">
                            <div class="tag admin">admin</div>
                            <div class="tag api">API</div>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task1">
                        <label for="task1">admin</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task2">
                        <label for="task2">API</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task3">
                        <label for="task3">PRE–TTRICJ</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task4">
                        <label for="task4">Agr 04</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task5">
                        <label for="task5">Install Filament Shield</label>
                    </div> -->
                </div>
                
                <!-- <button class="new-task-btn">
                    <i class="fas fa-plus"></i> Add New Task
                </button> -->
            </div>
          
            
            <!-- In Progress Column -->
        <div class="column in-progress">
                <div class="column-header">
                    <div class="column-title">
                        <i class="fas fa-sync-alt"></i>
                        {{trans('user_trans.In_Progress')}}
                    </div>
                    <div class="task-count">{{ count($task_in_progress) }} {{trans('user_trans.tasks')}}</div>
                </div>
                
                <div class="task-list">
                @foreach ($task_in_progress as $task )
                    <div class="task">
                        <span class="priority high"></span>
                        <div class="task-header">
                            <div class="task-title">
                                <i class="fas fa-code"></i>
                                {{$task->title}}
                            </div>
                            <i class="fas fa-eye eye-icon" onclick="toggleDetails(this)"></i>
                        </div>
                        <!-- <div class="task-content fw-bold">
                            الإعداد الأولي للمشروع وتهيئة البيئة
                        </div> -->
                        <div class="task-dates">
                            <div class="date-item">
                                <i class="fas fa-calendar-alt"></i>
                                {{trans('user_trans.from')}} : {{ $task->start_date }}
                            </div>
                            <div class="date-item">
                                <i class="fas fa-calendar-check"></i>
                                {{trans('user_trans.to')}} : {{ $task->end_date }}
                            </div>
                            <div class="date-item">
                                <i class="fas fa-upload"></i>
                                {{ date('Y-m-d', strtotime($task->created_at)) }}
                               
                            </div>
                        </div>
                        <div class="task-tags">
                            <div class="tag admin">{{$task->priority}}</div>
                        </div>

                    <form id="statusForm-{{ $task->id }}" method="post" action="{{ route('status.update', $task->id) }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <div class="task-details">
                            <h3>{{ trans('user_trans.Task_Details') }}:</h3>
                            <p>{{ $task->description }}</p>
                            
                            <h4>{{ trans('user_trans.Change_task_status:') }}</h4>
                            
                            <div class="status-controls">
                                <button type="button" class="status-btn pending active" 
                                        onclick="changeStatus('pending', '{{ $task->id }}')">
                                    <i class="fas fa-clock"></i>
                                    {{ trans('user_trans.New_Tasks') }}
                                </button>
                                <button type="button" class="status-btn in-progress" 
                                        onclick="changeStatus('in-progress', '{{ $task->id }}')">
                                    <i class="fas fa-spinner"></i>
                                    {{ trans('user_trans.In_Progress') }}
                                </button>
                                <button type="button" class="status-btn completed" 
                                        onclick="changeStatus('completed', '{{ $task->id }}')">
                                    <i class="fas fa-check-circle"></i>
                                    {{ trans('user_trans.Completed') }}
                                </button>
                            </div>

                            <div class="status-checkbox">
                                <div class="status-option selected" 
                                    onclick="changeStatus('pending', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.New_Tasks') }}</span>
                                    <input type="radio" name="status" value="pending" checked>
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="status-option" 
                                    onclick="changeStatus('in-progress', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.In_Progress') }}</span>
                                    <input type="radio" name="status" value="in_progress">
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="status-option" 
                                    onclick="changeStatus('completed', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.Completed') }}</span>
                                    <input type="radio" name="status" value="completed">
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                            </div>
                            
                            <!-- زر التعديل الجديد -->
                            <button type="submit" class="edit-btn" >
                                <i class="fas fa-edit"></i>
                                {{ trans('user_trans.Modify_task_status') }}
                            </button>
                        </div>
                    </form>
                    </div>
                @endforeach
                    
                     <!-- <div class="task">
                        <div class="task-title">
                            <i class="fas fa-code"></i>
                            API Development
                        </div>
                        <div class="task-content">
                            Buat API get Attendance by month and year
                        </div>
                    </div> -->
                    
                    <!-- <div class="divider"></div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task6" checked>
                        <label for="task6">admin</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task7">
                        <label for="task7">API</label>
                    </div> -->
                    
                    <!-- <div class="checkbox-container">
                        <input type="checkbox" id="task8">
                        <label for="task8">Agr 04</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task9">
                        <label for="task9">Install Filament Shield</label>
                    </div>
                    
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 45%"></div>
                    </div>
                    <div class="progress-text">45% Complete</div>-->
                </div> 
            </div>
          
            
            <!-- Completed Column -->
        <div class="column completed">
                <div class="column-header">
                    <div class="column-title">
                        <i class="fas fa-check-circle"></i>
                        {{trans('user_trans.Completed')}}
                    </div>
                    <div class="task-count">{{count($task_completed)}} {{trans('user_trans.tasks')}}</div>
                </div>
                
                <div class="task-list">
                @foreach ($task_completed as $task )
                    <div class="task">
                        <span class="priority high"></span>
                        <div class="task-header">
                            <div class="task-title">
                                <i class="fas fa-code"></i>
                                {{$task->title}}
                            </div>
                            <i class="fas fa-eye eye-icon" onclick="toggleDetails(this)"></i>
                        </div>
                        <!-- <div class="task-content fw-bold">
                            الإعداد الأولي للمشروع وتهيئة البيئة
                        </div> -->
                        <div class="task-dates">
                            <div class="date-item">
                                <i class="fas fa-calendar-alt"></i>
                                {{trans('user_trans.from')}} : {{ $task->start_date }}
                            </div>
                            <div class="date-item">
                                <i class="fas fa-calendar-check"></i>
                                {{trans('user_trans.to')}} : {{ $task->end_date }}
                            </div>
                            <div class="date-item">
                                <i class="fas fa-upload"></i>
                                {{ date('Y-m-d', strtotime($task->created_at)) }}
                               
                            </div>
                        </div>
                        <div class="task-tags">
                            <div class="tag admin">{{$task->priority}}</div>
                        </div>

                    <form id="statusForm-{{ $task->id }}" method="post" action="{{ route('status.update', $task->id) }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <div class="task-details">
                            <h3>{{ trans('user_trans.Task_Details') }}:</h3>
                            <p>{{ $task->description }}</p>
                            
                            <h4>{{ trans('user_trans.Change_task_status:') }}</h4>
                            
                            <div class="status-controls">
                                <button type="button" class="status-btn pending active" 
                                        onclick="changeStatus('pending', '{{ $task->id }}')">
                                    <i class="fas fa-clock"></i>
                                    {{ trans('user_trans.New_Tasks') }}
                                </button>
                                <button type="button" class="status-btn in-progress" 
                                        onclick="changeStatus('in-progress', '{{ $task->id }}')">
                                    <i class="fas fa-spinner"></i>
                                    {{ trans('user_trans.In_Progress') }}
                                </button>
                                <button type="button" class="status-btn completed" 
                                        onclick="changeStatus('completed', '{{ $task->id }}')">
                                    <i class="fas fa-check-circle"></i>
                                    {{ trans('user_trans.Completed') }}
                                </button>
                            </div>

                            <div class="status-checkbox">
                                <div class="status-option selected" 
                                    onclick="changeStatus('pending', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.New_Tasks') }}</span>
                                    <input type="radio" name="status" value="pending" checked>
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="status-option" 
                                    onclick="changeStatus('in-progress', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.In_Progress') }}</span>
                                    <input type="radio" name="status" value="in_progress">
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="status-option" 
                                    onclick="changeStatus('completed', '{{ $task->id }}')">
                                    <span class="status-indicator"></span>
                                    <span class="status-label">{{ trans('user_trans.Completed') }}</span>
                                    <input type="radio" name="status" value="completed">
                                    <span class="check-icon"><i class="fas fa-check"></i></span>
                                </div>
                            </div>
                            
                            <!-- زر التعديل الجديد -->
                            <button type="submit" class="edit-btn" >
                                <i class="fas fa-edit"></i>
                                {{ trans('user_trans.Modify_task_status') }}
                            </button>
                        </div>
                    </form>
                    </div>
                @endforeach
                    
                    <!-- <div class="task">
                        <div class="task-title">
                            <i class="fas fa-code-branch"></i>
                            API Development
                        </div>
                        <div class="task-content">
                            Memibuat API Get Jadwal Kerja
                        </div>
                        <div class="task-tags">
                            <div class="tag api">API</div>
                            <div class="tag agr">Agr 02</div>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task10" checked>
                        <label for="task10">admin</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task11" checked>
                        <label for="task11">API</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task12" checked>
                        <label for="task12">Agr 02</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task13" checked>
                        <label for="task13">Display ke Server</label>
                    </div>
                    
                    <div class="checkbox-container">
                        <input type="checkbox" id="task14" checked>
                        <label for="task14">Deploy ke server rps</label>
                    </div>
                    
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 100%"></div>
                    </div> -->
                    <div class="progress-text">100% Complete</div>
                </div>
                
                <!-- <button class="new-task-btn">
                    <i class="fas fa-plus"></i> Add New Task
                </button> -->
            </div>


        </div>
        

    </div>
    
     <script src="{{ asset('build/web_S/mm.js') }}"></script>

</body>

</html>