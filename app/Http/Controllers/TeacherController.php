<?php

namespace App\Http\Controllers;

use App\Models\Teacher_family;
use App\Models\Diemdanh;
use App\Models\bangdiem;
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
use App\Models\TeacherMedicalDeclaration;
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

class TeacherController extends Controller
{
    //
    public function indexInformationTeacher($teacherId)
    {
        if (!Auth::guard('cus_teacher')->check()) {
            return redirect()->route('hust.login');
        }

        // dd($teacherId);
        // Kiểm tra $teacherId đã tồn tại trong bảng student_family hay chưa
        $teacher = DB::table('teacher_user')->where('id', $teacherId)->first();
        $detail = DB::table('teacher_family')->where('id', $teacherId);

        if ($detail->exists()) {
            // Nếu $teacherId đã tồn tại trong bảng student_family, chuyển hướng đến trang User.Students.index
            $Get_detail = $detail->first();
            return view('User.Teachers.index', compact('teacher', 'Get_detail', 'teacherId'));
        } else {
            // Nếu $teacherId chưa tồn tại trong bảng student_family, chuyển hướng đến trang nhập thông tin
            return view('User.Teachers.inputInformation', compact('teacherId', 'teacher'));
        }
    }
    public function ChangePasswordTeacher($teacherId)
    {
        return view('User.Teachers.Modules.Changepassword', compact('teacherId'));
    }
    public function post_newpasswordTeacher($teacherId, Request $request)
    {
        $student = DB::table('teacher_user')->where('id', $teacherId)->first();

        if (password_verify($request->current_password, $student->password)) {
            if ($request->new_password === $request->confirm_password) {
                $password = bcrypt($request->new_password);
                DB::table('teacher_user')->where('id', $teacherId)->update(['password' => $password]);
                session()->flash('success', 'Đổi Mật Khẩu Thành Công!');
                return redirect()->route('UserTeacher.index', compact('teacherId'));
            } else {
                $request->session()->flash('warning', 'Mật Khẩu nhập lại không chính xác!');

                return redirect()->route('Teacher.changePasswordTeacher', $teacherId);
            }
        } else {
            $request->session()->flash('warning', 'Mật Khẩu nhập cũ hông chính xác!');

            return redirect()->route('Teacher.changePasswordTeacher', $teacherId);
        }
    }
    public function post_detailTeacher($teacherId, Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatar'), $avatarName);

            teacher_family::create([
                'id' => $teacherId,
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
            return redirect()->route('UserTeacher.index', compact('teacherId'));
        };
    }

    public function khaibaoyte($teacherId)
    {
        $KBYT = DB::table('teacher_medical_declaration')->where('id', $teacherId)->first();

        if ($KBYT === null) {
            // Nếu không có bản ghi với id tương ứng, tạo một bản ghi mới
            DB::table('teacher_medical_declaration')->insert([
                'id' => $teacherId,
                'status' => 0,
                'img' => null,
            ]);

            // Lấy lại bản ghi sau khi tạo
            $KBYT = DB::table('teacher_medical_declaration')->where('id', $teacherId)->first();
        }
        return view('User.Teachers.Modules.medical_declaration', compact('teacherId', 'KBYT'));
    }

    public function post_khaibaoyte(Request $request, $teacherId)
    {
        // dd($teacherId);
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Lưu hình ảnh vào thư mục công khai
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            // Tìm bản ghi dựa trên id_student hoặc tạo mới nếu không tìm thấy
            $TeacherMedicalDeclaration = TeacherMedicalDeclaration::updateOrCreate(
                ['id' => $teacherId],
                [
                    'id' => $teacherId,
                    'img' => '/uploads/' . $imageName,
                    'status' => 1,
                    // Các trường dữ liệu khác của biểu mẫu
                ]
            );
            mallteacher::create([
                'teacher_id' => $teacherId,
                'type' => 'success',
                'content' => 'Tải lên ảnh thành công , vui lòng chờ trong phút chốc để xác nhạn thông tin',
            ]);
            return redirect()->back()->with('success', 'Tải lên ảnh thành công');
        }
        mallteacher::create([
            'teacher_id' => $teacherId,
            'type' => 'error',
            'content' => 'Không tìm thấy hình ảnh',
        ]);
        return redirect()->back()->with('error', 'Không tìm thấy hình ảnh');
    }

    public function update_TeacherDetail($teacherId)
    {
        // dd($teacherId);
        $teacherfamily = DB::table('teacher_family')->where('id', $teacherId)->first();
        // dd($teacherfamily);
        return view('User.Teachers.Modules.update_DetailTeacher', compact('teacherfamily', 'teacherId'));
    }

    public function post_updateTeacherDetail(Request $request, $teacherId)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatar'), $avatarName);
            $nameavt = 'avatar/' . $avatarName;

            $data = $request->only('year', 'level', 'chuongtrinh', 'highschool', 'Nation', 'highschoolgra', 'CMND', 'fathername', 'fatherbirth', 'fatherjob', 'fatherphone', 'mothername', 'motherbirth', 'motherjob', 'motherphone', 'household');
            $data['avatar'] = $nameavt;

            DB::table('teacher_family')->where('id', $teacherId)->update($data);
            mallteacher::create([
                'teacher_id' => $teacherId,
                'type' => 'success',
                'content' => 'Sửa Thành Công!'
            ]);
            session()->flash('success', 'Sửa Thành Công!');
            return redirect()->route('UserTeacher.index', compact('teacherId'));
        }
    }
    // Lớp học của giảng viên 
    public function TeacherClass($teacherId)
    {
        $Departments = DB::table('department')->get();
        $classes = teacher_classrooms::join('classroom', 'teacher_classrooms.classroom_id', '=', 'classroom.id')
            ->where('teacher_classrooms.teacher_id', $teacherId)
            ->select('classroom.id', 'classroom.classroom', 'classroom.classroom_id', 'classroom.Day', 'classroom.department_id')
            ->paginate(5);
        // dd($classes);
        return view('User.Teachers.Modules.Class.index', compact('classes', 'teacherId', 'Departments'));
    }

    // Hiển thị chi tiết lớp giảng viên dạy 

    public function TeacherDetailClass($teacherId, $classId)
    {
        $students = DB::table('students_classrooms')
            ->join('student_user', 'students_classrooms.student_id', '=', 'student_user.id')
            ->leftJoin('diemdanh', function ($join) use ($classId) {
                $join->on('diemdanh.classroom_id', '=', 'students_classrooms.classroom_id')
                    ->on('diemdanh.student_id', '=', 'students_classrooms.student_id')
                    ->where('diemdanh.classroom_id', '=', $classId);
            })
            ->select(
                'student_user.Student_id',
                DB::raw('MAX(student_user.Full_name) AS Full_name'),
                'student_user.Phone_number',
                DB::raw('SUM(CASE WHEN diemdanh.Dihoc = 1 THEN 1 ELSE 0 END) AS Dihoc_1'),
                DB::raw('SUM(CASE WHEN diemdanh.Dihoc = 0 THEN 1 ELSE 0 END) AS Dihoc_0'),
                DB::raw('SUM(CASE WHEN diemdanh.DiHocMuon = 1 THEN 1 ELSE 0 END) AS DiHocMuon_1'),
                DB::raw('SUM(CASE WHEN diemdanh.DiHocMuon = 0 THEN 1 ELSE 0 END) AS DiHocMuon_0'),
                DB::raw('SUM(CASE WHEN diemdanh.NghiKhongPhep = 1 THEN 1 ELSE 0 END) AS NghiKhongPhep_1'),
                DB::raw('SUM(CASE WHEN diemdanh.NghiKhongPhep = 0 THEN 1 ELSE 0 END) AS NghiKhongPhep_0'),
                DB::raw('SUM(CASE WHEN diemdanh.NghiCophep = 1 THEN 1 ELSE 0 END) AS NghiCophep_1'),
                DB::raw('SUM(CASE WHEN diemdanh.NghiCophep = 0 THEN 1 ELSE 0 END) AS NghiCophep_0')
            )
            ->where('students_classrooms.classroom_id', '=', $classId)
            ->groupBy('student_user.Student_id', 'student_user.Phone_number')
            ->paginate(5);

        // dd($students);
        return view('User.Teachers.Modules.Class.DetailClass', compact('students', 'teacherId'));
    }



    public function TeacherDiemDanh($teacherId, $classId)
    {
        $students = DB::table('students_classrooms')
            ->join('student_user', 'students_classrooms.student_id', '=', 'student_user.id')
            ->select('student_user.id', 'student_user.Student_id', 'student_user.Full_name')
            ->where('students_classrooms.classroom_id', '=', $classId)
            ->get();
        return view('User.Teachers.Modules.Class.DiemDanh', compact('teacherId', 'classId', 'students'));
    }
    public function Update_diemdanh($teacherId, $classId, Request $request)
    {
        foreach ($request->student_id as $key => $StuId) {
            $Stu_status = $request->attendance_status[$key];

            Diemdanh::create([
                'classroom_id' => $classId,
                'student_id' => $StuId,
                'date' => $request->Date,
                'DiHocMuon' => ($Stu_status == 'Đi muộn') ? 1 : null,
                'Dihoc' => ($Stu_status == 'Đi học') ? 1 : null,
                'NghiKhongPhep' => ($Stu_status == 'Nghỉ không phép') ? 1 : null,
                'NghiCophep' => ($Stu_status == 'Nghỉ có phép') ? 1 : null
            ]);
        }

        $request->session()->flash('success', 'Thêm thành công!');
        return redirect()->route('User.TeacherDetailclass', compact('teacherId', 'classId'));
    }

    public function TeacherPoint($teacherId, $classId)
    {
        $students = DB::table('students_classrooms')
            ->join('classroom', 'students_classrooms.classroom_id', '=', 'classroom.id')
            ->join('student_user', 'students_classrooms.student_id', '=', 'student_user.id')
            ->select('classroom.classroom', 'student_user.Full_name', 'student_user.id', 'student_user.Student_id')
            ->where('students_classrooms.classroom_id', '=', $classId)
            ->get();

        $hasRecords = false;

        foreach ($students as $student) {
            $hasRecords = DB::table('bangdiem')
                ->where('student_id', $student->id)
                ->exists();

            if ($hasRecords) {
                break;
            }
        }

        $diemquatrinh = bangdiem::where('classroom_id', $classId)
            ->pluck('diemquatrinh')
            ->first();

        $gk = bangdiem::where('classroom_id', $classId)
            ->pluck('Gk')
            ->first();

        $ck = bangdiem::where('classroom_id', $classId)
            ->pluck('ck')
            ->first();

        $disableInputPoint = !is_null($diemquatrinh) && !is_null($gk) && !is_null($ck);

        if ($hasRecords) {
            $bangdiem = DB::table('bangdiem')->where('classroom_id', $classId)->get();
            return view('User.Teachers.Modules.Class.Bangdiem', compact('teacherId', 'classId', 'students', 'bangdiem', 'disableInputPoint'));
        } else {
            foreach ($students as $student) {
                bangdiem::create([
                    'id' => NULL,
                    'student_id' => $student->id,
                    'classroom_id' => $classId,
                    'diemquatrinh' => NULL,
                    'Gk' => NULL,
                    'ck' => NULL
                ]);
            }

            $bangdiem = DB::table('bangdiem')->where('classroom_id', $classId)->get();

            return view('User.Teachers.Modules.Class.Bangdiem', compact('teacherId', 'classId', 'students', 'bangdiem', 'disableInputPoint'));
        }
    }

    public function InputPointStudent($teacherId, $classId)
    {
        $students = DB::table('students_classrooms')
            ->join('classroom', 'students_classrooms.classroom_id', '=', 'classroom.id')
            ->join('student_user', 'students_classrooms.student_id', '=', 'student_user.id')
            ->select('classroom.classroom', 'student_user.Full_name', 'student_user.id', 'student_user.Student_id')
            ->where('students_classrooms.classroom_id', '=', $classId)
            ->get();

        $bangdiem = DB::table('bangdiem')->where('classroom_id', $classId)->get();
        return view('User.Teachers.Modules.Class.FormNhapdiem', compact('teacherId', 'classId', 'students', 'bangdiem'));
    }
    public function Update_DiemSinhVien($teacherId, $classId, Request $request)
    {

        $diemquatrinh = bangdiem::where('classroom_id', $classId)
            ->pluck('diemquatrinh')
            ->first();

        $gk = bangdiem::where('classroom_id', $classId)
            ->pluck('Gk')
            ->first();

        $ck = bangdiem::where('classroom_id', $classId)
            ->pluck('ck')
            ->first();

        $disableInputPoint = !is_null($diemquatrinh) && !is_null($gk) && !is_null($ck);

        $id_class = $classId; // Giá trị mới của điểm quá trình

        // Cập nhật dữ liệu trong bảng điểm
        foreach ($request->student_id as $index => $student_id) {
            $diemquatrinh = $request->diemquatrinh[$index];
            $Gk = $request->Gk[$index];
            $ck = $request->ck[$index];
            // dd($ck);
            bangdiem::where('classroom_id', $id_class)
                ->where('student_id', $student_id)
                ->update([
                    'diemquatrinh' => $diemquatrinh,
                    'Gk' => $Gk,
                    'ck' => $ck
                ]);
        }
        $students = DB::table('students_classrooms')
            ->join('classroom', 'students_classrooms.classroom_id', '=', 'classroom.id')
            ->join('student_user', 'students_classrooms.student_id', '=', 'student_user.id')
            ->select('classroom.classroom', 'student_user.Full_name', 'student_user.id', 'student_user.Student_id')
            ->where('students_classrooms.classroom_id', '=', $classId)
            ->get();
        $bangdiem = DB::table('bangdiem')->where('classroom_id', $classId)->get(); // Assign the query result to $bangdiem
        return view('User.Teachers.Modules.Class.Bangdiem', compact('teacherId', 'classId', 'students', 'bangdiem', 'disableInputPoint'));
    }

    public function ChangePointStudent($teacherId, $classId, $student_id)
    {
        $bangdiem = DB::table('bangdiem')
            ->where('bangdiem.student_id', $student_id)
            ->where('bangdiem.classroom_id', $classId)
            ->join('student_user', 'bangdiem.student_id', '=', 'student_user.id')
            ->join('classroom', 'bangdiem.classroom_id', '=', 'classroom.id')
            ->select('student_user.Full_name', 'classroom.classroom', 'bangdiem.diemquatrinh', 'bangdiem.Gk', 'bangdiem.ck', 'bangdiem.student_id')
            ->first();
        // dd($bangdiem);
        return view('User.Teachers.Modules.Class.FormchangePoint', compact('teacherId', 'classId', 'bangdiem'));
    }

    public function UpdatenewPointStudent($teacherId, $classId, $student_id, Request $request)
    {
        // dd($teacherId, $classId, $student_id, $request);
        DB::table('bangdiem')
            ->where('classroom_id', $classId)
            ->where('student_id', $student_id)
            ->update([
                'diemquatrinh' => $request->diemquatrinh,
                'Gk' => $request->Gk,
                'ck' => $request->Ck,
            ]);
        $request->session()->flash('success', 'Sửa thành công!');
        return redirect()->route('User.TeacherPoint', compact('teacherId', 'classId'));
    }

    public function dangkylophoc($teacherId)
    {

        $classesID = DB::table('teacher_classrooms')->where('teacher_id', $teacherId)->pluck('classroom_id');
        $Departments = DB::table('department')->get();
        $Classrooms = Classroom::whereNotIn('id', $classesID)->get();

        return view('User.Teachers.Modules.Class.DangKyLophoc', compact('teacherId', 'Classrooms', 'Departments'));
    }
    public function postLophocdangky(Request $request, $teacherId)
    {
        $IdClasses = $request->class;
        foreach ($IdClasses as $IdClass) {
            teacher_classrooms::create([
                'teacher_id' => $teacherId,
                'classroom_id' => $IdClass,
            ]);
        }
        $request->session()->flash('success', 'Thêm Lớp học thành công!');

        return redirect()->route('user.TeacherClass', $teacherId);
    }
}
