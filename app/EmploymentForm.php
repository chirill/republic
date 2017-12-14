<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmploymentForm extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'sheet_id',
        'manager_id',
        'form_applicant',
        'status',
        'form_type',
        'employer_name',
        'location',
        'department',
        'budget_code',
        'employee_name',
        'employee_role',
        'employee_signature',
        'employee_manager',
        'start_date',
        'contract_type',
        'hours_per_day',
        'desk',
        'chair',
        'land_line',
        'car',
        'business_card',
        'access_card',
        'keys',
        'desktop',
        'laptop',
        'network_printer',
        'office_license',
        'windows_license',
        'specific_license',
        'antivirus',
        'modem_3g',
        'internet',
        'smartphone',
        'mobile',
        'voice_subscription',
        'data_subscription',
        'gsm_sim',
        'ro_kpi',
        'library_user',
        'wizz_user',
        'lotus_groups',
        'tw_consultant',
        'tw_recruiter',
        'include_tb_ro',
        'include_pl_ro',
        'windows_groups',
        'approved_employment_budget',
        'approved_acquisitions_budget',
        'description',
        'laptop_model',
        'sn_laptop',
        'computername',
        'laptop_condition',
        'laptop_accessories',
        'phone_model',
        'phone_sn',
        'phone_name',
        'phone_condition',
        'phone_accessories',
        'phone_number',
        'assigned_by',
        'ad_user',
        'ad_pass',
        'lotus_user',
        'lotus_pass',
        'leave_date',
        'redirect_mail_to',
        'redirect_mail_date',
        'handing_over_equipment',
    ];
    //protected $dates = ['start_date'];
    protected $casts = [
        'lotus_groups'=>'array',
        'windows_groups' => 'array',
    ];

}
