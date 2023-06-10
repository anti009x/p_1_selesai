<?php
use App\Http\Controllers\MatematikaController;
use App\Http\Controllers\IpaController;
use App\Http\Controllers\IpsController;
use App\Http\Controllers\IndonesiaController;
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
Route::put('/profile/update', 'HomeController@profileUpdate')->name('profile.update');
Route::get('/profile/changepassword', 'HomeController@changePasswordForm')->name('profile.change.password');
Route::post('/profile/changepassword', 'HomeController@changePassword')->name('profile.changepassword');

Route::group(['middleware' => ['auth', 'role:Admin']], function () {


    Route::get('/roles-permissions', 'RolePermissionController@roles')->name('roles-permissions');
    Route::get('/role-create', 'RolePermissionController@createRole')->name('role.create');
    Route::post('/role-store', 'RolePermissionController@storeRole')->name('role.store');
    Route::get('/role-edit/{id}', 'RolePermissionController@editRole')->name('role.edit');
    Route::put('/role-update/{id}', 'RolePermissionController@updateRole')->name('role.update');

    Route::get('/permission-create', 'RolePermissionController@createPermission')->name('permission.create');
    Route::post('/permission-store', 'RolePermissionController@storePermission')->name('permission.store');
    Route::get('/permission-edit/{id}', 'RolePermissionController@editPermission')->name('permission.edit');
    Route::put('/permission-update/{id}', 'RolePermissionController@updatePermission')->name('permission.update');

    Route::get('/assign-subject-to-class/{id}', 'GradeController@assignSubject')->name('class.assign.subject');
    Route::post('/assign-subject-to-class/{id}', 'GradeController@storeAssignedSubject')->name('store.class.assign.subject');

    Route::resource('assignrole', 'RoleAssign');
    Route::resource('classes', 'GradeController');
    Route::resource('subject', 'SubjectController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('parents', 'ParentsController');
    Route::resource('student', 'StudentController');
    Route::get('/attendance', 'AttendanceController@index')->name('attendance.index');

    Route::get('/ips', function () {
        return view('backend.materi.ips');
    });

    Route::get('/ipa', function () {
        return view('backend.materi.ipa');
    });

    Route::get('/indonesia', function () {
        return view('backend.materi.indonesia');
    });
});

Route::group(['middleware' => ['auth', 'role:Teacher']], function () {
    Route::post('/matematika/upload', [MatematikaController::class, 'upload'])->name('matematika.upload');
    Route::get('/matematika/create', [MatematikaController::class, 'create'])->name('matematika.create');
    Route::get('/matematika/edit/{id}', [MatematikaController::class, 'edit'])->name('matematika.edit');
    Route::delete('/matematika/destroy/{id}', [MatematikaController::class, 'destroy'])->name('matematika.destroy');
    Route::put('/matematika/update/{id}', [MatematikaController::class, 'update'])->name('matematika.update');
    Route::get('/matematika/uploadForm', [MatematikaController::class, 'uploadForm'])->name('matematika.uploadForm');
Route::post('/ipa/upload', [IpaController::class, 'upload'])->name('ipa.upload');
Route::get('/ipa/create', [IpaController::class, 'create'])->name('ipa.create');
Route::get('/ipa/edit/{id}', [IpaController::class, 'edit'])->name('ipa.edit');
Route::delete('/ipa/destroy/{id}', [IpaController::class, 'destroy'])->name('ipa.destroy');
Route::put('/ipa/update/{id}', [IpaController::class, 'update'])->name('ipa.update');
Route::get('/ipa/uploadForm', [IpaController::class, 'uploadForm'])->name('ipa.uploadForm');

Route::post('/ips/upload', [IpsController::class, 'upload'])->name('ips.upload');
Route::get('/ips/create', [IpsController::class, 'create'])->name('ips.create');
Route::get('/ips/edit/{id}', [IpsController::class, 'edit'])->name('ips.edit');
Route::delete('/ips/destroy/{id}', [IpsController::class, 'destroy'])->name('ips.destroy');
Route::put('/ips/update/{id}', [IpsController::class, 'update'])->name('ips.update');
Route::get('/ips/uploadForm', [IpsController::class, 'uploadForm'])->name('ips.uploadForm');

Route::post('/indonesia/upload', [IndonesiaController::class, 'upload'])->name('indonesia.upload');
Route::get('/indonesia/create', [IndonesiaController::class, 'create'])->name('indonesia.create');
Route::get('/indonesia/edit/{id}', [IndonesiaController::class, 'edit'])->name('indonesia.edit');
Route::delete('/indonesia/destroy/{id}', [IndonesiaController::class, 'destroy'])->name('indonesia.destroy');
Route::put('/indonesia/update/{id}', [IndonesiaController::class, 'update'])->name('indonesia.update');
Route::get('/indonesia/uploadForm', [IndonesiaController::class, 'uploadForm'])->name('indonesia.uploadForm');


    Route::post('/attendance', 'AttendanceController@store')->name('teacher.attendance.store');
    Route::get('/attendance-create/{classid}', 'AttendanceController@createByTeacher')->name('teacher.attendance.create');
});



Route::group(['middleware' => ['auth', 'role:Parent']], function () {
    Route::get('/attendance/{attendance}', 'AttendanceController@show')->name('attendance.show');
});

Route::get('/materi', 'MateriController@index')->name('materi.index');
Route::get('/matematika', [MatematikaController::class, 'index'])->name('matematika.index');
Route::get('/ipa', [IpaController::class, 'index'])->name('ipa.index');
Route::get('/ips', [IpsController::class, 'index'])->name('ips.index');
Route::get('/indonesia', [IndonesiaController::class, 'index'])->name('indonesia.index');

Route::group(['middleware' => ['auth', 'role:Student']], function () {
    // Tambahkan rute yang diperlukan untuk peran Student di sini (jika ada).
});
