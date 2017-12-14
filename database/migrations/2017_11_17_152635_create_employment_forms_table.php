<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sheet_id')->unsigned();
            $table->integer('manager_id')->unsigned();
            $table->string('form_applicant')->nullable();
            $table->string('status')->nullable();
            $table->string('form_type')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->string('budget_code')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('employee_role')->nullable();
            $table->string('employee_signature')->nullable();
            $table->string('employee_manager')->nullable();
            $table->date('start_date')->nullable();
            $table->string('contract_type')->nullable();
            $table->integer('hours_per_day')->unsigned()->nullable();
            $table->enum('desk',['DA','NU'])->nullable();
            $table->enum('chair',['DA','NU'])->nullable();
            $table->enum('land_line',['DA','NU'])->nullable();
            $table->enum('car',['DA','NU'])->nullable();
            $table->enum('business_card',['DA','NU'])->nullable();
            $table->enum('access_card',['DA','NU'])->nullable();
            $table->enum('keys',['DA','NU'])->nullable();
            $table->enum('desktop',['DA','NU'])->nullable();
            $table->enum('laptop',['DA','NU'])->nullable();
            $table->enum('network_printer',['DA','NU'])->nullable();
            $table->enum('office_license',['DA','NU'])->nullable();
            $table->enum('windows_license',['DA','NU'])->nullable();
            $table->enum('specific_license',['DA','NU'])->nullable();
            $table->enum('antivirus',['DA','NU'])->nullable();
            $table->enum('modem_3g',['DA','NU'])->nullable();
            $table->enum('internet',['DA','NU'])->nullable();
            $table->enum('smartphone',['DA','NU'])->nullable();
            $table->enum('mobile',['DA','NU'])->nullable();
            $table->enum('voice_subscription',['DA','NU'])->nullable();
            $table->enum('data_subscription',['DA','NU'])->nullable();
            $table->enum('gsm_sim',['DA','NU'])->nullable();
            $table->enum('ro_kpi',['DA','NU'])->nullable();
            $table->enum('library_user',['DA','NU'])->nullable();
            $table->string('ad_user')->nullable();
            $table->string('ad_pass')->nullable();
            $table->string('lotus_user')->nullable();
            $table->string('lotus_pass')->nullable();
            $table->string('wizz_user')->nullable();
            $table->string('lotus_groups')->nullable();
            $table->enum('tw_consultant',['DA','NU'])->nullable();
            $table->enum('tw_recruiter',['DA','NU'])->nullable();
            $table->enum('include_tb_ro',['DA','NU'])->nullable();
            $table->enum('include_pl_ro',['DA','NU'])->nullable();
            $table->string('windows_groups')->nullable();
            $table->string('laptop_model')->nullable();
            $table->string('sn_laptop')->nullable();
            $table->string('computername')->nullable();
            $table->string('laptop_condition')->nullable();
            $table->string('laptop_accessories')->nullable();
            $table->string('phone_model')->nullable();
            $table->string('phone_sn')->nullable();
            $table->string('phone_name')->nullable();
            $table->string('phone_condition')->nullable();
            $table->string('phone_accessories')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('leave_date')->nullable();
            $table->string('redirect_mail_to')->nullable();
            $table->string('redirect_mail_date')->nullable();
            $table->string('handing_over_equipment')->nullable();
            $table->string('assigned_by')->nullable();
            $table->string('description')->nullable();
            $table->enum('approved_employment_budget',['DA','NU'])->nullable();
            $table->enum('approved_acquisitions_budget',['DA','NU'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employments');
    }
}

