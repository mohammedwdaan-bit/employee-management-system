@extends('Dashboard.Header')

@section('mm')
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 30px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .card-header {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 15px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        border: none;
    }

    .btn-primary {
        background-color: #3490dc;
        color: white;
    }

    .btn-warning {
        background-color: #f0ad4e;
        color: white;
    }

</style>

<div class="container">

    <h2 class="mb-4">تعديل بيانات الموظف</h2>

    <!-- 🟦 معلومات الحساب -->
    <div class="card">
        <div class="card-header">معلومات الحساب</div>
        <form method="POST" action="{{ route('users.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">الاسم الكامل</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ old('name', $employee->name) }}">
            </div>

            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email', $employee->email) }}">
            </div>

            <button type="submit" class="btn btn-primary">تحديث المعلومات</button>
        </form>
    </div>

    <!-- 🟨 تغيير كلمة المرور -->
    <div class="card">
        <div class="card-header">تحديث كلمة المرور</div>
        <form method="POST" action="{{ route('users.update', $employee->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="update_password" value="1">

            <div class="form-group">
                <label for="password">كلمة المرور الجديدة</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning">تحديث كلمة المرور</button>
        </form>
    </div>
</div>
@endsection
