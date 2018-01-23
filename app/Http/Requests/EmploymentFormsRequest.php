<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentFormsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'employer_name' => 'required',
            'location' => 'required',
            'department' => 'required',
            'budget_code' => 'required|min:2',
            'employee_name' => 'required|min:5',
            'employee_role' => 'required',
            'employee_signature' => 'required',
            'start_date' => 'required',
            'contract_type' => 'required',
            'hours_per_day' => 'required',
            'desk' => 'required',
            'chair' => 'required',
            'land_line' => 'required',
            'car' => 'required',
            'business_card' => 'required',
            'access_card' => 'required',
            'keys' => 'required',
            'desktop' => 'required',
            'laptop' => 'required',
            'network_printer' => 'required',
            'office_license' => 'required',
            'windows_license' => 'required',
            'specific_license' => 'required',
            'antivirus' => 'required',
            'modem_3g' => 'required',
            'internet' => 'required',
            'smartphone' => 'required',
            'mobile' => 'required',
            'voice_subscription' => 'required',
            'data_subscription' => 'required',
            'gsm_sim' => 'required',
            'ro_kpi' => 'required',
            //'ad_user' => 'required',
            //'ad_pass' => 'required',
            //'lotus_user' => 'required',
            //'lotus_pass' => 'required',
            'library_user' => 'required',
            'wizz_user' => 'required',
            'lotus_groups' => 'required',
            'tw_consultant' => 'required',
            'tw_recruiter' => 'required',
            'include_tb_ro' => 'required',
            'include_pl_ro' => 'required',
            'windows_groups' => 'required',
            //'laptop_model' => 'required',
            //'sn_laptop' => 'required',
            //'computername' => 'required',
            //'laptop_condition' => 'required',
            //'laptop_accessories' => 'required',
            //'laptop_accessories' => 'required',
            'approved_employment_budget'=>'required',
            'approved_acquisitions_budget'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'approved_employment_budget.required' => 'Nu ati selectat optiunea',
            'approved_acquisitions_budget.required' => 'Nu ati selectat optiunea',
            'employer_name.required' => 'Completati numele',
            'location.required'  => 'selectati Locatia',
            'department.required'  => 'completati nume departament',

            'budget_code.required'  => 'completati cod buget',
            'budget_code.min'  => 'minim 2 caractere cod buget',
            'employee_name.required'  => 'completati nume angajat',
            'employee_name.min'  => 'minim 2 caractere cod buget',
            'employee_role.required'  => 'selectati rolul angajatului',
            'employee_signature.required'  => 'selectati semnatura angajatului',
            'start_date.required'  => 'selectati data de incepere a angajatului',
            'contract_type.required'  => 'completati tipul de contract',
            'hours_per_day.required'  => 'completati programul de contract',
            'desk.required'  => 'selectati optiunea',
            'chair.required'  => 'selectati optiunea',
            'land_line.required'  => 'selectati optiunea',
            'car.required'  => 'selectati optiunea',
            'business_card.required'  => 'selectati optiunea',
            'access_card.required'  => 'selectati optiunea',
            'keys.required'  => 'selectati optiunea',
            'desktop.required'  => 'selectati optiunea',
            'laptop.required'  => 'selectati optiunea',
            'network_printer.required'  => 'selectati optiunea',
            'office_license.required'  => 'selectati optiunea',
            'windows_license.required'  => 'selectati optiunea',
            'specific_license.required'  => 'selectati optiunea',
            'antivirus.required'  => 'selectati optiunea',
            'modem_3g.required'  => 'selectati optiunea',
            'internet.required'  => 'selectati optiunea',
            'smartphone.required'  => 'selectati optiunea',
            'mobile.required'  => 'selectati optiunea',
            'voice_subscription.required'  => 'selectati optiunea',
            'data_subscription.required'  => 'selectati optiunea',
            'gsm_sim.required'  => 'selectati optiunea',
            'ro_kpi.required'  => 'selectati optiunea',
            'library_user.required'  => 'selectati optiunea',
            'wizz_user.required'  => 'selectati optiunea',
            'lotus_groups.required'  => 'selectati optiunea',
            'tw_consultant.required'  => 'selectati optiunea',
            'tw_recruiter.required'  => 'selectati optiunea',
            'include_tb_ro.required'  => 'selectati optiunea',
            'include_pl_ro.required'  => 'selectati optiunea',
            'windows_groups.required'  => 'selectati optiunea',


        ];
    }


}
