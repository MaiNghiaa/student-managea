<?php

namespace App\Http\Controllers;

use App\Models\TeacherMedicalDeclaration;
use App\Models\MedicalDeclaration;
use App\Models\MailStudent;
use App\Models\mallteacher;
use App\Models\thanhtoan;
use App\Models\students_classrooms;
use App\Models\teacher_classrooms;
use App\Models\StudentUser;
use App\Models\TeacherUser;
use App\Models\Department;
use App\Models\Classroom;
use App\Models\hocphi;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// Phân trang
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Route;
use Symfony\Component\HttpFoundation\Cookie;



class AdminController extends Controller
{
    //
    public function login(Request $request)
    {
        return view('Admin/Modules/Login');
        // if ($request->token == 1) {

        // } else {
        //     return redirect()->route('Token');
        // }
    }

    public function AddTuitiontoStudent(Request $request)
    {
        // dd($request);
        $hocphi = DB::table('hocphi')->where('id', $request->TuitionId)->first();
        $studentIds = DB::table('student_user')->pluck('id');

        foreach ($studentIds as $studentId) {
            // Truy vấn để tính toán số lớp học của mỗi học sinh
            $totalClasses = DB::table('students_classrooms')
                ->where('student_id', $studentId)
                ->count();

            // Tính toán số tiền học phí dựa trên số lớp học
            $tienHocPhi = $totalClasses * ($hocphi->price);

            // Lưu thông tin học phí vào bảng thanhtoan
            if (!DB::table('thanhtoan')
                ->where('student_id', $studentId)
                ->where('hocphi_id', $request->TuitionId)
                ->exists()) {
                // Thực hiện thêm bản ghi vào bảng thanhtoan
                DB::table('thanhtoan')->insert([
                    'student_id' => $studentId,
                    'hocphi_id' => $request->TuitionId,
                    'TienHocPhi' => $tienHocPhi,
                    'status' => 0
                ]);
                $request->session()->flash('success', 'Thêm thành công!');
                return redirect()->route('admin.tuition');
            } else {
                $request->session()->flash('error', 'Bạn đã thêm học phí cho sinh viên này trước đó!');
                return redirect()->route('admin.tuition');
            }
        }
    }

    public function post_login(Request $request)
    {
        $count = 0;
        if ($request->email == 'admin@gmail.com') {
            $count = '0000000';
        }
        $login_data = [
            'email' => $request->email,
            'password' => $request->password,
            'Teacher_id' => $count
        ];
        // dd($login_data);
        $check_login = Auth::guard('cus_admin')->attempt($login_data);
        if (!$check_login) {
            // dd('sai oi`');
            return redirect()->back()->with('error', 'Đăng nhập không thành công vui lòng thử lại');
        }
        // dd('thanhcong');
        return redirect()->route('admin.index');
    }

    public function register()
    {
        // {if ($request->token == 1) {
        return view('Admin.Modules.register');
        // } else {
        //     return redirect()->route('Token');
        // }
    }

    public function post_register(Request $request)
    {


        // dd($request);
        // $rules = [
        //     'Full_name' => 'required|max:100',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|string|min:8',
        //     'specialized' => 'required',
        //     'Phone_number' => 'max:10',
        // ];
        // $message = [
        //     'Full_name.required' => 'Vui lòng nhập họ tên',
        //     'email.required' => 'Vui lòng nhập đúng định dạng Email',
        //     'password.required' => 'Mật khẩu phải từ 8 kí tự trở lên',
        //     // .....blabla
        // ];
        // $request->validate($rules, $message);
        // // Lưu thông in vào bảng admin
        $add = TeacherUser::create([
            'Teacher_id' => $request->id,
            'Full_name' => $request->Full_name,
            'Date_of_birth' => $request->dob,
            'Gender' => $request->Gender,
            'Address' => $request->Address,
            'Phone_number' => $request->Phone_number,
            'Email' => $request->email,
            'Specialized' => $request->specialized,
            'password' => bcrypt($request->password)
        ]);
        // kiểm tra thêm mới thành công hay không
        //  dd('check');
        return redirect()->route('admin.login');
    }

    public function index()
    {
        if (!Auth::guard('cus_admin')->check()) {
            return redirect()->route('admin.login');
        }
        $countUserstudent = DB::table('student_user')->count();
        $countUserTeacher = DB::table('teacher_user')->count();
        $countUserDepartment = DB::table('department')->count();
        $countUserClassroom = DB::table('classroom')->count();
        return view('Admin.index', compact('countUserstudent', 'countUserTeacher', 'countUserDepartment', 'countUserClassroom'));
    }
    public function logout(Request $request)
    {
        Auth::guard('cus_teacher')->logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Hủy bỏ phiên đăng nhập
        $request->session()->regenerateToken(); // Tạo lại token phiên đăng nhập mới

        return redirect()->route('admin.login')->with('success', 'Bạn đã đăng xuất thành công');
    }

    // public function Token()
    // {
    //     return view('Admin/security/Token');
    // }

    // public function Check_Token(Request $request)
    // {
    //     $checkToken = False;
    //     if ($request->token == 'DaylaAdmin') {
    //         $checkToken = True;
    //         return redirect()->route('admin.login', ['token' => $checkToken]);
    //     } else {
    //         $checkToken = False;
    //         // return back();
    //         dd('Ban khong phai admin');
    //     }
    // }

    public function InfoTeacher(Request $req)
    {
        // Tìm kiếm
        if ($req->name) {
            $teachers = TeacherUser::where('Full_name', 'LIKE', '%' . $req->name . '%')
                ->paginate(5);
            $classrooms = DB::table('classroom')->get();
            $teachers_classrooms = DB::table('teacher_classrooms')->get();
            // dd($classroom);
        } else {
            $teachers = TeacherUser::paginate(5);
            $classrooms = DB::table('classroom')->get();
            $teachers_classrooms = DB::table('teacher_classrooms')->get();
            // dd($classroom);
        }
        return view('Admin/Teacher/infoTeacher', compact('classrooms', 'teachers', 'teachers_classrooms'));
    }


    // }

    public function InfoStudent()
    {
        $students = DB::table('student_user')
            ->paginate(5); // phan trang
        //     // dd($Hotels);
        //     // tìm kiếm 
        // if ($req->name) {
        //     $Hotels = DB::table('hotels')->where('hotels.name', 'LIKE', '%' . $req->name . '%')->paginate(3);
        // };
        return view('Admin/Student/infoStudent', compact('students'));
    }

    public function InfoDepartment()
    {
        $Departments = DB::table('department')->paginate(5);
        // dd($Departments);
        return view('Admin.Department.infoDepartment', compact('Departments'));
    }

    public function InfoClass()
    {
        $Departments = DB::table('department')->get();
        $Classrooms = DB::table('classroom')->paginate(5);
        return view('Admin.Class.infoClass', compact('Classrooms', 'Departments'));
    }
    // Thông tin chi tiết của từng lớp học 
    public function DetailClassroom($id)
    {
        $Classrooms = DB::table('classroom')->where('id', $id)->get();
        $Departments = DB::table('department')->get();
        $teachers_classrooms = DB::table('teacher_classrooms')->get();
        $teachers = DB::table('teacher_user')->get();
        $students = DB::table('student_user')->get();
        $students_classrooms = DB::table('students_classrooms')->get();
        return view('Admin.Class.DetailClass', compact('Classrooms', 'Departments', 'teachers_classrooms', 'teachers', 'students', 'students_classrooms'));
    }
    // Thêm Mới
    public function addNewTeacher()
    {
        $classrooms = DB::table('classroom')->get();
        // dd($classrooms);
        return view('Admin.Teacher.RegisterTeacher', compact('classrooms'));
    }

    public function addNewStudent()
    {
        return view('Admin.Student.RegisterStudent');
    }

    public function addNewDepartment()
    {
        return view('Admin.Department.Modules.addnew');
    }
    public function addtuition()
    {
        return view('Admin.Tuition.RegisterTuition');
    }

    public function addNewClass()
    {
        $Departments = DB::table('department')->get();
        return view('Admin.Class.RegisterClass', compact('Departments'));
    }

    // Bước cập nhật thêm vào db
    public function post_tuition(Request $request)
    {
        hocphi::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status
        ]);
        // Đặt thông báo thành công
        $request->session()->flash('success', 'Thêm thành công!');

        return redirect()->route('admin.tuition');
    }
    public function post_accountTeacher(Request $request)
    {
        $teacherId = DB::table('teacher_user')->insertGetId([
            'Teacher_id' => $request->id,
            'Full_name' => $request->Full_name,
            'Date_of_birth' => $request->dob,
            'Gender' => $request->Gender,
            'Address' => $request->Address,
            'Phone_number' => $request->Phone_number,
            'Email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $specializedValues = $request->input('specialized');
        foreach ($specializedValues as $classroomId) {
            teacher_classrooms::create([
                'teacher_id' => $teacherId,
                'classroom_id' => $classroomId,
            ]);
        }

        // Đặt thông báo thành công
        $request->session()->flash('success', 'Thêm thành công!');

        return redirect()->route('admin.InfoTeacher');
    }

    public function post_class(Request $request)
    {
        // dd($request);
        Classroom::create([
            'classroom_id' => $request->classroom_id,
            'classroom' => $request->Classroom,
            'department_id' => $request->department,
        ]);
        // Đặt thông báo thành công
        $request->session()->flash('success', 'Thêm thành công!');

        return redirect()->route('admin.InfoClass');
    }

    public function post_accountStudent(Request $request)
    {
        // dd($request);
        // $rules = [
        //     // Chỉ cho phép chọn file có định dạng: jpg, jpeg, png, gif
        //     'image' => 'required|mimes:jpg,jpeg,png,gif',
        // ];

        // $messages = [
        //     'image.required' => 'Vui lòng chọn ảnh',
        //     'image.mimes' => 'Định dạng file cho phép là: jpg, jpeg, png, gif',
        // ];

        // $request->validate($rules, $messages);

        // // Xử lý và thêm dữ liệu vào CSDL
        // $ext = $request->image->extension();
        // $file_name = time() . '.' . $ext;
        // $request->image->move(public_path('uploads'), $file_name);
        StudentUser::create([
            'Student_id' => $request->id,
            'Full_name' => $request->Full_name,
            'Date_of_birth' => $request->dob,
            'Gender' => $request->Gender,
            'Address' => $request->Address,
            'Phone_number' => $request->Phone_number,
            'Email' => $request->email,
            'password' => bcrypt($request->password),
            // 'image' => $file_name, // Lưu đường dẫn của file hình ảnh
        ]);

        // Đặt thông báo thành công
        $request->session()->flash('success', 'Thêm thành công!');

        return redirect()->route('admin.InfoStudent');
    }
    public function post_Department(Request $request)
    {
        // dd($request);
        // $rules = [
        //     // Chỉ cho phép chọn file có định dạng: jpg, jpeg, png, gif
        //     'image' => 'required|mimes:jpg,jpeg,png,gif',
        // ];

        // $messages = [
        //     'image.required' => 'Vui lòng chọn ảnh',
        //     'image.mimes' => 'Định dạng file cho phép là: jpg, jpeg, png, gif',
        // ];

        // $request->validate($rules, $messages);

        // // Xử lý và thêm dữ liệu vào CSDL
        // $ext = $request->image->extension();
        // $file_name = time() . '.' . $ext;
        // $request->image->move(public_path('uploads'), $file_name);

        Department::create([
            'id_Department' => $request->id,
            'Department' => $request->Department,
            // 'image' => $file_name, // Lưu đường dẫn của file hình ảnh
        ]);

        // Đặt thông báo thành công
        $request->session()->flash('success', 'Thêm thành công!');

        return redirect()->route('admin.InfoDepartment');
    }

    // ************************************** //
    // xóa thông tin
    // Xóa thông tin Tuition

    public function deleteTuition($id)
    {
        thanhtoan::where('hocphi_id', $id)->delete();
        DB::table('hocphi')->where('id', $id)->delete();
        session()->flash('success', 'Xóa Thành Công!');
        return redirect()->back();
    }
    public function deleteTeacher($id)
    {
        // Xác định teacher_id cần xóa
        $teacherId = $id;
        // dd($teacherId);

        // Xóa các hàng trong bảng teacher_classrooms tham chiếu đến teacher_id
        DB::table('teacher_classrooms')->where('teacher_id', $teacherId)->delete();

        // Xóa hàng trong bảng teacher_user
        TeacherUser::where('id', $teacherId)->delete();
        // dd($id);
        // TeacherUser::where('Teacher_id', $id)->delete();
        session()->flash('success', 'Xóa Thành Công!');
        return redirect()->back();
    }
    public function deleteStudent($id)
    {
        // dd($id);
        DB::table('student_user')->where('Student_id', $id)->delete();
        session()->flash('success', 'Xóa Thành Công!');
        return redirect()->back();
    }
    public function deleteDepartment($id)
    {
        // dd($id);
        DB::table('department')->where('id', $id)->delete();
        session()->flash('success', 'Xóa Thành Công!');
        return redirect()->back();
    }
    public function deleteClassroom($id)
    {

        // Xác định teacher_id cần xóa
        $ClassroomID = $id;
        // dd($teacherId);

        // Xóa các hàng trong bảng teacher_classrooms tham chiếu đến teacher_id
        DB::table('students_classrooms')->where('classroom_id', $ClassroomID)->delete();

        DB::table('classroom')->where('id', $ClassroomID)->delete();
        session()->flash('success', 'Xóa Thành Công!');
        return redirect()->back();
        // dd($id);
    }
    // sửa thông tin

    public function editTeacher($id)
    {
        $classrooms = DB::table('classroom')->get();
        $teachers_classrooms = DB::table('teacher_classrooms')->where('teacher_id', $id)->get();
        $teacher = DB::table('teacher_user')->where('id', $id)->get();


        // dd($teacher);

        return view('Admin/Teacher/modules/edit', compact('classrooms', 'teacher', 'teachers_classrooms'));
    }
    // THêm phương thức hiện form sửa 
    public function editTuition($id)
    {
        $hocphi = DB::table('hocphi')->where('id', $id)->first();
        return view('Admin.Tuition.Modules.edit', compact('hocphi'));
    }
    public function editClassroom($id)
    {
        $Departments = DB::table('department')->get();
        // dd($Departments);
        $Classroom = DB::table('classroom')->where('id', $id)->get();
        return view('Admin/Class/modules/edit', compact('Departments', 'Classroom'));
    }

    public function editStudent($id)
    {
        $student = DB::table('student_user')->where('Student_id', $id)->first();
        return view('Admin/student/modules/edit', compact('student'));
    }
    public function editDepartment($id)
    {
        $Department = DB::table('department')->where('id', $id)->first();
        return view('Admin/Department/Modules/edit', compact('Department'));
    }

    // Cập nhật thông tin trong DB
    public function updateTeacher(Request $request, $id)
    {
        // dd($request);
        $specializedValues = $request->input('specialized');
        teacher_classrooms::where('teacher_id', $id)->delete();
        foreach ($specializedValues as $classroomId) {
            teacher_classrooms::create([
                'teacher_id' => $id,
                'classroom_id' => $classroomId,
            ]);
        }
        // dd($specializedValues);
        DB::table('teacher_user')->where('Teacher_id', $id)->update($request->only('Teacher_id', 'Full_name', 'password', 'Date_of_birth', 'Gender', 'Address', 'Phone_number', 'Email'));
        session()->flash('success', 'Sửa Thành Công!');
        return redirect()->route('admin.InfoTeacher');
    }

    public function updateTuition(Request $request, $id)
    {
        // dd($request);
        DB::table('hocphi')->where('id', $id)->update($request->only('name', 'price', 'status'));
        session()->flash('success', 'Sửa Thành Công!');
        return redirect()->route('admin.tuition');
    }

    public function updateClassroom(Request $request, $id)
    {
        // dd($request);
        DB::table('classroom')->where('id', $id)->update([
            'classroom_id' => $request->classroom_id,
            'Classroom' => $request->Classroom,
            'department_id' => $request->department
        ]);
        session()->flash('success', 'Sửa Thành Công!');
        return redirect()->route('admin.InfoClass');
    }

    public function updateStudent(Request $request, $id)
    {
        // dd($request);
        DB::table('student_user')->where('Student_id', $id)->update($request->only('Teacher_id', 'Full_name', 'password', 'Date_of_birth', 'Gender', 'Address', 'Phone_number', 'Email'));
        session()->flash('success', 'Sửa Thành Công!');
        return redirect()->route('admin.InfoStudent');
    }
    public function updateDepartment(Request $request, $id)
    {
        // dd($request);
        DB::table('department')->where('id', $id)->update([
            'id_Department' => $request->id,
            'Department' => $request->Department
        ]);

        session()->flash('success', 'Sửa Thành Công!');
        return redirect()->route('admin.InfoDepartment');
    }

    public function tuition()
    {
        $tuitions = DB::table('hocphi')->paginate(5);
        return view('Admin.Tuition.infoTuition', compact('tuitions'));
    }

    public function mail_khaibaoyte()
    {
        $students = DB::table('student_user')->get();
        $Mail_BHYT = DB::table('medical_declaration')->where('status', 1)->paginate(5);
        // dd($MailTeacher_BHYT);
        return view('Admin.mail.KBYT', compact('Mail_BHYT', 'students'));
    }
    public function mailteacher_khaibaoyte()
    {
        $teachers = DB::table('teacher_user')->get();
        $Mail_BHYT = DB::table('teacher_medical_declaration')->where('status', 1)->paginate(5);
        // dd($MailTeacher_BHYT);
        return view('Admin.mail.KBYT_teacher', compact('Mail_BHYT', 'teachers'));
    }
    public function updateStatus(Request $request, $studentId)
    {
        $status = $request->input('status');

        // Tìm bản ghi dựa trên id_student
        $medicalDeclaration = MedicalDeclaration::where('id_student', $studentId)->first();

        if ($medicalDeclaration) {
            $medicalDeclaration->status = $status;
            $medicalDeclaration->save();
            if ($status == 2) {
                MailStudent::create([
                    'student_id' => $studentId,
                    'type' => 'success',
                    'content' => 'Khai báo Y tế thành Công , Cảm ơn bạn'
                ]);
            } elseif ($status == 0) {
                MailStudent::create([
                    'student_id' => $studentId,
                    'type' => 'warning',
                    'content' => 'Khai báo Y tế không đúng vui lòng thử lại !'
                ]);
            }
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        }
        return redirect()->back()->with('error', 'Không tìm thấy bản ghi');
    }
    public function updateteacherStatus(Request $request, $teacherId)
    {
        // dd('$request->status');
        $status = $request->input('status');


        // Tìm bản ghi dựa trên id_student
        $TeacherMedicalDeclaration = TeacherMedicalDeclaration::where('id', $teacherId)->first();
        // dd($TeacherMedicalDeclaration);
        if ($TeacherMedicalDeclaration) {
            $TeacherMedicalDeclaration->status = $status;
            $TeacherMedicalDeclaration->save();
            mallteacher::create([
                'teacher_id' => $teacherId,
                'type' => 'success',
                'content' => 'Khai báo Y tế thành Công , Cảm ơn bạn'
            ]);
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        }

        return redirect()->back()->with('error', 'Không tìm thấy bản ghi');
    }
    public function mail_HocPhi()
    {
        $students = DB::table('student_user')->get();
        $Mail_HocPhi = DB::table('thanhtoan')->where('status', 1)->paginate(5);
        return view('Admin.mail.HocPhi', compact('Mail_HocPhi', 'students'));
    }
    public function updateHocPhiStatus(Request $request, $studentId)
    {
        $status = $request->input('status');

        // Tìm bản ghi dựa trên id_student
        $thanhtoanhocphi = thanhtoan::where('student_id', $studentId)->first();

        if ($thanhtoanhocphi) {
            $thanhtoanhocphi->status = $status;
            $thanhtoanhocphi->save();
            MailStudent::create([
                'student_id' => $studentId,
                'type' => 'success',
                'content' => 'Nộp Học phí thành Công , Cảm ơn bạn'
            ]);
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        }

        return redirect()->back()->with('error', 'Không tìm thấy bản ghi');
    }
}
