<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content">
        <div class="sidebar-brand">
           @if(auth()->check() && auth()->user()->role === 'employee')
                <a href="{{ route('employee.dashboard') }}"><img
                        src="{{ asset('assets/images/websiteforhomecareweb.png') }}" height="24" width="50%" alt=""></a>
            @else
                <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/websiteforhomecareweb.png') }}"
                        height="24" width="50%" alt=""></a>
            @endif
        </div>

        <ul class="border-t sidebar-menu border-white/10" data-simplebar style="height: calc(100% - 70px);">
            <li class="">
                @if(auth()->check() && auth()->user()->role === 'employee')
                    <a href="{{ route('employee.dashboard') }}"><i class="uil uil-dashboard me-2"></i>Dashboard</a>
                @else
                    <a href="{{ route('dashboard') }}"><i class="uil uil-dashboard me-2"></i>Dashboard</a>
                @endif
            </li>

            @if(auth()->check() && auth()->user()->role !== 'employee')
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="uil uil-briefcase-alt me-2"></i>Job Postings</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('admin.job_postings.index') }}" class="active"> View Job Postings</a></li>
                            <li><a href="{{ route('admin.job_postings') }}"> Create Job</a></li>
                        </ul>
                    </div>
                </li>

                <li class="">
                    <a href="{{ route('applications.index') }}"><i class="uil uil-file-alt me-2"></i>Job
                        Applications</a>
                </li>

                <li class="">
                    <a href="{{ route('tasks.index') }}"><i class="uil uil-check-circle me-2"></i>Tasks</a>
                </li>


                <li class="">
                    <a href="{{ route('policyConsents') }}"><i class="uil uil-file-check me-2"></i>Policy Consents</a>
                </li>

                <li class="">
                    <a href="{{ route('tasks.assignments.index') }}"><i
                            class="uil uil-clipboard-alt me-2"></i>Assignments</a>
                </li>

                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="uil uil-users-alt me-2"></i>Employees</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('admin.employees.index') }}"> All Employees</a></li>
                            <li><a href="{{ route('admin.employees.create') }}"> Create Employee</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="uil uil-heartbeat me-2"></i>Service User</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('patients.index') }}"> All Service Users</a></li>
                            <li><a href="{{ route('patients.create') }}"> Add Service User</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="uil uil-user-circle me-2"></i>Care Plan</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('profile.setup.create') }}"> Setup</a></li>

                        </ul>
                    </div>
                </li>
            @endif

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="uil uil-question-circle me-2"></i>Questionnaires</a>
                <div class="sidebar-submenu">
                    <ul>
                        @if(auth()->check() && auth()->user()->role === 'employee')
                            <li><a href="{{ route('employee.employee_questionnaire') }}"> Fill Questionnaire</a></li>
                        @else
                            <li><a href="{{ route('admin.questionnaires.index') }}"> Employees Questionnaires</a></li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="uil uil-medical-drip me-2"></i>Medical Assessments</a>
                <div class="sidebar-submenu">
                    <ul>
                        @if(auth()->check() && auth()->user()->role === 'employee')
                            <li><a href="{{ route('employee.medical.assessments.create') }}">Fill Medical Assessment</a>
                            </li>
                        @else
                            <li><a href="{{ route('admin.medical-self-assessments.index') }}">View Results</a></li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="uil uil-file-bookmark-alt me-2"></i>Supported Documents</a>
                <div class="sidebar-submenu">
                    <ul>
                        @if(auth()->check() && auth()->user()->role === 'employee')
                            <li><a href="{{ route('employee.supported_documents.create') }}">Upload Supported Documents</a>
                            </li>
                        @else
                            <li><a href="{{ route('admin.supported_documents.index') }}">View Supported Documents</a></li>
                        @endif
                    </ul>
                </div>
            </li>

            @if(auth()->check() && auth()->user()->role === 'employee')
                <li class="">
                    <a href="{{ route('tasks.employee.index') }}"><i class="uil uil-clipboard-alt me-2"></i>My Tasks</a>
                </li>
            @endif

            <li class="">
                @if(auth()->check() && auth()->user()->role === 'employee')
                    <a href="{{ route('employee.timesheets.index') }}"><i class="uil uil-hourglass me-2"></i>My
                        Timesheets</a>
                @else
                    <a href="{{ route('admin.timesheets.index') }}"><i class="uil uil-hourglass me-2"></i>Timesheets</a>
                @endif
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="uil uil-file-contract me-2"></i>Policies</a>
                <div class="sidebar-submenu">
                    <ul>
                        @if(auth()->check() && auth()->user()->role === 'employee')
                            <li><a href="{{ route('ourPolicies') }}">Policies</a></li>
                        @else
                            <li><a href="{{ route('ourPolicies') }}">Policies</a></li>
                            <li><a href="{{ route('admin.policies.create') }}">Add Policy</a></li>
                        @endif
                    </ul>
                </div>
            </li>
        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->
