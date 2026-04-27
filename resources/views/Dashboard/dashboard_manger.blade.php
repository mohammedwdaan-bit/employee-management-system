@extends('Dashboard.Header')



@section('mm')



            <!-- المحتوى -->
            <div class="content">
                <!-- إحصائيات -->
                <div class="stats">
                    <div class="stat-card stat-1">
                        <div class="stat-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{count($task_pending)+count($task_in_progress)+count($task_completed)}}</h3>
                            <p>{{ trans('dashboard_trans.All_Tasks') }}</p>
                        </div>
                    </div>
                    <div class="stat-card stat-2">
                        <div class="stat-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>8</h3>
                            <p>{{ trans('dashboard_trans.Complex_Tasks') }} </p>
                        </div>
                    </div>
                    <div class="stat-card stat-3">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>24</h3>
                            <p>{{ trans('dashboard_trans.Completed_Tasks') }} </p>
                        </div>
                    </div>
                    <div class="stat-card stat-4">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>12</h3>
                            <p>{{ trans('dashboard_trans.Employees') }}</p>
                        </div>
                    </div>
                </div>

                <!-- أعمدة المهام -->
                <div class="columns">
                    <!-- المهام الجديدة -->
                    <div class="column column-1" data-status="pending">
                        <div class="column-header">
                            <div class="column-title">
                                <i class="fas fa-plus-circle"></i>
                                {{ trans('dashboard_trans.New_Tasks') }}
                                <div class="task-count">{{count($task_pending)}}</div>
                            </div>
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="tasks">
                            @foreach ($task_pending as $task )

                                        <!-- <div class="task-card" data-id="1"> -->
                                        <div class="task-card" data-id="{{ $task->id }}" data-start="{{ $task->start_date }}" data-end="{{ $task->end_date }}" data-priority="{{ $task->priority }}" data-status="pending">
                                            <div class="task-header2">
                                                <div class="date-item2">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ trans('user_trans.from') }}: {{ $task->start_date }}
                                                </div>
                                                <div class="date-item2">
                                                    <i class="fas fa-calendar-check"></i>
                                                    {{ trans('user_trans.to') }}: {{ $task->end_date }}
                                                </div>
                                                <div class="task-priority low">
                                                    <i class="fas fa-circle"></i>
                                                    {{ $task->priority }}
                                                </div>
                                            </div>
                                            <h3 class="task-title">{{ $task->title }}</h3>
                                            <p class="task-description">{{ $task->description }}</p>
                                            <div class="task-footer">
                                                <div class="task-assignee">
                                                    <div class="assignee-avatar">ع</div>
                                                    <div class="assignee-info">
                                                        <h4>{{$task->user->name}}</h4>
                                                        <p>مطور واجهات</p>
                                                    </div>
                                                </div>
                                                <div class="task-dates">
                                                    <div class="task-date"><i class="far fa-calendar"></i> {{ date('Y-m-d', strtotime($task->created_at)) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                
                                
                            @endforeach
                        </div>

                    </div>
                    
                    <!-- قيد التنفيذ -->
                    <div class="column column-2" data-status="in_progress">
                        <div class="column-header">
                            <div class="column-title">
                                <i class="fas fa-sync-alt"></i>
                                {{ trans('dashboard_trans.In_Progress') }} 
                                <div class="task-count">3</div>
                            </div>
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="tasks">  
                            @foreach ($task_in_progress as $task )

                                    <div class="task-card" data-id="{{ $task->id }}"data-start="{{ $task->start_date }}" data-end="{{ $task->end_date }}" data-priority="{{ $task->priority }}" data-status="pending">
                                            <div class="task-header2">
                                                <div class="date-item2">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ trans('user_trans.from') }}: {{ $task->start_date }}
                                                </div>
                                                <div class="date-item2">
                                                    <i class="fas fa-calendar-check"></i>
                                                    {{ trans('user_trans.to') }}: {{ $task->end_date }}
                                                </div>
                                                <div class="task-priority low">
                                                    <i class="fas fa-circle"></i>
                                                    {{ $task->priority }}
                                                </div>
                                            </div>
                                        <h3 class="task-title">{{ $task->title }}</h3>
                                        <p class="task-description">{{ $task->description }}</p>
                                        <div class="task-footer">
                                            <div class="task-assignee">
                                                <div class="assignee-avatar">ن</div>
                                                <div class="assignee-info">
                                                    <h4>{{ $task->user->name }}</h4>
                                                    <p>مهندسة أمن</p>
                                                </div>
                                            </div>
                                            <div class="task-dates">
                                                <div class="task-date"><i class="far fa-calendar"></i>{{ date('Y-m-d', strtotime($task->created_at)) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                
                            @endforeach              

                        </div>
                    </div>
                    
                    <!-- المكتملة -->
                    <div class="column column-3" data-status="completed">
                        <div class="column-header">
                            <div class="column-title">
                                <i class="fas fa-check-circle"></i>
                                {{ trans('dashboard_trans.Completed') }}
                                <div class="task-count">7</div>
                            </div>
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                        <div class="tasks">
                            @foreach ($task_completed as $task )

                                    <div class="task-card" data-id="{{ $task->id }}"data-start="{{ $task->start_date }}" data-end="{{ $task->end_date }}" data-priority="{{ $task->priority }}" data-status="pending">
                                            <div class="task-header2">
                                                <div class="date-item2">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ trans('user_trans.from') }}: {{ $task->start_date }}
                                                </div>
                                                <div class="date-item2">
                                                    <i class="fas fa-calendar-check"></i>
                                                    {{ trans('user_trans.to') }}: {{ $task->end_date }}
                                                </div>
                                                <div class="task-priority low">
                                                    <i class="fas fa-circle"></i>
                                                    {{ $task->priority }}
                                                </div>
                                            </div>
                                        <h3 class="task-title">{{ $task->title }}</h3>
                                        <p class="task-description">{{ $task->description }}</p>
                                        <div class="task-footer">
                                            <div class="task-assignee">
                                                <div class="assignee-avatar">م</div>
                                                <div class="assignee-info">
                                                    <h4>{{ $task->user->name }}</h4>
                                                    <p>مطور خلفية</p>
                                                </div>
                                            </div>
                                            <div class="task-dates">
                                                <div class="task-date"><i class="far fa-calendar"></i> {{date('Y-m-d', strtotime($task->created_at)) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                
                            @endforeach
                        
                        </div>
                    </div>
                </div>
                
                <!-- عرض جميع مهام القسم -->
                <div class="tasks-view" id="tasks-view">
                    <div class="tasks-view-header">
                        <h2 class="tasks-view-title" id="view-title">{{ trans('dashboard_trans.All_Tasks') }}</h2>
                        <div class="close-view" id="close-view">
                            <i class="fas fa-times"></i> {{ trans('dashboard_trans.Close') }}
                        </div>
                    </div>
                    <div class="tasks-container" id="tasks-container">
                        <!-- سيتم إضافة المهام هنا عبر الجافاسكريبت -->
                    </div>
                </div>
            </div>
       
        
        <!-- زر إضافة مهمة -->
        <div class="add-task-btn" id="add-task-btn">
            <i class="fas fa-plus"></i>
        </div>
 
    
    <!-- نموذج إضافة مهمة -->
    <div class="modal" id="task-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> {{ trans('dashboard_trans.Add_New_Task') }}</h3>
                <div class="close-modal" id="close-modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="task-form" action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="task-name">{{ trans('dashboard_trans.Task_Name') }}</label>
                        <input type="text" name="task_name" class="form-control" id="task_name" placeholder="{{ trans('dashboard_trans.Enter_Task_Name') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="task-details">{{ trans('dashboard_trans.Task_Details') }}</label>
                        <textarea class="form-control" name="task_details" id="task_details" placeholder="{{ trans('dashboard_trans.Enter_Task_Details') }}"></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <label for="start-date">{{ trans('dashboard_trans.Start_Date') }}</label>
                            <input type="date" name="start_date" class="form-control" id="start_date">
                        </div>
                        <div class="form-col">
                            <label for="end-date">{{ trans('dashboard_trans.End_Date') }}</label>
                            <input type="date" name="end_date" class="form-control" id="end_date">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="assigned-employee">{{ trans('dashboard_trans.Assigned_Employee') }}</label>
                        <select class="form-control" name="user_id" id="assigned-employee" required>
                            <option value="">{{ trans('dashboard_trans.Select_Employee') }}</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>


                        <div class="form-group">
                        <label >{{ trans('dashboard_trans.Status') }}</label>
                        <div class="status-options">
                            <div class="status-option pending" data-value="pending">
                               <i class="fas fa-plus-circle"></i>
                                <h4>pending</h4>
                                <p>{{ trans('dashboard_trans.Simple_Description') }}</p>
                            </div>
                            <div class="status-option in_progress"  data-value="in_progress">
                                <i class="fas fa-sync-alt"></i>
                                <h4>in_progress</h4>
                                <p> {{ trans('dashboard_trans.Medium_Description') }}</p>
                            </div>
                            <div class="status-option completed" data-value="completed">
                                <i class="fas fa-check-circle"></i>
                                <h4>completed</h4>
                                <p>{{ trans('dashboard_trans.Complex_Description') }} </p>
                            </div>
                        </div>
                        <input type="hidden" name="status" id="status" value="pending">
                        <!-- <input type="hidden" name="task-status" id="task-status" > -->
                    </div>



                    
                    <div class="form-group">
                        <label>{{ trans('dashboard_trans.Priority') }}</label>
                        <div class="complexity-options">
                            <div class="complexity-option normal" data-value="low">
                                <i class="fas fa-check-circle"></i>
                                <h4>{{ trans('dashboard_trans.Low') }}</h4>
                                <p>{{ trans('dashboard_trans.Simple_Description') }}</p>
                            </div>
                            <div class="complexity-option medium" data-value="medium">
                                <i class="fas fa-exclamation-circle"></i>
                                <h4>{{ trans('dashboard_trans.Medium') }}</h4>
                                <p> {{ trans('dashboard_trans.Medium_Description') }}</p>
                            </div>
                            <div class="complexity-option complex" data-value="high">
                                <i class="fas fa-exclamation-triangle"></i>
                                <h4>{{ trans('dashboard_trans.Complex') }}</h4>
                                <p>{{ trans('dashboard_trans.Complex_Description') }} </p>
                            </div>
                        </div>
                        <input type="hidden" name="complexity" id="complexity" value="normal">
                        <!-- <input type="hidden" name="complexityInput" id="complexityInput" value="normal"> -->
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-block" id="add-task">
                         {{ trans('dashboard_trans.Add_Task_Button') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    
<!-- عرض تفاصيل المهمة -->
<div class="modal" id="task-detail-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="task-detail-title">{{ trans('dashboard_trans.Task_Details_Title') }}</h3>
            <div class="close-modal" id="close-detail-modal">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="modal-body">
            <!-- بداية النموذج -->
            <form id="task-edit-form" method="POST" action="#">
                @csrf
                @method('PUT')
                
                <!-- إضافة حقل مخفي لحفظ ID المهمة -->
                <input type="hidden" name="id" id="detail-task-id-input">
                
                <div class="task-detail-container">
                    <div class="task-detail-header">
                        <div class="task-detail-section">
                            <h3>{{ trans('dashboard_trans.Task_Name') }}</h3>
                            <input type="text" name="title" id="detail-task-title-input" class="form-control2">
                        </div>
                        <!-- <div class="task-id-display">
                            <span>ID:</span>
                            <span id="detail-task-id-display"></span>
                        </div> -->
                        <!-- <div class="task-tag">
                            <input type="text" name="tag" id="detail-task-tag" class="form-control">
                        </div> -->
                    </div>
                    
                    <div class="task-detail-body">
                        <div class="task-detail-section">
                            <h3>{{ trans('dashboard_trans.Task_Details_Title') }}</h3>
                            <div class="task-detail-content">
                                <textarea name="description" id="detail-task-description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        
                        <div class="detail-grid">
                            <div class="detail-item">
                                <h4>{{ trans('dashboard_trans.Status') }}</h4>
                                <select name="status" id="detail-task-status" class="form-control">
                                    <option value="pending">{{ trans('dashboard_trans.New_Tasks') }}</option>
                                    <option value="in_progress">{{ trans('dashboard_trans.In_Progress') }}</option>
                                    <option value="completed">{{ trans('dashboard_trans.Completed') }}</option>
                                </select>
                            </div>
                            <div class="detail-item">
                                <h4>{{ trans('dashboard_trans.Priority') }}</h4>
                                <select name="priority" id="detail-task-priority" class="form-control">
                                    <option value="low">{{ trans('dashboard_trans.Low') }}</option>
                                    <option value="medium">{{ trans('dashboard_trans.Medium') }}</option>
                                    <option value="high">{{ trans('dashboard_trans.High') }}</option>
                                </select>
                            </div>
                            <div class="detail-item">
                                <h4>{{ trans('dashboard_trans.Complexity') }}</h4>
                                <select name="complexity" id="detail-task-complexity" class="form-control">
                                    <option value="simple">{{ trans('dashboard_trans.Simple') }}</option>
                                    <option value="medium">{{ trans('dashboard_trans.Medium') }}</option>
                                    <option value="complex">{{ trans('dashboard_trans.Complex') }}</option>
                                </select>
                            </div>


                                    <div class="detail-item">
                                        <label>{{ trans('dashboard_trans.Assignee') }}</label>
                                        <select name="assignee" id="detail-task-assignee" class="form-control" required>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                               
                           
                            <div class="detail-item">
                                <h4>{{ trans('dashboard_trans.Task_Start_Date') }}</h4>
                                <input type="date" name="start_date" id="detail-start-date" class="form-control">
                            </div>
                            <div class="detail-item">
                                <h4>{{ trans('dashboard_trans.Task_End_Date') }}</h4>
                                <input type="date" name="end_date" id="detail-end-date" class="form-control">
                            </div>
                        </div>
                        
                        <div class="task-detail-section">
                            <h3>{{ trans('dashboard_trans.Progress') }}</h3>
                            <div class="task-detail-content">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <div style="flex: 1; height: 12px; background: #e0e0e0; border-radius: 6px; overflow: hidden;">
                                        <div id="progress-bar" style="height: 100%; width: 65%; background: var(--primary); border-radius: 6px;"></div>
                                    </div>
                                    <input type="hidden" name="progress" id="progress-input" value="65">
                                    <div id="progress-percent">65%</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="task-detail-section">
                            <h3>{{ trans('dashboard_trans.Notes') }}</h3>
                            <div class="task-detail-content">
                                <textarea name="notes" class="form-control" rows="3">يجب التأكد من توافق جميع الحزم مع أحدث إصدار من لارافيل
تثبيت حزم المراقبة والأمان قبل الانتقال للمرحلة التالية</textarea>
                            </div>
                        </div> -->
                    </div>
                </div>
                
                <div class="form-actions" style="margin-top: 20px; text-align: center;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save_Changes
                    </button>
                    <button type="button" id="cancel-edit-btn" class="btn btn-secondary">
                        Cancel
                    </button>
                </div>
            </form>
            <!-- نهاية النموذج -->
        </div>
    </div>
</div>



<script src="{{ asset('build/dashboard/mm.js') }}"></script>






@endsection