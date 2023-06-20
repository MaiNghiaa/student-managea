<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('hust', function () {
    return view('User.Students.Hocphi.PayTuitionTutorial');
});
// Logout

Route::get('/logout', [HomeController::class, 'logoutStudent'])->name('user.logout');

// hiện thị form đăng nhập

Route::Group(['prefix' => 'Hust'], function () {
    // Hướng dẫn nộp học phí 
    Route::get('/index/Student/{studentId}/Pay', [HomeController::class, 'Paytutiontutorial'])->name('User.Paytutiontutorial');

    // Cho học sinh / sinh viên
    // Phần đăng nhập đăng ký
    Route::get('login', [HomeController::class, 'login'])->name('hust.login');
    Route::post('login', [HomeController::class, 'post_login']);
    // Hết đăng nhập 


    // Đổi mật khẩu
    // InputPointStudent
    // Sinh viên
    Route::get('/index/Student/{studentId}/ChangePassword', [HomeController::class, 'ChangePasswordStudent'])->name('hust.changePasswordStudent');
    Route::post('/index/Student/{studentId}/ChangePassword', [HomeController::class, 'post_newpasswordStudent'])->name('hust.postchangePasswordStudent');
    // Giảng Viên
    Route::get('/index/Teacher/{teacherId}/ChangePassword', [TeacherController::class, 'ChangePasswordTeacher'])->name('Teacher.changePasswordTeacher');
    Route::post('/index/Teacher/{teacherId}/ChangePassword', [TeacherController::class, 'post_newpasswordTeacher'])->name('Teacher.postchangePasswordTeacher');
    // Done

    // Khai Báo Y tế

    // Sinh viên
    Route::get('/index/Student/{studentId}/KhaiBaoYTe', [HomeController::class, 'khaibaoyte'])->name('user.Student.khaibaoyte');
    Route::post('/index/Student/{studentId}/KhaiBaoYTe', [HomeController::class, 'post_khaibaoyte'])->name('user.Student.post_khaibaoyte');
    // Giảng Viên
    Route::get('/index/Teacher/{teacherId}/KhaiBaoYTe', [TeacherController::class, 'khaibaoyte'])->name('user.Teacher.khaibaoyte');
    Route::post('/index/Teacher/{teacherId}/KhaiBaoYTe', [TeacherController::class, 'post_khaibaoyte'])->name('user.Teacher.post_khaibaoyte');

    // End Khai Bao

    // hien thi trang Thông tin chi tiết

    // Sinh Vien
    Route::get('index/Student/{studentId}', [HomeController::class, 'indexInformationStudent'])->name('UserStudent.index');
    // Giang vien
    Route::get('index/Teacher/{teacherId}', [TeacherController::class, 'indexInformationTeacher'])->name('UserTeacher.index');

    // end hien thi trang Thông tin chi tiết

    // Theem thong tin chi tiet neu chua co thong Tin chi tiet trong db

    // Sinh Vien
    Route::post('index/Student/{studentId}', [HomeController::class, 'post_detailStudent'])->name('detailStudent.index');
    // Giang Vien
    Route::post('index/Teacher/{teacherId}', [TeacherController::class, 'post_detailTeacher'])->name('detailTeacher.index');

    // End Them thong tin chi tiet

    // Trang sửa thông tin 
    // Cho Sinh vien
    Route::get('index/Student/{studentId}/update', [HomeController::class, 'update_StudentDetail'])->name('user.Update_Student_detail');
    Route::post('index/Student/{studentId}/update', [HomeController::class, 'post_updateDetail'])->name('user.post_Update_Student_detail');
    // Cho Giang Vien
    Route::get('index/Teacher/{teacherId}/update', [TeacherController::class, 'update_TeacherDetail'])->name('user.Update_Teacher_detail');
    Route::post('index/Teacher/{teacherId}/update', [TeacherController::class, 'post_updateTeacherDetail'])->name('user.post_Update_Teacher_detail');
    // Hỏi đáp tư vấn sinh viên
    Route::get('index/Student/{studentId}/FAQ', [HomeController::class, 'FAQ'])->name('FAQ.student');
    Route::post('index/Student/{studentId}/FAQ', [HomeController::class, 'post_FAQ'])->name('FAQ.student');
    // hiển thị trang học phần đăng ký 
    Route::get('index/Student/{studentId}/HocPhan', [HomeController::class, 'HocPhan'])->name('user.HocPhan');
    // xem chi tiết lớp học đăng ký 
    // Route::get('index/Student/HocPhan/Detail/{classId}', [HomeController::class, 'DetailHocPhan'])->name('User.Detailclass');
    Route::get('index/Student/{studentId}/HocPhan/Detail/{classId}', [HomeController::class, 'DetailHocPhan'])->name('User.Detailclass');
    Route::get('index/Student/{studentId}/HocPhan/DangKy', [HomeController::class, 'dangkyhocphan'])->name('User.dangkyhocphan');
    Route::post('index/Student/{studentId}/HocPhan/DangKy', [HomeController::class, 'postHocPhan'])->name('User.postHocPhan');
    Route::get('index/Student/{studentId}/KetQuaHocTap/', [HomeController::class, 'SearchKetquaHocTap'])->name('User.SearchKetquaHocTap');
    // XÓa học phần đã đăng ký
    Route::delete('index/Student/{studentId}/HocPhan/Detail/{classId}/Del', [HomeController::class, 'DeleteHocPhan'])->name('User.DeleteHocPhan');

    Route::get('index/Student/{studentId}/HocPhi', [HomeController::class, 'HocPhi'])->name('User.StudentsHocphi');
    Route::post('index/Student/{studentId}/HocPhi', [HomeController::class, 'Post_HocPhi'])->name('user.FormHocPhi');
    // Hòm Thư
    // Sinh viên
    Route::get('index/Student/{studentId}/ThuBao', [HomeController::class, 'ThuBao'])->name('User.ThuBao');
    // Giảng viên
    Route::get('index/Teacher/{teacherId}/ThuBao', [TeacherController::class, 'ThuBao'])->name('TeacherUser.ThuBao');

    // Giảng viên
    // hiển thị trang lướp giảng viên dạy 

    Route::get('index/Teacher/{teacherId}/Lopcuatoi', [TeacherController::class, 'TeacherClass'])->name('user.TeacherClass');
    // Chi tiết từng lớp học
    Route::get('index/Teacher/{teacherId}/Lopcuatoi/Detail/{classId}', [TeacherController::class, 'TeacherDetailClass'])->name('User.TeacherDetailclass');
    // Trang diem danh lop 
    Route::get('index/Teacher/{teacherId}/Lopcuatoi/{classId}/DiemDanh', [TeacherController::class, 'TeacherDiemDanh'])->name('User.TeacherDiemDanh');
    Route::post('index/Teacher/{teacherId}/Lopcuatoi/{classId}/DiemDanh', [TeacherController::class, 'Update_diemdanh'])->name('User.Update_diemDanh');
    Route::get('index/Teacher/{teacherId}/Lopcuatoi/{classId}/BangDiem', [TeacherController::class, 'TeacherPoint'])->name('User.TeacherPoint');
    Route::get('index/Teacher/{teacherId}/Lopcuatoi/{classId}/BangDiem/NhapDiem', [TeacherController::class, 'InputPointStudent'])->name('Teacher.InputPointStudent');
    Route::post('index/Teacher/{teacherId}/Lopcuatoi/{classId}/BangDiem/NhapDiem', [TeacherController::class, 'Update_DiemSinhVien'])->name('User.TeacherUpdate_Diem');

    Route::get('index/Teacher/{teacherId}/Lopcuatoi/{classId}/BangDiem/SuaDiem/{student_id}', [TeacherController::class, 'ChangePointStudent'])->name('Teacher.changePointStudent');
    Route::post('index/Teacher/{teacherId}/Lopcuatoi/{classId}/BangDiem/SuaDiem/{student_id}', [TeacherController::class, 'UpdatenewPointStudent'])->name('Teacher.UpdatePointStudent');


    // Route::post('index/Teacher/{Teacher}', [HomeController::class, 'post_detailStudent'])->name('detailStudent.index');
    // Đăng ký lớp dạy 
    Route::get('index/Teacher/{teacherId}/DangKyLop', [TeacherController::class, 'dangkylophoc'])->name('TeacherUser.dangkylophoc');
    Route::post('index/Teacher/{teacherId}/DangKyLop', [TeacherController::class, 'postLophocdangky'])->name('TeacherUser.Postdangkylophoc');
});
Route::Group(['prefix' => 'Admin'], function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'Token'])->name('Token');
    Route::post('/', [AdminController::class, 'Check_Token']);
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'post_login']);
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'post_register']);

    // Route::post('/register', function () {
    //     dd('hehe');
    // });
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    // Hiển thị 

    // **Thông Tin** //

    // Giảng viên
    Route::get('/index/Information/Teacher', [AdminController::class, 'InfoTeacher'])->name('admin.InfoTeacher');
    // Sinh Viên
    Route::get('/index/Information/Student', [AdminController::class, 'InfoStudent'])->name('admin.InfoStudent');
    // Khoa / Viện
    Route::get('/index/Information/Department', [AdminController::class, 'InfoDepartment'])->name('admin.InfoDepartment');
    // Lớp 
    Route::get('/index/Information/Class', [AdminController::class, 'InfoClass'])->name('admin.InfoClass');

    // ** Thêm mới** //

    // giảng viên
    // học phí 
    Route::get('/index/Information/Tuition/', [AdminController::class, 'tuition'])->name('admin.tuition');

    Route::get('/index/Information/Teacher/add', [AdminController::class, 'addNewTeacher'])->name('admin.addNewTeacher');
    // Sinh viên
    Route::get('/index/Information/Student/add', [AdminController::class, 'addNewStudent'])->name('admin.addNewStudent');
    // Mới Khoa / Viện
    Route::get('/index/Information/Department/add', [AdminController::class, 'addNewDepartment'])->name('admin.addNewDepartment');
    // lớp học 
    Route::get('/index/Information/Class/add', [AdminController::class, 'addNewClass'])->name('admin.addNewClass');

    Route::get('/index/Information/Tuition/add', [AdminController::class, 'addtuition'])->name('admin.addtuition');
    // End Hiển Thị

    // Xử Lý thêm với Db //

    // Thêm học phí cho sinh viên 

    Route::post('index/Information/Tuition/', [AdminController::class, 'AddTuitiontoStudent'])->name('AddTuitiontoStudent');


    Route::post('/index/Information/Teacher/add', [AdminController::class, 'post_accountTeacher']);
    // Sinh viên
    Route::post('/index/Information/Student/add', [AdminController::class, 'post_accountStudent']);
    //Khoa / Viện   
    Route::post('/index/Information/Department/add', [AdminController::class, 'post_Department']);
    // lớp học 
    Route::post('/index/Information/Class/add', [AdminController::class, 'post_class']);

    Route::post('/index/Information/Tuition/add', [AdminController::class, 'post_tuition'])->name('admin.posttuition');
    // Kết thúc xử lý //
    // // Phương thức xóa / Sua thong tin giang vien
    Route::delete('/index/Information/Teacher/{Teacher_id}', [AdminController::class, 'deleteTeacher'])->name('deleteTeacher');
    Route::get('index/Information/Teacher/edit/{Teacher_id}', [AdminController::class, 'editTeacher'])->name('editTeacher');
    Route::put('index/Information/Teacher/edit/{Teacher_id}', [AdminController::class, 'updateTeacher'])->name('updateTeacher');
    // het
    // // Phương thức xóa / Sua thong tin Hoc sinh / Sinh vien
    Route::delete('/index/Information/Student/{Student_id}', [AdminController::class, 'deleteStudent'])->name('deleteStudent');
    Route::get('index/Information/Student/edit/{Student_id}', [AdminController::class, 'editStudent'])->name('editStudent');
    Route::put('index/Information/Student/edit/{Student_id}', [AdminController::class, 'updateStudent'])->name('updateStudent');
    // het
    // // Phương thức xóa / Sua thong tin Moon Hoc chuye nnganh
    Route::delete('/index/Information/Department/{Department_id}', [AdminController::class, 'deleteDepartment'])->name('deleteDepartment');
    Route::get('index/Information/Department/edit/{Department_id}', [AdminController::class, 'editDepartment'])->name('editDepartment');
    Route::put('index/Information/Department/edit/{Department_id}', [AdminController::class, 'updateDepartment'])->name('updateDepartment');
    // het
    // // Phương thức xóa / Sua thong tin Lop hoc 
    Route::delete('/index/Information/Classroom/{Classroom_id}', [AdminController::class, 'deleteClassroom'])->name('deleteClassroom');
    Route::get('index/Information/Classroom/edit/{Classroom_id}', [AdminController::class, 'editClassroom'])->name('editClassroom');
    Route::put('index/Information/Classroom/edit/{Classroom_id}', [AdminController::class, 'updateClassroom'])->name('updateClassroom');
    // het
    // // Phương thức xóa / Sua thong tin Hoc Phi
    Route::delete('/index/Information/Tuition/{Tuition_id}', [AdminController::class, 'deleteTuition'])->name('deleteTuition');
    Route::get('index/Information/Tuition/edit/{Tuition_id}', [AdminController::class, 'editTuition'])->name('editTuition');
    Route::put('index/Information/Tuition/edit/{Tuition_id}', [AdminController::class, 'updateTuition'])->name('updateTuition');
    // het
    // Thông tin chi tiết về lớp học 
    Route::get('index/Information/Classroom/Detail_{Classroom_id}', [AdminController::class, 'DetailClassroom'])->name('DetailClassroom');
    // Hòm thư 
    // Cập nhật trạng thái Khia Báo y tế 
    // Học sinh
    Route::get('index/Information/Mail/KhaiBaoYTe/HocSinh', [AdminController::class, 'mail_khaibaoyte'])->name('admin.mail_khaibaoyte');
    Route::get('index/Information/Mail/KhaiBaoYTe/GiangVien', [AdminController::class, 'mailteacher_khaibaoyte'])->name('admin.mailteacher_khaibaoyte');
    // Sinh viên 
    Route::post('index/Information/Mail/KhaiBaoYTe/HocSinh/update-status/{studentId}', [AdminController::class, 'updateStatus'])->name('update.status');
    // giảng viên updateteacher.status
    Route::post('index/Information/Mail/KhaiBaoYTe/GiangVien/update-status/{teacherId}', [AdminController::class, 'updateteacherStatus'])->name('updateteacher.status');
    // Route::post('index/Information/Mail/KhaiBaoYTe/update-status/{teacherId}', function () {
    //     dd('hihihihi');
    // })->name('updateteacher.status');

    Route::get('index/Information/Mail/HocPhi', [AdminController::class, 'mail_HocPhi'])->name('admin.mail_HocPhi');
    Route::post('index/Information/Mail/HocPhi/update-status/{studentId}', [AdminController::class, 'updateHocPhiStatus'])->name('update.HocPhiStatus');
});



// Route::get('Admin/index', function () {
    //     return view('Admin.index');
    // });
