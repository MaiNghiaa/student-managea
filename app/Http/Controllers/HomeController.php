<?php

namespace App\Http\Controllers;

use App\Models\MailStudent;
use App\Models\thanhtoan;
use App\Models\bangdiem;
use App\Models\hocsinh_guithu;
use Illuminate\Support\Facades\File;
use App\Mail\HocPhiNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\MedicalDeclaration;
use App\Models\student_family;
use App\Models\students_classrooms;
use App\Models\teacher_classrooms;
use App\Models\StudentUser;
use App\Models\TeacherUser;
use App\Models\Department;
use App\Models\Classroom;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// Phân trang
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    //     $login_data = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'Teacher_id' => $count
    //     ];
    //     // dd($login_data);
    //     $check_login = Auth::guard('cus_teacher')->attempt($login_data);
    //     if (!$check_login) {
    //         // dd('sai oi`');
    //         return redirect()->back()->with('error', 'Đăng nhập không thành công vui lòng thử lại');
    //     }
    //     // dd('thanhcong');
    //     return redirect()->route('admin.index');
    // }

    public function login()
    {
        return view('Modules/Login');
    }
    public function logoutStudent(Request $request)
    {
        Auth::guard('cus_student')->logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Hủy bỏ phiên đăng nhập
        $request->session()->regenerateToken(); // Tạo lại token phiên đăng nhập mới

        return redirect()->route('hust.login')->with('success', 'Bạn đã đăng xuất thành công');
    }
    public function ChangePasswordStudent($studentId)
    {
        return view('User.Students.Modules.Changepassword', compact('studentId'));
    }
    public function post_newpasswordStudent($studentId, Request $request)
    {
        $student = DB::table('student_user')->where('id', $studentId)->first();

        if (password_verify($request->current_password, $student->password)) {
            if ($request->new_password === $request->confirm_password) {
                $password = bcrypt($request->new_password);
                DB::table('student_user')->where('id', $studentId)->update(['password' => $password]);
                session()->flash('success', 'Đổi Mật Khẩu Thành Công!');
                return redirect()->route('UserStudent.index', compact('studentId'));
            } else {
                $request->session()->flash('warning', 'Mật Khẩu nhập lại không chính xác!');

                return redirect()->route('hust.changePasswordStudent', $studentId);
            }
        } else {
            $request->session()->flash('warning', 'Mật Khẩu nhập cũ hông chính xác!');

            return redirect()->route('hust.changePasswordStudent', $studentId);
        }
    }


    public function post_login(Request $request)
    {
        $role = $request->role;
        $login_data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($role == 1) {
            $teacher = DB::table('teacher_user')->where('Email', $request->email)->first();

            $check_login = Auth::guard('cus_teacher')->attempt($login_data);

            if (!$check_login) {
                return redirect()->back()->with('warning', 'Đăng nhập không thành công vui lòng thử lại');
            }
            $teacherId = $teacher->id;

            return redirect()->route('UserTeacher.index', compact('teacherId'));
        }

        if ($role == 0) {
            $student = DB::table('student_user')->where('Email', $request->email)->first();
            $check_login = Auth::guard('cus_student')->attempt($login_data);

            if (!$check_login) {
                return redirect()->back()->with('warning', 'Đăng nhập không thành công vui lòng thử lại');
            }
            $studentId = $student->id;
            return redirect()->route('UserStudent.index', compact('studentId'));
        }
    }

    public function indexInformationStudent($studentId)
    {
        if (!Auth::guard('cus_student')->check()) {
            return redirect()->route('hust.login');
        }

        // dd($studentId);
        // Kiểm tra $studentId đã tồn tại trong bảng student_family hay chưa
        $student = DB::table('student_user')->where('id', $studentId)->first();
        $detail = DB::table('student_family')->where('id', $studentId);

        if ($detail->exists()) {
            // Nếu $studentId đã tồn tại trong bảng student_family, chuyển hướng đến trang User.Students.index
            $Get_detail = $detail->first();
            return view('User.Students.index', compact('student', 'Get_detail', 'studentId'));
        } else {
            // Nếu $studentId chưa tồn tại trong bảng student_family, chuyển hướng đến trang nhập thông tin
            return view('User.Students.inputInformation', compact('studentId'));
        }
    }

    public function post_detailStudent(Request $request, $studentId)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatar'), $avatarName);

            student_family::create([
                'id' => $studentId,
                'year' => $request->year,
                'level' => $request->level,
                'chuongtrinh' => $request->chuongtrinh,
                'nation' => $request->Nation,
                'highschoolgra' => $request->highschoolgra,
                'CMND' => $request->CMND,
                'noicap' => $request->noicap,
                'fathername' => $request->fathername,
                'fatherbirth' => $request->fatherbirth,
                'fatherjob' => $request->fatherjob,
                'fatherphone' => $request->fatherphone,
                'highschool' => $request->highschool,
                'mothername' => $request->mothername,
                'motherbirth' => $request->motherbirth,
                'motherjob' => $request->motherjob,
                'motherphone' => $request->motherphone,
                'household' => $request->household,
                'avatar' => 'avatar/' . $avatarName, // Lưu đường dẫn tới tập tin trong cơ sở dữ liệu
            ]);

            $request->session()->flash('success', 'Thêm thành công!');
            return redirect()->route('UserStudent.index', $studentId);
        }
    }
    // Khia bao y te 
    public function khaibaoyte($studentId)
    {
        $KBYT = DB::table('medical_declaration')->where('id_student', $studentId)->first();
        return view('User.Students.Modules.medical_declaration', compact('studentId', 'KBYT'));
    }
    public function post_khaibaoyte(Request $request, $studentId)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Lưu hình ảnh vào thư mục công khai
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            // Tìm bản ghi dựa trên id_student hoặc tạo mới nếu không tìm thấy
            $medicalDeclaration = MedicalDeclaration::updateOrCreate(
                ['id_student' => $studentId],
                [
                    'img' => '/uploads/' . $imageName,
                    'status' => 1,
                    // Các trường dữ liệu khác của biểu mẫu
                ]
            );
            MailStudent::create([
                'student_id' => $studentId,
                'type' => 'warning',
                'content' => 'Tải lên ảnh thành công , vui lòng chờ trong phút chốc để xác nhạn thông tin',
            ]);
            return redirect()->back()->with('success', 'Tải lên ảnh thành công');
        }
        MailStudent::create([
            'student_id' => $studentId,
            'type' => 'error',
            'content' => 'Không tìm thấy hình ảnh',
        ]);
        return redirect()->back()->with('error', 'Không tìm thấy hình ảnh');
    }


    // Trang sửa thông tin cho sinh viên 
    public function update_StudentDetail($studentId)
    {
        $studentfamily = DB::table('student_family')->where('id', $studentId)->first();
        return view('User.Students.Modules.update_DetailStudent', compact('studentfamily', 'studentId'));
    }
    // Cập nhật vào db 
    public function post_updateDetail(Request $request, $studentId)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatar'), $avatarName);
            $nameavt = 'avatar/' . $avatarName;

            $data = $request->only('year', 'level', 'chuongtrinh', 'highschool', 'Nation', 'highschoolgra', 'CMND', 'fathername', 'fatherbirth', 'fatherjob', 'fatherphone', 'mothername', 'motherbirth', 'motherjob', 'motherphone', 'household');
            $data['avatar'] = $nameavt;

            DB::table('student_family')->where('id', $studentId)->update($data);
            MailStudent::create([
                'student_id' => $studentId,
                'type' => 'success',
                'content' => 'Sửa Thành Công!'
            ]);
            session()->flash('success', 'Sửa Thành Công!');
            return redirect()->route('UserStudent.index', $studentId);
        }
    }
    // Hỏi đáp tư vấn 
    public function FAQ($studentId)
    {
        return view('User.Students.Modules.FAQ', compact('studentId'));
    }
    public function post_FAQ(Request $request, $studentId)
    {
        dd($request);
    }
    public function HocPhan($studentId)
    {
        $Classrooms = DB::table('students_classrooms')
            ->join('classroom', 'students_classrooms.classroom_id', '=', 'classroom.id')
            ->join('department', 'classroom.department_id', '=', 'department.id')
            ->select('classroom.id as classroom_id', 'classroom as classroom_name', 'classroom.Day', 'classroom.classroom_id', 'department.Department', 'classroom.id')
            ->where('students_classrooms.student_id', $studentId)
            ->paginate(5);
        return view('User.Students.Modules.Hocphan.index', compact('Classrooms', 'studentId'));
    }
    public function DetailHocPhan($studentId, $classId)
    {
        $students = DB::table('students_classrooms')
            ->join('student_user', 'students_classrooms.student_id', '=', 'student_user.id')
            ->select('student_user.Student_id', 'student_user.Full_name', 'student_user.Date_of_birth', 'student_user.Gender', 'student_user.Phone_number')
            ->where('students_classrooms.classroom_id', '=', $classId)
            ->paginate(5);
        return view('User.Students.Modules.Hocphan.DetailHocphan', compact('students', 'studentId'));
    }
    public function dangkyhocphan($studentId)
    {


        $classroomIds = DB::table('students_classrooms')
            ->where('student_id', $studentId)
            ->pluck('classroom_id');

        $Classrooms = Classroom::whereNotIn('id', $classroomIds)->get();
        $Departments = DB::table('department')->get();
        return view('User.Students.Modules.Hocphan.Modules.Dangky', compact('Classrooms', 'studentId', 'Departments'));
    }
    public function postHocPhan(Request $request, $studentId)
    {
        $IdClasses = $request->class;

        foreach ($IdClasses as $IdClass) {
            students_classrooms::create([
                'student_id' => $studentId,
                'classroom_id' => $IdClass,
            ]);
            bangdiem::create([
                'id' => NULL,
                'student_id' => $studentId,
                'classroom_id' => $IdClass,
                'diemquatrinh' => NULL,
                'Gk' => NULL,
                'ck' => NULL
            ]);

            MailStudent::create([
                'student_id' => $studentId,
                'type' => 'warning',
                'content' => 'Thêm học phần thành công!'
            ]);
        }
        // 

        $request->session()->flash('success', 'Thêm học phần thành công!');
        return redirect()->route('user.HocPhan', $studentId);
    }


    public function DeleteHocPhan($studentId, $classId)
    {
        // Xóa học phần trong bảng students_classrooms dựa trên điều kiện student_id và classroom_id
        students_classrooms::where('student_id', $studentId)
            ->where('classroom_id', $classId)
            ->delete();

        // Thực hiện các xử lý khác sau khi xóa học phần
        session()->flash('success', 'Xóa Thành công!');
        return redirect()->route('user.HocPhan', $studentId);
    }
    public function HocPhi($studentId)
    {
        $hocphi = DB::table('hocphi')->get();
        $thanhtoan = DB::table('thanhtoan')->where('student_id', $studentId)->first();
        // dd($hocphi);
        return view('User.Students.Hocphi.index', compact('studentId', 'thanhtoan', 'hocphi'));
    }
    public function Post_HocPhi(Request $request, $studentId)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Lưu hình ảnh vào thư mục công khai
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('HocPhi_img'), $imageName);

            // Cập nhật đường dẫn hình ảnh và trạng thái vào bảng 'thanhtoan'
            $updatedData = [
                'image' => '/HocPhi_img/' . $imageName,
                'status' => 1
            ];
            thanhtoan::where('student_id', $studentId)->update($updatedData);
            MailStudent::create([
                'student_id' => $studentId,
                'type' => 'warning',
                'content' => 'Tải lên ảnh thành công',
            ]);
            $request->session()->flash('warning', 'Cập nhật thành công!');

            return redirect()->back()->with('warning', 'Tải lên ảnh thành công. Vui lòng chờ một vài phút để bộ phận kiểm toán xác nhận');
        }
        MailStudent::create([
            'student_id' => $studentId,
            'type' => 'error',
            'content' => 'Không tìm thấy hình ảnh',
        ]);
        return redirect()->back()->with('error', 'Không tìm thấy hình ảnh');
    }
    public function ThuBao($studentId)
    {
        $malls_student = DB::table('mallstudent')->where(['student_id' => $studentId])->get();
        return view('User.Students.Thubao.index', compact('malls_student', 'studentId'));
    }

    public function SearchKetquaHocTap($studentId)
    {
        $myclass = DB::table('students_classrooms')
            ->join('classroom', 'classroom.id', '=', 'students_classrooms.classroom_id')
            ->where('students_classrooms.student_id', '=', $studentId)
            ->select(
                'classroom.classroom_id',
                'classroom.classroom',
                'classroom.id'
            )
            ->get();

        $bangdiem = DB::table('bangdiem')->get();

        return view('User.Students.Modules.Hocphan.KetQuahoctap', compact('myclass', 'studentId', 'bangdiem'));
    }
    public function Paytutiontutorial($studentId)
    {
        return view('User.Students.Hocphi.PayTuitionTutorial', compact('studentId'));
    }
}
