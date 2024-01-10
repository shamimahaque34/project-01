<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Academic\ClassController;
use App\Http\Controllers\Admin\Academic\AcademicClassController;
use App\Http\Controllers\Admin\Academic\SubjectController;
use App\Http\Controllers\Admin\Academic\SectionController;
use App\Http\Controllers\Admin\Academic\StudentGroupController;
use App\Http\Controllers\Admin\Academic\EducationalStageController;
use App\Http\Controllers\Admin\Academic\AcademicYearController;
use App\Http\Controllers\Admin\Academic\ClassScheduleController;
use App\Http\Controllers\Admin\Academic\SyllabusController;
use App\Http\Controllers\Admin\Academic\AssignmentController;
use App\Http\Controllers\Admin\Academic\RoutineController;
// use App\Http\Controllers\Admin\Academic\AttendenceController;
use App\Http\Controllers\Admin\Quran\ChapterController;
use App\Http\Controllers\Admin\Quran\VerseController;
use App\Http\Controllers\Admin\Quran\QuranFontController;
use App\Http\Controllers\Admin\Quran\TranslationController;
use App\Http\Controllers\Admin\Quran\TranslationProviderController;
use App\Http\Controllers\Admin\Library\LibraryBookCategoryController;
use App\Http\Controllers\Admin\Library\LibraryBookController;
use App\Http\Controllers\Admin\Library\LibraryMemberController;
use App\Http\Controllers\Admin\Library\LibraryEbookController;
use App\Http\Controllers\Admin\Library\LibraryEbookFileController;
use App\Http\Controllers\Admin\Hostel\HostelController;
use App\Http\Controllers\Admin\Hostel\HostelMemberController;
use App\Http\Controllers\Admin\ExamManagement\QuestionController;
use App\Http\Controllers\Admin\ExamManagement\QuestionBankAnswerOptionController;
use App\Http\Controllers\Admin\ExamManagement\ExamQuestionController;
use App\Http\Controllers\Admin\ExamManagement\ExamMarkController;
use App\Http\Controllers\Admin\ExamManagement\AssociateExamQuestionController;
use App\Http\Controllers\Admin\ExamManagement\QuestionDificultyLevelController;
use App\Http\Controllers\Admin\ExamManagement\ExamAttendanceController;
use App\Http\Controllers\Admin\ExamManagement\ExamScheduleController;
use App\Http\Controllers\Admin\ExamManagement\ExamMarkDistributionTypeController;
use App\Http\Controllers\Admin\ExamManagement\ExamController;
use App\Http\Controllers\Admin\ExamManagement\ExamGradeController;
use App\Http\Controllers\Admin\Academic;
use App\Http\Controllers\Admin\UserManagement\AcademicStuffController;
use App\Http\Controllers\Admin\UserManagement\AdminController;
use App\Http\Controllers\Admin\UserManagement\UserDesignationController;
use App\Http\Controllers\Admin\UserManagement\UserManagementStudentController;
use App\Http\Controllers\Admin\UserManagement\UserManagementTeacherController;
use App\Http\Controllers\Admin\UserManagement\UserManagementSubmittedCertificateController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function () {
         
        //////////////////////// Role route///////////////////
        //permissions route
        Route::resource('permissions', PermissionController::class);
        //roles route
        Route::resource('roles', RoleController::class);

        //User route
        Route::resource('users', UserController::class);

        ////////////////////////////Setting route///////////////////////////
        // Setting route
        Route::resource('setting', SettingController::class);

        //////////////////////Academic Module///////////////////////////////
        //class route
        Route::resource('classes', ClassController::class);

         //class route
         Route::resource('academic-classes', AcademicClassController::class);

        //Section route
        Route::resource('sections', SectionController::class);

        //Subject route
        Route::resource('subjects', SubjectController::class);

        //Student Group route
        Route::resource('student-groups', StudentGroupController::class);

        //Educational Stage route
        Route::resource('educational-stages', EducationalStageController::class);

        //Academic Year route
        Route::resource('academic-years', AcademicYearController::class);

        //Class Schedule route
        Route::resource('class-schedules', ClassScheduleController::class);

        //Syllabus route
        Route::resource('syllabuses', SyllabusController::class);

        //Assignment route
        Route::resource('assignments', AssignmentController::class);

        //Routine route
        Route::resource('routines', RoutineController::class);

        //Attendence Route
        // Route::resource('attendences', AttendenceController::class);



        //Quran module
        //QuranFont
        Route::resource('quran-fonts', QuranFontController::class);
        //verse
        Route::resource('verses', VerseController::class);
        //Chapter
        Route::resource('chapters', ChapterController::class);
        //translation
        Route::resource('translations', TranslationController::class);
        //translationProvider
        Route::resource(
            'translation_providers',
            TranslationProviderController::class
        );

        Route::post('/get-verse-data-by-chapter-id', [
            TranslationController::class,
            'getVerse',
        ]);

        //Library module
        //Library Book Category
        Route::resource(
            'library_book_category',
            LibraryBookCategoryController::class
        );
        //Library Book
        Route::resource('library_book', LibraryBookController::class);
        //Library Member
        Route::resource('library_member', LibraryMemberController::class);
        //Library Ebook
        Route::resource('library_ebook', LibraryEbookController::class);
        //Library Ebook File
        Route::resource(
            'library_ebook_file',
            LibraryEbookFileController::class
        );

        //Hostel module

        //hostel
        Route::resource('hostel', HostelController::class);
        //hostel member
        Route::resource('hostel_member', HostelMemberController::class);

        //Exam Management module

        //Exam
        Route::resource('exam', ExamController::class);

        //Exam Mark
        Route::resource('exam_marks', ExamMarkController::class);

        //Exam Question
        Route::resource('exam_questions', ExamQuestionController::class);

        // Associate Exam Question
        Route::resource('associate_exam_questions', AssociateExamQuestionController::class);

        //Exam Mark Distribution Type
        Route::resource(
            'exam_mark_distribution_type',
            ExamMarkDistributionTypeController::class
        );
        //Exam Attendance
        Route::resource('exam_attendance', ExamAttendanceController::class);
        //Exam Grade
        Route::resource('exam_grade', ExamGradeController::class);
        //Exam Schedule
        Route::resource('exam_schedule', ExamScheduleController::class);
        //Question
        Route::resource('question', QuestionController::class);
          //QuestionBankAnswerOption
          Route::resource('question_bank_answer_options', QuestionBankAnswerOptionController::class);
        //Question Difficulty
        Route::resource(
            'question_difficulty_level',
            QuestionDificultyLevelController::class
        );

        //  User management
        Route::resource('academic_stuff', AcademicStuffController::class);
        Route::resource('user_admin', AdminController::class);
        Route::resource('designation', UserDesignationController::class);
        Route::resource(
            'user_management_student',
            UserManagementStudentController::class
        );
        Route::resource(
            'user_management_teacher',
            UserManagementTeacherController::class
        );
        Route::resource(
            'user_submitted_certificate',
            UserManagementSubmittedCertificateController::class
        );
    });
});
