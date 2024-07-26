<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Experience;
use App\Models\BankAccount;
use App\Models\Designation;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\EmployeeShift;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard_employee');
    }
    public function index()
    {
        if (auth()->user()->can('employee_view_own')) {
            $employee = Employee::where('id', auth()->user()->id)->get();
            return view('hrm.employee.index', compact('employee'));
        }
        if (auth()->user()->can('employee_view_all')) {
            $employee = Employee::all();
            return view('hrm.employee.index', compact('employee'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function create()
    {
        if (auth()->user()->can('employee_create')) {
            // $company = DB::table('company')->get()->all();
            $departments = Department::get()->all();
            $designations = Designation::get()->all();
            $offices = Office::get()->all();
            $company = Company::all();
            $employee = new Employee;
            return view('hrm.employee.create', compact('company', 'departments', 'designations', 'offices', 'employee'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('employee_create')) {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'required',
                'office' => 'required|exists:office_shift,id',
                'designation' => 'required|exists:designation,id',
                'department' => 'required|exists:departments,id',
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string',
                'country' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'province' => 'nullable|string|max:255',
                'zip' => 'nullable|string|max:20',
                'family_status' => 'required',
                'gender' => ['nullable', Rule::in(['male', 'female'])],
                'employment_type' => ['nullable', Rule::in(['full_time', 'part_time', 'self_employed', 'contract', 'internship', 'seasonal'])],
                'birth_date' => 'nullable|date',
                'join_date' => 'nullable|date',
                'leaving_date' => 'nullable|date',
                'annual_leave' => 'nullable|numeric',
                'remaining_leave' => 'nullable|numeric',
                'hourly_late' => 'nullable|numeric',
                'salaray' => 'nullable|numeric',
                'company' => 'required|exists:company,id',
                'skype' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'whatsApp' => 'nullable|string|max:255',
                'linkedIn' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'bank_name' => 'required|string|max:255',
                'bank_branch' => 'required|string|max:255',
                'bank_no' => 'required|string|max:255',
                'bank_detail' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'start_date' => 'required|string|max:255',
                'finish_date' => 'string|max:255',
                'description' => 'nullable|string|max:255',
            ]);

            $employee = new Employee();
            $employee->fill($validatedData);
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->phone = $request->phone;
            $employee->office_id = $request->office;
            $employee->designation_id = $request->designation;
            $employee->department_id = $request->department;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->country = $request->country;
            $employee->city = $request->city;
            $employee->province = $request->province;
            $employee->zip = $request->zip;
            $employee->family_status = $request->family_status;
            $employee->gender = $request->gender;
            $employee->employment_type = $request->employment_type;
            $employee->birth_date = $request->birth_date;
            $employee->join_date = $request->join_date;
            $employee->leaving_date = $request->leaving_date;
            $employee->annual_leave = $request->annual_leave;
            $employee->remaining_leave = $request->remaining_leave;
            $employee->hourly_late = $request->hourly_late;
            $employee->salary = $request->salaray;
            $employee->company_id = $request->company;
            $employee->save();


            $social = new SocialMedia();
            $social->fill($validatedData);
            $social->skype = $request->skype;
            $social->whatsapp = $request->whatsApp;
            $social->facebook = $request->facebook;
            $social->linkedin = $request->linkedIn;
            $social->twitter = $request->twitter;
            $social->emp_id = $employee->id;
            $social->save();


            $bank = new BankAccount();
            $bank->fill($validatedData);
            $bank->bank_name = $request->bank_name;
            $bank->bank_branch = $request->bank_branch;
            $bank->bank_no = $request->bank_no;
            $bank->details = $request->bank_detail;
            $bank->emp_id = $employee->id;
            $bank->save();


            $experience = new Experience();
            $experience->fill($validatedData);
            $experience->title = $request->title;
            $experience->company_name = $request->company_name;
            $experience->location = $request->location;
            $experience->start_date = $request->start_date;
            $experience->finish_date = $request->finish_date;
            $experience->employment_type = $request->employment_type;
            $experience->description = $request->description;
            $experience->emp_id = $employee->id;
            $experience->save();

            return redirect(route('employee.index'))->with('success', 'Employee created successfully!');
        }
        return abort('403', __('You are not authorized'));
    }

    public function getData(Request $request)
    {
        if (auth()->user()->can('employee_view_own')) {
            $employees = Employee::where('user_id', auth()->user()->id)->with(['office', 'designation', 'department'])->get();
            return response()->json(['data' => $employees]);
        }
        if (auth()->user()->can('employee_view_all')) {
            if($request->start_date && $request->end_date){
                $employees = Employee::getData;
                return response()->json(['data' => $employees]);
            }
            $employees = Employee::with(['office', 'designation', 'department'])->get();
            return response()->json(['data' => $employees]);
        }
        return abort('403', __('You are not authorized'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->can('employee_edit') && auth()->user()->can('employee_view_all')) {
            $company = Company::all();
            $departments = Department::get()->all();
            $designations = Designation::get()->all();
            $offices = Office::get()->all();
            $employee = Employee::findOrFail($id);

            $social = SocialMedia::where('emp_id', $id)->first();

            $bank = BankAccount::where('emp_id', $id)->first();
            $experience = Experience::where('emp_id', $id)->first();
            return view('hrm.employee.edit', compact('employee', 'social', 'bank', 'experience', 'company', 'departments', 'designations', 'offices'));
        }

        if (auth()->user()->can('employee_edit') && auth()->user()->can('employee_view_own')) {
            $company = DB::table('company')->get()->all();
            $departments = Department::get()->all();
            $designations = Designation::get()->all();
            $offices = Office::get()->all();
            $employee = Employee::findOrFail($id);
            $social = SocialMedia::where('emp_id', $id)->first();
            $bank = BankAccount::where('emp_id', $id)->first();
            $experience = Experience::where('emp_id', $id)->first();

            if ($employee->user_id != auth()->user()->id) {
                return abort('403', __('You are not authorized'));
            }
            return view('hrm.employee.edit', compact('employee', 'social', 'bank', 'experience', 'company', 'departments', 'designations', 'offices'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->can('employee_edit')) {
            $validatedData = $request->validate([
                'first_name' => 'string|max:255',
                'last_name' => 'string|max:255',
                'phone' => '',
                'office' => 'exists:office_shift,id',
                'designation' => 'exists:designation,id',
                'department' => 'exists:departments,id',
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string',
                'country' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'province' => 'nullable|string|max:255',
                'zip' => 'nullable|string|max:20',
                'family_status' => 'nullable',
                'gender' => ['nullable', Rule::in(['male', 'female'])],
                'employment_type' => ['nullable', Rule::in(['full_time', 'part_time', 'self_employed', 'contract', 'internship', 'seasonal'])],
                'birth_date' => 'nullable|date',
                'join_date' => 'nullable|date',
                'leaving_date' => 'nullable|date',
                'annual_leave' => 'nullable|numeric',
                'remaining_leave' => 'nullable|numeric',
                'hourly_late' => 'nullable|numeric',
                'salaray' => 'nullable|numeric',
                'company' => 'exists:company,id',
                'skype' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'whatsApp' => 'nullable|string|max:255',
                'linkedIn' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'bank_name' => 'string|max:255',
                'bank_branch' => 'string|max:255',
                'bank_no' => 'string|max:255',
                'bank_detail' => 'string|max:255',
                'title' => 'string|max:255',
                'company_name' => 'string|max:255',
                'location' => 'string|max:255',
                'start_date' => 'string|max:255',
                'finish_date' => 'string|max:255',
                'description' => 'nullable|string|max:255',
            ]);

            $employee = Employee::findOrFail($id);
            $employee->fill($validatedData);

            // Update the fields
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->phone = $request->phone;
            $employee->office_id = $request->office;
            $employee->designation_id = $request->designation;
            $employee->department_id = $request->department;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->country = $request->country;
            $employee->city = $request->city;
            $employee->province = $request->province;
            $employee->zip = $request->zip;
            $employee->family_status = $request->family_status;
            $employee->gender = $request->gender;
            $employee->employment_type = $request->employment_type;
            $employee->birth_date = $request->birth_date;
            $employee->join_date = $request->join_date;
            $employee->leaving_date = $request->leaving_date;
            $employee->annual_leave = $request->annual_leave;
            $employee->remaining_leave = $request->remaining_leave;
            $employee->hourly_late = $request->hourly_late;
            $employee->salary = $request->salaray;
            $employee->company_id = $request->company;
            $employee->save();

            $social = SocialMedia::where('emp_id', $employee->id)->firstOrNew([]);
            $social->fill($validatedData);
            $social->skype = $request->skype;
            $social->whatsapp = $request->whatsApp;
            $social->facebook = $request->facebook;
            $social->linkedin = $request->linkedIn;
            $social->twitter = $request->twitter;
            $social->emp_id = $employee->id;
            $social->save();


            $bank = BankAccount::where('emp_id', $employee->id)->firstOrNew([]);
            $bank->fill($validatedData);
            $bank->bank_name = $request->bank_name;
            $bank->bank_branch = $request->bank_branch;
            $bank->bank_no = $request->bank_no;
            $bank->details = $request->bank_detail;
            $bank->emp_id = $employee->id;
            $bank->save();


            $experience = Experience::where('emp_id', $employee->id)->firstOrNew([]);
            $experience->fill($validatedData);
            $experience->title = $request->title;
            $experience->company_name = $request->company_name;
            $experience->location = $request->location;
            $experience->start_date = $request->start_date;
            $experience->finish_date = $request->finish_date;
            $experience->employment_type = $request->employment_type;
            $experience->description = $request->description;
            $experience->emp_id = $employee->id;
            $experience->save();
            return redirect(route('employee.index'))->with('success', 'Employee updated successfully!');
        }
        return abort('403', __('You are not authorized!'));
    }

    public function deleteEmployee(Request $request)
    {
        if (auth()->user()->can('employee_delete')) {
            $employee = Employee::findOrFail($request->id);

            if ($employee) {
                $employee->delete();
                return response()->json(['message' => 'Employee deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'Employee not found'], 404);
            }
        }
        return abort('403', __('You are not authorized!'));
    }
    public function show($id)
    {
        if (auth()->user()->can('employee_view_all')) {
            $office_id = Employee::where('id', $id)->pluck('office_id');
            $designation_id = Employee::where('id', $id)->pluck('designation_id');
            $department_id = Employee::where('id', $id)->pluck('department_id');

            $company = Company::all();
            $departments = Department::where('id', $department_id)->first();
            $designations = Designation::where('id', $designation_id)->first();
            $office = Office::where('id', $office_id)->first();

            $employee = Employee::findOrFail($id);
            $social = SocialMedia::where('emp_id', $id)->first();
            $bank = BankAccount::where('emp_id', $id)->first();
            $experience = Experience::where('emp_id', $id)->first();
            return view('hrm.employee.show1', compact('employee', 'social', 'bank', 'experience', 'company', 'departments', 'designations', 'office'));
        }
        if (auth()->user()->can('employee_view_own')) {
            $employee = Employee::findOrFail($id);
            $office_id = Employee::where('id', $id)->pluck('office_id');
            $designation_id = Employee::where('id', $id)->pluck('designation_id');
            $department_id = Employee::where('id', $id)->pluck('department_id');
            $company = Company::all();
            $departments = Department::where('id', $department_id)->first();
            $designations = Designation::where('id', $designation_id)->first();
            $office = Office::where('id', $office_id)->first();
            $social = SocialMedia::where('emp_id', $id)->first();
            $bank = BankAccount::where('emp_id', $id)->first();
            $experience = Experience::where('emp_id', $id)->first();

            if ($employee->user_id != auth()->user()->id) {
                return abort('403', __('You are not authorized!'));
            } else {

                return view('hrm.employee.show1', compact('employee', 'social', 'bank', 'experience', 'company', 'departments', 'designations', 'office'));
            }
        }
        return abort('403', __('You are not authorized!'));
    }

    // public function employeesPrint(Request $request)
    // {
    //     $filteredData = json_decode($request->query('data'), true);


    //     return view('hrm.employee.employees_print')->with('filteredData', $filteredData);
    // }



}
