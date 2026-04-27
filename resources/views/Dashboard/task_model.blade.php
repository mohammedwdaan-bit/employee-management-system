<!-- Modal تعديل موظف -->
<div class="modal" id="employee-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modal-title">تعديل موظف</h2>
            <button class="close-btn" id="close-modal">&times;</button>
        </div>
        <div class="modal-body">

                <div class="form-groupp">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" required value="{{ $employee->name }}">
                </div>
                <div class="form-groupp">
                    <label for="city">Email *</label>
                    <input type="email" name="email" id="email" required value="{{ $employee->email }}">
                </div>
                <div class="form-groupp">
                    <label for="join-date">Date of joining *</label>
                    <input type="date" name="created_at" id="join-date" value="{{ \Carbon\Carbon::parse($employee->created_at)->format('Y-m-d') }}" required>
                </div>
                <div class="form-groupp">
                    <label for="completion">Salary</label>
                    <input type="number" name="salary" id="completion" required value="{{ $employee->salary }}">
                </div>
                <br>
                <div class="modal-footer">
                    <button class="btnn btn-cancel" id="cancel-btn">إلغاء</button>
                    <button type="submit" class="btnn btn-submit" id="submit-btn">حفظ التعديل</button>
                </div>
          
        </div>
    </div>
</div>

<script>
    // إغلاق المودال عند الضغط على زر الإغلاق
    document.getElementById('close-modal').addEventListener('click', function () {
        document.getElementById('employee-modal').style.display = 'none';
    });
</script>
