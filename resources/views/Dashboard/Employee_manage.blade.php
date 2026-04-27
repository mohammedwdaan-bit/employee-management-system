@extends('Dashboard.Header')



@section('mm')


    @if (App::getLocale()=='ar')

    <link rel="stylesheet" href="{{ asset('build/dashboard/mm.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('build/dashboard/mm_en.css') }}">
        
    @endif



            <!-- المحتوى -->
    <div class="content">



<body>
    <div class="container">
        
        <div class="controls">
            <div class="entries-control">
                <span>عرض</span>
                <select id="entries-select">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <span>سجلات</span>
            </div>
            
            <div class="search-box">
                <input type="text" id="search-input" placeholder="ابحث عن موظف...">
                <i class="fas fa-search"></i>
            </div>
            
            <button class="add-employee-btn" id="add-employee-btn">
                <i class="fas fa-plus-circle"></i> إضافة موظف جديد
            </button>
        </div>
        
        <div class="table-container">
            <table id="employee-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- <th>المدينة</th> -->
                        <th> Date of joining</th>
                        <th>Salary</th>
                        <th>#</th>
                    </tr>
                </thead>

            <tbody id="employee-table-body">
                @foreach ($Employee_manage as $index=>$Employee)

                    <tr>
                        <td>{{$index +1}}</td>
                        <td> {{$Employee->name}}</td>
                        <td>{{$Employee->email}}</td>
                        <!-- <td>كوريكو</td> -->
                        <td>{{ $Employee->	created_at }}</td>
                        <td>5000</td>
                        <td class="actions">
                          
                        <form action="{{ route('users.edit',$Employee->id) }}" method="Get">
                          
                          <!-- <input type="hidden" name="id" value="{{ $Employee->id }}"> -->
                          <button type="submit" style="background:none; border:none; padding:0; margin:0; cursor:pointer;">
                          <div class="action-btn edit-btn">
                              <i class="fas fa-edit"></i>
                          </div>
                          </button>
                        </form>



                            
                          <form class="delete-form" action="{{ route('users.delete') }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="id" value="{{ $Employee->id }}">
                            <button type="submit" style="background:none; border:none; padding:0; margin:0; cursor:pointer;">
                            <div class="action-btn delete-btn" data-id="1">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                            </button>
                          </td>
                        </form>
             
                @endforeach
            </tbody>
            </table>
            
            <div class="pagination">
                <div class="pagination-info" id="pagination-info">
                    عرض 1 إلى 10 من 100 سجلات
                </div>
                <div class="pagination-controls" id="pagination-controls">
                    <button class="pagination-btn disabled" id="prev-btn"><i class="fas fa-chevron-right"></i></button>
                    <button class="pagination-btn active" id="page-1">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">4</button>
                    <button class="pagination-btn">5</button>
                    <button class="pagination-btn" id="next-btn"><i class="fas fa-chevron-left"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- نموذج إضافة  -->
    <div class="modal" id="employee-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title">إضافة موظف جديد</h2>
                <button class="close-btn" id="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="employee-form" action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-groupp">
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" required placeholder="أدخل الاسم ">
                    </div>
                    <!-- <div class="form-groupp">
                        <label for="phone">رقم الهاتف *</label>
                        <input type="text" id="phone" required placeholder="أدخل رقم الهاتف">
                    </div> -->
                    <div class="form-groupp">
                        <label for="city">Email *</label>
                        <input type="text" name="email" id="email"  required placeholder=" البريد الالكتروني">
                    </div>
                    <div class="form-groupp">
                        <label for="city">password *</label>
                        <input type="password" name="password" id="password"  required placeholder="أدخل كلمه المرور">
                    </div>
                    <div class="form-groupp">
                        <label for="join-date">Date of joining *</label>
                        <input type="date" name="created_at" id="join-date" required>
                    </div>
                    <div class="form-groupp">
                        <label for="completion">Salary</label>
                        <input type="number" name="salary" id="completion" required placeholder="أدخل  المرتب">
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btnn btn-cancel" id="cancel-btn">إلغاء</button>
                        <button type="submit"  class="btnn btn-submit" id="submit-btn">إضافة موظف</button>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button class="btnn btn-cancel" id="cancel-btn">إلغاء</button>
                <button class="btnn btn-submit" id="submit-btn">إضافة موظف</button>
            </div> -->
        </div>
    </div>




<div class="modal" id="employee-modall" >
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modal-title">إضافة موظف</h2>
            <button class="close-btn" id="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="employee-form" action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-groupp">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-groupp">
                    <label for="city">Email *</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="form-groupp">
                    <label for="password">Password *</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-groupp">
                    <label for="join-date">Date of joining *</label>
                    <input type="date" name="created_at" id="join-date" required>
                </div>
                <div class="form-groupp">
                    <label for="completion">Salary</label>
                    <input type="number" name="salary" id="completion" required>
                </div>
                <div class="modal-footer">
                    <button class="btnn btn-cancel" id="cancel-btn">إلغاء</button>
                    <button type="submit" class="btnn btn-submit" id="submit-btn">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>



    <!-- الإشعارات -->
    <div class="notification" id="notification"></div>




  <script>
    const baseLocale = "{{ app()->getLocale() }}";
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            const employeeId = this.dataset.id;

            // جلب البيانات من السيرفر
            fetch(`/${baseLocale}/users/${employeeId}/edit`)
                .then(response => response.json())
                .then(data => {
                    // تعبئة بيانات الموظف
                    document.getElementById('name').value = data.name ?? '';
                    document.getElementById('email').value = data.email ?? '';
                    document.getElementById('completion').value = data.salary ?? '';
                    document.getElementById('join-date').value = data.created_at?.substring(0, 10) ?? '';

                    // إخفاء حقل الباسورد
                    const passwordGroup = document.getElementById('password').closest('.form-groupp');
                    if (passwordGroup) passwordGroup.style.display = 'none';

                    // تغيير عنوان المودال
                    document.getElementById('modal-title').textContent = 'تعديل موظف';

                    // إعداد النموذج
                    const form = document.getElementById('employee-form');
                    form.action = `/${baseLocale}/users/${employeeId}`;

                    const oldMethod = form.querySelector('input[name="_method"]');
                    if (oldMethod) oldMethod.remove();

                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    form.appendChild(methodInput);

                    // عرض المودال
                    document.getElementById('employee-modall').style.display = 'block';
                    document.getElementById('employee-modall').classList.add('active');
                });
        });
    });

    // إغلاق المودال بزر ×
    document.getElementById('close-modal').addEventListener('click', function () {
        document.getElementById('employee-modall').style.display = 'none';
        document.getElementById('employee-modall').classList.remove('active');
    });

    // إلغاء داخل النموذج
    document.getElementById('cancel-btn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('employee-modall').style.display = 'none';
        document.getElementById('employee-modall').classList.remove('active');
    });
});
</script>







<script>
  const addEmployeeBtn   = document.getElementById('add-employee-btn');
  const employeeModal    = document.getElementById('employee-modal');
  const closeModalBtn    = document.getElementById('close-modal');
  const cancelBtn        = document.getElementById('cancel-btn');
  const submitBtn        = document.getElementById('submit-btn');
  const employeeForm     = document.getElementById('employee-form');
  const tableBody        = document.getElementById('employee-table-body');
  const searchInput      = document.getElementById('search-input');
  const entriesSelect    = document.getElementById('entries-select');
  const paginationInfo   = document.getElementById('pagination-info');
  const paginationCtrls  = document.getElementById('pagination-controls');

  let currentPage     = 1;
  let rowsPerPage     = parseInt(entriesSelect.value);
  let filteredData    = [];
  let allRows         = [];
  let isEditMode      = false;
  let currentEditRow  = null;

  function openModal(editMode=false, row=null) {
    isEditMode = editMode;
    currentEditRow = row;
    document.getElementById('modal-title').textContent = editMode ? 'تعديل موظف' : 'إضافة موظف جديد';
    submitBtn.textContent = editMode ? 'تحديث البيانات' : 'إضافة موظف';
    employeeForm.reset();

    if (editMode && row) {
      const cells = row.querySelectorAll('td');
      document.getElementById('name').value      = cells[1].textContent;
      document.getElementById('email').value     = cells[2].textContent;
      document.getElementById('password').value  = cells[3].textContent;
      const [y, m, d] = cells[4].textContent.split('/');
      document.getElementById('join-date').value = `${y}-${m.padStart(2, '0')}-${d.padStart(2, '0')}`;
      document.getElementById('completion').value= cells[5].textContent.replace('%', '');
    }
    employeeModal.classList.add('active');
  }

  function closeModal() {
    employeeModal.classList.remove('active');
  }

  function getAllRows() {
    return Array.from(tableBody.querySelectorAll('tr'));
  }

  function renderTable() {
    const term = searchInput.value.trim().toLowerCase();

    filteredData = allRows.filter(row => {
      return Array.from(row.cells)
        .slice(1, 4)
        .some(td => td.textContent.toLowerCase().includes(term));
    });

    const totalPages = Math.ceil(filteredData.length / rowsPerPage) || 1;
    if (currentPage > totalPages) currentPage = totalPages;

    tableBody.innerHTML = '';
    const start = (currentPage - 1) * rowsPerPage;
    const end   = start + rowsPerPage;
    filteredData.slice(start, end).forEach(row => tableBody.appendChild(row));

    const showingFrom = filteredData.length === 0 ? 0 : start + 1;
    const showingTo   = Math.min(end, filteredData.length);
    paginationInfo.textContent = `عرض ${showingFrom} إلى ${showingTo} من ${filteredData.length} سجلات`;

    renderPaginationControls(totalPages);
  }

  function renderPaginationControls(totalPages) {
    paginationCtrls.innerHTML = '';

    const prev = document.createElement('button');
    prev.className = 'pagination-btn';
    prev.innerHTML = '<i class="fas fa-chevron-right"></i>';
    prev.disabled  = currentPage === 1;
    prev.addEventListener('click', () => {
      currentPage--;
      renderTable();
    });
    paginationCtrls.appendChild(prev);

    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement('button');
      btn.className = 'pagination-btn' + (i === currentPage ? ' active' : '');
      btn.textContent = i;
      btn.addEventListener('click', () => {
        currentPage = i;
        renderTable();
      });
      paginationCtrls.appendChild(btn);
    }

    const next = document.createElement('button');
    next.className = 'pagination-btn';
    next.innerHTML = '<i class="fas fa-chevron-left"></i>';
    next.disabled  = currentPage === totalPages;
    next.addEventListener('click', () => {
      currentPage++;
      renderTable();
    });
    paginationCtrls.appendChild(next);
  }

  // إضافة مستمعي الأحداث للفلترة والصفوف في الجدول
  searchInput.addEventListener('input', () => {
    currentPage = 1;
    renderTable();
  });

  entriesSelect.addEventListener('change', () => {
    rowsPerPage = parseInt(entriesSelect.value);
    currentPage = 1;
    renderTable();
  });

  addEmployeeBtn.addEventListener('click', () => openModal(false, null));
  closeModalBtn.addEventListener('click', closeModal);
  cancelBtn.addEventListener('click', closeModal);

  window.addEventListener('click', e => {
    if (e.target === employeeModal) closeModal();
  });

  // تأكيد الحذف قبل إرسال الفورم
  document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(event) {
      if (!confirm('هل تريد حذف هذا الموظف؟')) {
        event.preventDefault();
      }
    });
  });

  document.addEventListener('DOMContentLoaded', () => {
    allRows = getAllRows(); // حفظ نسخة من كل الصفوف الأصلية

    // يمكنك ربط الزر Edit و Delete هنا إذا كنت تستخدم .edit-btn أو .delete-btn
    allRows.forEach(row => {
      // attachRowListeners(row); // (لو عندك دالة attachRowListeners)
    });

    renderTable();
    document.getElementById('join-date').valueAsDate = new Date();
  });
</script>









  <!-- <script>
  const addEmployeeBtn   = document.getElementById('add-employee-btn');
  const employeeModal    = document.getElementById('employee-modal');
  const closeModalBtn    = document.getElementById('close-modal');
  const cancelBtn        = document.getElementById('cancel-btn');
  const submitBtn        = document.getElementById('submit-btn');
  const employeeForm     = document.getElementById('employee-form');
  const tableBody        = document.getElementById('employee-table-body');
  const searchInput      = document.getElementById('search-input');
  const entriesSelect    = document.getElementById('entries-select');
  const paginationInfo   = document.getElementById('pagination-info');
  const paginationCtrls  = document.getElementById('pagination-controls');

  let currentPage     = 1;
  let rowsPerPage     = parseInt(entriesSelect.value);
  let filteredData    = [];
  let isEditMode      = false;
  let currentEditRow  = null;

  function openModal(editMode=false, row=null) {
    isEditMode = editMode;
    currentEditRow = row;
    document.getElementById('modal-title').textContent = editMode ? 'تعديل موظف' : 'إضافة موظف جديد';
    submitBtn.textContent = editMode ? 'تحديث البيانات' : 'إضافة موظف';
    employeeForm.reset();

    if (editMode && row) {
      const cells = row.querySelectorAll('td');
      document.getElementById('name').value      = cells[1].textContent;
      document.getElementById('email').value     = cells[2].textContent;
      document.getElementById('password').value      = cells[3].textContent;
      const [y,m,d] = cells[4].textContent.split('/');
      document.getElementById('join-date').value = `${y}-${m.padStart(2,'0')}-${d.padStart(2,'0')}`;
      document.getElementById('completion').value= cells[5].textContent.replace('%','');
    }
    employeeModal.classList.add('active');
  }

  function closeModal() {
    employeeModal.classList.remove('active');
  }

  addEmployeeBtn.addEventListener('click', () => openModal(false, null));
  closeModalBtn.addEventListener('click', closeModal);
  cancelBtn.addEventListener('click', closeModal);
  window.addEventListener('click', e => {
    if (e.target === employeeModal) closeModal();
  });

  function getAllRows() {
    return Array.from(tableBody.querySelectorAll('tr'));
  }

  function renderTable() {
    const term = searchInput.value.trim().toLowerCase();
    filteredData = getAllRows().filter(row => {
      return Array.from(row.cells)
                  .slice(1, 4)
                  .some(td => td.textContent.toLowerCase().includes(term));
    });

    const totalPages = Math.ceil(filteredData.length / rowsPerPage) || 1;
    if (currentPage > totalPages) currentPage = totalPages;

    getAllRows().forEach(r => r.style.display = 'none');
    const start = (currentPage - 1) * rowsPerPage;
    const end   = start + rowsPerPage;
    filteredData.slice(start, end).forEach(r => r.style.display = '');

    const showingFrom = filteredData.length === 0 ? 0 : start + 1;
    const showingTo   = Math.min(end, filteredData.length);
    paginationInfo.textContent = `عرض ${showingFrom} إلى ${showingTo} من ${filteredData.length} سجلات`;

    renderPaginationControls(totalPages);
  }

  function renderPaginationControls(totalPages) {
    paginationCtrls.innerHTML = '';

    const prev = document.createElement('button');
    prev.className = 'pagination-btn';
    prev.innerHTML = '<i class="fas fa-chevron-right"></i>';
    prev.disabled  = currentPage === 1;
    prev.addEventListener('click', () => { currentPage--; renderTable(); });
    paginationCtrls.appendChild(prev);

    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement('button');
      btn.className = 'pagination-btn' + (i === currentPage ? ' active' : '');
      btn.textContent = i;
      btn.addEventListener('click', () => { currentPage = i; renderTable(); });
      paginationCtrls.appendChild(btn);
    }

    const next = document.createElement('button');
    next.className = 'pagination-btn';
    next.innerHTML = '<i class="fas fa-chevron-left"></i>';
    next.disabled  = currentPage === totalPages;
    next.addEventListener('click', () => { currentPage++; renderTable(); });
    paginationCtrls.appendChild(next);
  }

  searchInput.addEventListener('input', () => {
    currentPage = 1;
    renderTable();
  });

  entriesSelect.addEventListener('change', () => {
    rowsPerPage = parseInt(entriesSelect.value);
    currentPage = 1;
    renderTable();
  });

//   submitBtn.addEventListener('click', e => {
//     // لا يتم التعديل أو الإضافة هنا — سيتم الإرسال من خلال النموذج إلى الراوت مباشرة
//   });

// تأكيد الحذف قبل إرسال الفورم
document.querySelectorAll('.delete-form').forEach(form => {
  form.addEventListener('submit', function(event) {
    if (!confirm('هل تريد حذف هذا الموظف؟')) {
      event.preventDefault(); // فقط نمنع الإرسال إذا ضغط إلغاء
    }
    // إذا ضغط موافق، لا نمنع الإرسال ويتم التنفيذ تلقائي
  });
});
// document.querySelectorAll('.delete-form').forEach(form => {
//   form.addEventListener('submit', function(event) {
//     event.preventDefault(); // منع الإرسال التلقائي
//     if (confirm('هل تريد حذف هذا الموظف؟')) {
//       form.submit(); // فقط إذا ضغط موافق يتم الإرسال
//     }
//     // إذا ضغط إلغاء لا يحدث شيء
//   });
// });


  // function attachRowListeners(row) {
  //   row.querySelector('.edit-btn')?.addEventListener('click', () => openModal(true, row));
  //   row.querySelector('.delete-btn')?.addEventListener('click', () => {
  //     if (confirm('هل تريد حذف هذا الموظف؟')) {
  //       // لا نقوم بالحذف من الجدول — سيتم الحذف عبر الراوت الخاص بك
  //     }
  //   });
  // }

  document.addEventListener('DOMContentLoaded', () => {
    getAllRows().forEach(row => attachRowListeners(row));
    renderTable();
    document.getElementById('join-date').valueAsDate = new Date();
  });
</script> -->










































    <!-- <script>
  // العناصر الأساسية
  const addEmployeeBtn   = document.getElementById('add-employee-btn');
  const employeeModal    = document.getElementById('employee-modal');
  const closeModalBtn    = document.getElementById('close-modal');
  const cancelBtn        = document.getElementById('cancel-btn');
  const submitBtn        = document.getElementById('submit-btn');
  const employeeForm     = document.getElementById('employee-form');
  const tableBody        = document.getElementById('employee-table-body');
  const searchInput      = document.getElementById('search-input');
  const entriesSelect    = document.getElementById('entries-select');
  const paginationInfo   = document.getElementById('pagination-info');
  const paginationCtrls  = document.getElementById('pagination-controls');

  // متغيرات التحكم
  let currentPage     = 1;
  let rowsPerPage     = parseInt(entriesSelect.value);
  let filteredData    = [];  // يحتوي على جميع الصفوف كـ DOM elements بعد البحث/فلترة
  let isEditMode      = false;
  let currentEditRow  = null;

  // =============== فتح/إغلاق المودال ===============
  function openModal(editMode=false, row=null) {
    isEditMode = editMode;
    currentEditRow = row;
    document.getElementById('modal-title').textContent = editMode ? 'تعديل موظف' : 'إضافة موظف جديد';
    submitBtn.textContent = editMode ? 'تحديث البيانات' : 'إضافة موظف';
    employeeForm.reset();
    // لو تعديل، عبئ الحقول من الصف
    if (editMode && row) {
      const cells = row.querySelectorAll('td');
      document.getElementById('name').value      = cells[1].textContent;
      document.getElementById('phone').value     = cells[2].textContent;
      document.getElementById('city').value      = cells[3].textContent;
      const [y,m,d] = cells[4].textContent.split('/');
      document.getElementById('join-date').value = `${y}-${m.padStart(2,'0')}-${d.padStart(2,'0')}`;
      document.getElementById('completion').value= cells[5].textContent.replace('%','');
    }
    employeeModal.classList.add('active');
  }

  function closeModal() {
    employeeModal.classList.remove('active');
  }

  addEmployeeBtn.addEventListener('click', () => openModal(false, null));
  closeModalBtn.addEventListener('click', closeModal);
  cancelBtn.addEventListener('click', closeModal);
  window.addEventListener('click', e => {
    if (e.target === employeeModal) closeModal();
  });

  // =============== عرض/تحديث الصفوف ===============
  function getAllRows() {
    return Array.from(tableBody.querySelectorAll('tr'));
  }

  function renderTable() {
    // أولاً فلترة البحث
    const term = searchInput.value.trim().toLowerCase();
    filteredData = getAllRows().filter(row => {
      return Array.from(row.cells)
                  .slice(1, 4) // Name, Phone/Email, City
                  .some(td => td.textContent.toLowerCase().includes(term));
    });
    // عدل الصفحة لو أصبحت خارج النطاق
    const totalPages = Math.ceil(filteredData.length / rowsPerPage) || 1;
    if (currentPage > totalPages) currentPage = totalPages;

    // إخفاء كل الصفوف
    getAllRows().forEach(r => r.style.display = 'none');
    // إظهار صفوف الصفحة الحالية
    const start = (currentPage - 1) * rowsPerPage;
    const end   = start + rowsPerPage;
    filteredData.slice(start, end).forEach(r => r.style.display = '');

    // تحديث معلومات Pagination Info
    const showingFrom = filteredData.length === 0 ? 0 : start + 1;
    const showingTo   = Math.min(end, filteredData.length);
    paginationInfo.textContent = `عرض ${showingFrom} إلى ${showingTo} من ${filteredData.length} سجلات`;

    // إعادة بناء أزرار pagination
    renderPaginationControls(totalPages);
  }

  // =============== أزرار Pagination ===============
  function renderPaginationControls(totalPages) {
    paginationCtrls.innerHTML = '';

    // زر السابق
    const prev = document.createElement('button');
    prev.className = 'pagination-btn';
    prev.innerHTML = '<i class="fas fa-chevron-right"></i>';
    prev.disabled  = currentPage === 1;
    prev.addEventListener('click', () => { currentPage--; renderTable(); });
    paginationCtrls.appendChild(prev);

    // أزرار الصفحات
    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement('button');
      btn.className = 'pagination-btn' + (i === currentPage ? ' active' : '');
      btn.textContent = i;
      btn.addEventListener('click', () => { currentPage = i; renderTable(); });
      paginationCtrls.appendChild(btn);
    }

    // زر التالي
    const next = document.createElement('button');
    next.className = 'pagination-btn';
    next.innerHTML = '<i class="fas fa-chevron-left"></i>';
    next.disabled  = currentPage === totalPages;
    next.addEventListener('click', () => { currentPage++; renderTable(); });
    paginationCtrls.appendChild(next);
  }

  // =============== البحث ===============
  searchInput.addEventListener('input', () => {
    currentPage = 1;
    renderTable();
  });

  // =============== تغيير عدد السجلات ===============
  entriesSelect.addEventListener('change', () => {
    rowsPerPage = parseInt(entriesSelect.value);
    currentPage = 1;
    renderTable();
  });

  // =============== إضافة/تحديث موظف عبر Modal ===============
  submitBtn.addEventListener('click', e => {
    e.preventDefault();
    const nameEl      = document.getElementById('name');
    const phoneEl     = document.getElementById('phone');
    const cityEl      = document.getElementById('city');
    const dateEl      = document.getElementById('join-date');
    const compEl      = document.getElementById('completion');

    if (![nameEl, phoneEl, cityEl, dateEl, compEl].every(i => i.value.trim() !== '')) {
      alert('يرجى تعبئة جميع الحقول');
      return;
    }

    const formattedDate = (() => {
      const d = new Date(dateEl.value);
      return `${d.getFullYear()}/${String(d.getMonth()+1).padStart(2,'0')}/${String(d.getDate()).padStart(2,'0')}`;
    })();

    if (isEditMode && currentEditRow) {
      // تحديث صف موجود
      const cells = currentEditRow.cells;
      cells[1].textContent = nameEl.value;
      cells[2].textContent = phoneEl.value;
      cells[3].textContent = cityEl.value;
      cells[4].textContent = formattedDate;
      cells[5].textContent = compEl.value + '%';
    } else {
      // إضافة صف جديد
      const newRow = document.createElement('tr');
      const newId = getAllRows().length + 1;
      newRow.setAttribute('data-id', newId);
      newRow.innerHTML = `
        <td>${newId}</td>
        <td>${nameEl.value}</td>
        <td>${phoneEl.value}</td>
        <td>${cityEl.value}</td>
        <td>${formattedDate}</td>
        <td>${compEl.value}%</td>
        <td class="actions">
          <div class="action-btn edit-btn" data-id="${newId}"><i class="fas fa-edit"></i></div>
          <div class="action-btn delete-btn" data-id="${newId}"><i class="fas fa-trash-alt"></i></div>
        </td>
      `;
      tableBody.appendChild(newRow);
      attachRowListeners(newRow);
    }

    closeModal();
    renderTable();
  });

  // =============== استمع لأزرار التعديل والحذف ===============
  function attachRowListeners(row) {
    const id = row.getAttribute('data-id');
    row.querySelector('.edit-btn').addEventListener('click', () => openModal(true, row));
    row.querySelector('.delete-btn').addEventListener('click', () => {
      if (confirm('هل تريد حذف هذا الموظف؟')) {
        row.remove();
        // إعادة ترقيم data-id وأرقام الصفوف
        getAllRows().forEach((r, idx) => {
          r.setAttribute('data-id', idx + 1);
          r.cells[0].textContent = idx + 1;
        });
        renderTable();
      }
    });
  }

  // =============== تهيئة عند التحميل ===============
  document.addEventListener('DOMContentLoaded', () => {
    // أربط مستمعي الأحداث لكل صف موجود
    getAllRows().forEach(row => attachRowListeners(row));
    // اعرض الصفحة الأولى
    renderTable();
    // عيّن تاريخ اليوم افتراضي
    document.getElementById('join-date').valueAsDate = new Date();
  });
</script> -->





</body>





    </div>



      
    
<!-- JS

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#employee-table').DataTable();
  });
</script> -->



    
    



<!-- <script src="{{ asset('build/dashboard/mm.js') }}"></script> -->












@endsection