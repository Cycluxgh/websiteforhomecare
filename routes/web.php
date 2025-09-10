<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\PolicyConsentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\EmployeeQuestionnaireController;
use App\Http\Controllers\ProfileSetupController;
use App\Http\Controllers\ReferenceRequestController;
use App\Http\Controllers\MedicalSelfAssessmentController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\EmployeeDocumentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/jobs/{jobPosting}', [FrontendController::class, 'showJob'])->name('job.detail');
// Route::get('/jobs', [FrontendController::class, 'allJobs'])->name('jobs.all');
Route::get('/', [JobPostingController::class, 'jobList'])->name('home');
// Route::get('/job-list', [JobPostingController::class, 'jobList'])->name('job.list');

// Route::get('/applications/create', [ApplicationController::class, 'WorkWithUs'])->name('applications.create');
Route::get('/applications/create/{jobPosting}', [ApplicationController::class, 'jobApply'])->name('applications.create');
// Route::get('/applications/create/{jobPosting}', [ApplicationController::class, 'create'])->name('applications.create');
// Route::get('/', [ApplicationController::class, 'WorkWithUs'])->name('home');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');


Route::middleware(['auth',])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('policies/{slug}', [PolicyController::class, 'show'])->name('admin.policies.show');
     Route::get('our-policies', [PolicyController::class, 'index'])->name('ourPolicies');

     Route::post('/policies/{policy}/consent', [PolicyConsentController::class, 'store'])
    ->middleware(['verified'])
    ->name('policies.consent');

    Route::get('policy-consents', [PolicyConsentController::class, 'index'])->name('policyConsents');
    Route::get('/patients/{id}/show', [PatientController::class, 'show'])->name('patients.show');
});



// Employee Routes
Route::middleware(['auth', 'role:employee', 'inactive.prevent', 'verified'])
    ->group(function () {
        Route::get('/employee/timesheets', [TimesheetController::class, 'index'])->name('employee.timesheets.index');
        Route::post('/clock-in', [TimesheetController::class, 'clockIn'])->name('employee.timesheets.clock_in');
        Route::put('/clock-out', [TimesheetController::class, 'clockOut'])->name('employee.timesheets.clock_out');

        Route::get('employee/supported_documents', [EmployeeDocumentController::class, 'create'])->name('employee.supported_documents.create');
        Route::post('/supported_documents', [EmployeeDocumentController::class, 'store'])->name('employee_documents.store');
        Route::get('/supported_documents/thank-you/{encryptedId}', [EmployeeDocumentController::class, 'thankYou'])->name('employee.supported_documents.thank-you');

        Route::get('employee/dashboard', [DashboardController::class, 'employee'])->name('employee.dashboard');


        Route::get('employee/employee-questionnaire', [EmployeeQuestionnaireController::class, 'create'])->name('employee.employee_questionnaire');
        Route::post('/employee-questionnaire', [EmployeeQuestionnaireController::class, 'store'])->name('employee.employee_questionnaire.store');
        Route::get('/employee/questionnaires/thank-you/{employeeQuestionnaire}', [EmployeeQuestionnaireController::class, 'thankYou'])->name('employee.questionnaires.thank-you');


        // Route::get('employee/reference/request', [ReferenceRequestController::class, 'create'])->name('reference.request.create');
        // Route::post('/reference/request', [ReferenceRequestController::class, 'store'])->name('reference.request.store');
        // Route::get('/employee/reference/request/thank-you/{encryptedId}', [ReferenceRequestController::class, 'thankYou'])
        //     ->name('reference.requests.thank-you');

        // Route::resource('medical-self-assessments', MedicalSelfAssessmentController::class);
        Route::get('employee/medical-self-assessments', [MedicalSelfAssessmentController::class, 'create'])->name('employee.medical.assessments.create');
        Route::post('/medical-self-assessments', [MedicalSelfAssessmentController::class, 'store'])->name('medical-self-assessments.store');
        Route::get('/medical-self-assessments/thank-you/{encryptedId}', [MedicalSelfAssessmentController::class, 'thankYou'])->name('medical-self-assessments.thank-you');




        Route::view('/employee/questionnaires/already-submitted', 'already-submitted')->name('already-submitted');

        // Route::get('employee/tasks/', [TaskController::class, 'employeeTasks'])->name('tasks.employee');
        Route::post('/tasks/answers/{assignment}', [TaskController::class, 'saveTaskItemAnswer'])->name('tasks.answers.save');
        Route::get('/employee/tasks', [TaskController::class, 'taskIndex'])->name('tasks.employee.index');
        Route::get('/employee/tasks/{assignment}/edit', [TaskController::class, 'edit'])->name('tasks.employee.edit');


    });


Route::middleware(['auth', 'role:super_admin,admin', 'verified'])
    ->prefix('admin')
    ->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Timesheet Routes
        // URLs will be like /admin/timesheets
        Route::get('timesheets', [TimesheetController::class, 'adminIndex'])->name('admin.timesheets.index');
        Route::post('timesheets/approve/{id}', [TimesheetController::class, 'approve'])->name('admin.timesheets.approve');

        // Job Postings Routes
        // URLs will be like /admin/job_postings
        Route::get('job_postings/list', [JobPostingController::class, 'index'])->name('admin.job_postings.index');
        Route::get('create-job', [JobPostingController::class, 'create'])->name('admin.job_postings');
        Route::post('job_postings', [JobPostingController::class, 'store'])->name('admin.job_postings.store');
        Route::get('job_postings/{job_posting}', [JobPostingController::class, 'show'])->name('admin.job_postings.show');
        Route::get('job_postings/{job_posting}/edit', [JobPostingController::class, 'edit'])->name('admin.job_postings.edit');
        Route::put('job_postings/{job_posting}', [JobPostingController::class, 'update'])->name('admin.job_postings.update');
        Route::delete('job_postings/{job_posting}', [JobPostingController::class, 'destroy'])->name('admin.job_postings.destroy');
        Route::patch('job_postings/{job_posting}/close', [JobPostingController::class, 'close'])->name('admin.job_postings.close');

        // Application Routes
        // URLs will be like /admin/applications
        Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('applications/{application}', [ApplicationController::class, 'show'])->name('admin.applications.show');
        Route::post('applications/{application}/approve', [ApplicationController::class, 'approve'])->name('applications.approve');
        Route::post('/applications/{application}/schedule-interview', [ApplicationController::class, 'scheduleInterview'])->name('applications.schedule-interview');
        Route::post('applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');

        // Employee Routes
        // URL will be /admin/employees
        Route::get('all-employees', [ApplicationController::class, 'employees'])->name('admin.employees.index');
        Route::get('create-employee', [ApplicationController::class, 'create'])->name('admin.employees.create');
        Route::post('employees-create', [ApplicationController::class, 'saveEmployee'])->name('saveEmployee');


        // Patients Routes
        // URL will be /admin/patients
        Route::get('/patients-index', [PatientController::class, 'index'])->name('patients.index');
        Route::get('/create-patient', [PatientController::class, 'create'])->name('patients.create');
        Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

        // Route::get('/patients/{id}/show', [PatientController::class, 'show'])->name('patients.show');
        Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
        Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
        Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');


        Route::get('/patient-profiles/{patientProfileId}/category/{categoryId}/questions', [PatientProfileController::class, 'showQuestions'])->name('patient-profiles.questions');
        Route::post('/patient-profiles/{patientProfileId}/category/{categoryId}/answers', [PatientProfileController::class, 'saveAnswers'])->name('patient-profiles.answers.save');


        // Task Routes
        Route::get('all-tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/category-create', [TaskController::class, 'createCategory'])->name('tasks.categories.create');
        Route::post('/tasks/categories', [TaskController::class, 'storeCategory'])->name('tasks.categories.store');
        Route::get('/tasks/categories/{category}/edit', [TaskController::class, 'editCategory'])->name('tasks.categories.edit');
        Route::put('/tasks/categories/{category}', [TaskController::class, 'updateCategory'])->name('tasks.categories.update');
        Route::delete('/tasks/categories/{category}', [TaskController::class, 'destroyCategory'])->name('tasks.categories.destroy');

        Route::get('/tasks/item-create', [TaskController::class, 'createItem'])->name('tasks.items.create');
        Route::post('/tasks/items', [TaskController::class, 'storeItem'])->name('tasks.items.store');
        Route::get('/tasks/items/{item}/edit', [TaskController::class, 'editItem'])->name('tasks.items.edit');
        Route::put('/tasks/items/{item}', [TaskController::class, 'updateItem'])->name('tasks.items.update');
        Route::delete('/tasks/items/{item}', [TaskController::class, 'destroyItem'])->name('tasks.items.destroy');


        Route::get('/tasks/assign', [TaskController::class, 'createAssignment'])->name('tasks.assign.create');
        Route::post('/tasks/assign', [TaskController::class, 'storeAssignment'])->name('tasks.assign.store');
        Route::get('/tasks/assignments', [TaskController::class, 'indexAssignments'])->name('tasks.assignments.index');
        Route::get('/tasks/assignments/{id}/edit', [TaskController::class, 'editAssignment'])->name('tasks.assignments.edit');
        Route::put('/tasks/assignments/{id}', [TaskController::class, 'updateAssignment'])->name('tasks.assignments.update');
        Route::delete('/tasks/assignments/{id}', [TaskController::class, 'destroyAssignment'])->name('tasks.assignments.destroy');


        Route::prefix('system-setup')->group(function () {
            Route::get('/', [ProfileSetupController::class, 'create'])->name('profile.setup.create');

            // Categories
            Route::post('/categories', [ProfileSetupController::class, 'storeCategory'])->name('profile.categories.store');
            Route::get('/categories/{category}/edit', [ProfileSetupController::class, 'editCategory'])->name('profile.categories.edit');
            Route::put('/categories/{category}', [ProfileSetupController::class, 'updateCategory'])->name('profile.categories.update');
            Route::delete('/categories/{category}', [ProfileSetupController::class, 'destroyCategory'])->name('profile.categories.destroy');

            // Sub-Categories
            Route::post('/sub-categories', [ProfileSetupController::class, 'storeSubCategory'])->name('profile.subcategories.store');
            Route::get('/sub-categories/{subCategory}/edit', [ProfileSetupController::class, 'editSubCategory'])->name('profile.subcategories.edit');
            Route::put('/sub-categories/{subCategory}', [ProfileSetupController::class, 'updateSubCategory'])->name('profile.subcategories.update');
            Route::delete('/sub-categories/{subCategory}', [ProfileSetupController::class, 'destroySubCategory'])->name('profile.subcategories.destroy');

            // Questions
            Route::post('/questions', [ProfileSetupController::class, 'storeQuestion'])->name('profile.questions.store');
            Route::get('/questions/{question}/edit', [ProfileSetupController::class, 'editQuestion'])->name('profile.questions.edit');
            Route::put('/questions/{question}', [ProfileSetupController::class, 'updateQuestion'])->name('profile.questions.update');
            Route::delete('/questions/{question}', [ProfileSetupController::class, 'destroyQuestion'])->name('profile.questions.destroy');
        });


        // Employee Questionnaire Routes
        // URLs will be like /admin/questionnaires
        Route::get('questionnaires', [EmployeeQuestionnaireController::class, 'index'])->name('admin.questionnaires.index');
        Route::get('questionnaires/{employee_questionnaire}', [EmployeeQuestionnaireController::class, 'show'])->name('admin.questionnaires.show');
        Route::get('questionnaires/{employee_questionnaire}/edit', [EmployeeQuestionnaireController::class, 'edit'])->name('admin.questionnaires.edit');
        Route::delete('questionnaires/{employee_questionnaire}', [EmployeeQuestionnaireController::class, 'destroy'])->name('admin.questionnaires.destroy');

        // Reference Request Routes
        Route::get('reference_request', [ReferenceRequestController::class, 'index'])->name('admin.reference.request.index');
        Route::get('reference-requests/{encryptedId}', [ReferenceRequestController::class, 'show'])->name('admin.reference_requests.show');

        // Medical Self-Assessments Routes
        // URLs will be like /admin/medical/self-assessments
        Route::get('medical/self-assessments', [MedicalSelfAssessmentController::class, 'index'])->name('admin.medical-self-assessments.index');
        Route::get('medical/self-assessments/{encryptedId}', [MedicalSelfAssessmentController::class, 'show'])->name('admin.medical_self_assessment.show');

        // Policy Routes
        // URLs will be like /admin/policies
        Route::get('policies-create', [PolicyController::class, 'create'])->name('admin.policies.create');
        Route::post('policies', [PolicyController::class, 'store'])->name('admin.policies.store');
        Route::get('policies/{slug}/edit', [PolicyController::class, 'edit'])->name('admin.policies.edit');
        Route::put('policies/{id}', [PolicyController::class, 'update'])->name('admin.policies.update');
        Route::delete('policies/{slug}', [PolicyController::class, 'destroy'])->name('admin.policies.destroy');


        Route::get('supported-documents', [EmployeeDocumentController::class, 'index'])->name('admin.supported_documents.index');
        Route::get('supported_documents/{slug}', [EmployeeDocumentController::class, 'show'])->name('admin.supported_documents.show');
    });


require __DIR__ . '/auth.php';
