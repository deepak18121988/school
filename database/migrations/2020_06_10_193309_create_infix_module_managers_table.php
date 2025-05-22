<?php

use App\InfixModuleManager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\Log;

class CreateInfixModuleManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infix_module_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('notes', 255)->nullable();
            $table->string('version', 200)->nullable();
            $table->string('update_url', 200)->nullable();
            $table->string('purchase_code', 200)->nullable();
            $table->string('checksum', 200)->nullable();
            $table->string('installed_domain', 200)->nullable();
            $table->boolean('is_default')->default(0);
            $table->string('addon_url')->nullable();
            $table->date('activated_date')->nullable();
            $table->integer('lang_type')->nullable();
            $table->timestamps();
        });

        try {
            // RolePermission
            $dataPath = 'Modules/RolePermission/RolePermission.json';
            $name = 'RolePermission';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //MenuManage

            $dataPath = 'Modules/MenuManage/MenuManage.json';
            $name = 'MenuManage';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->is_default = 1;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            //BulkPrint

            $dataPath = 'Modules/BulkPrint/BulkPrint.json';
            $name = 'BulkPrint';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->is_default = 1;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            // Lesson Planner
            $dataPath = 'Modules/Lesson/Lesson.json';
            $name = 'Lesson';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->is_default = 1;
            $s->version = $version;
            $s->update_url = $url;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            // Chat
            $dataPath = 'Modules/Chat/Chat.json';
            $name = 'Chat';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            // TemplateSettings
            $dataPath = 'Modules/TemplateSettings/TemplateSettings.json';
            $name = 'TemplateSettings';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // StudentAbsentNotification
            $dataPath = 'Modules/StudentAbsentNotification/StudentAbsentNotification.json';
            $name = 'StudentAbsentNotification';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            // Zoom
            $name = 'Zoom';
            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = "This is Zoom module for live virtual class and meeting in this system at a time. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // OnlineExam
            $name = 'OnlineExam';
            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = "This is OnlineExam module for take online exam Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "mailto:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // ParentRegistration
            $name = 'ParentRegistration';
            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = "This is Parent Registration module for Registration. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = 'https://grpro.in/contacts.php';
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // RazorPay
            $dataPath = 'Modules/RazorPay/RazorPay.json';
            $name = 'RazorPay';

            $s = new InfixModuleManager();
            $s->name = 'RazorPay';
            $s->email = 'info@grpro.in';
            $s->notes = "This is Razor Pay module for Online payemnt. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // BigBlueButton
            $name = 'BBB';
            $s = new InfixModuleManager();
            $s->name = 'BBB';
            $s->email = 'info@grpro.in';
            $s->notes = "This is BigBlueButton module for live virtual class and meeting in this system at a time. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "mailto:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // Jitsi
           
            $name = 'Jitsi';
            $s = new InfixModuleManager();
            $s->name = 'Jitsi';
            $s->email = 'info@grpro.in';
            $s->notes = "This is Jitsi module for live virtual class and meeting in this system at a time. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "mailto:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            // Saas
           
            $name = 'Saas';
            $s = new InfixModuleManager();
            $s->name = 'Saas';
            $s->email = 'info@grpro.in';
            $s->notes = "This is Saas module for manage multiple school or institutes.Every school managed by individual admin. Thanks for using.";
            $s->version = "1.1";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;           
            $s->addon_url = "mailto:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            // BulkPrint
            $bulk_print = 'BulkPrint';
            $bulk_print = new InfixModuleManager();
            $bulk_print->name = 'BulkPrint';
            $bulk_print->email = 'info@grpro.in';
            $bulk_print->notes = "This is Bulkprint module for print invoice ,certificate and id card. Thanks for using.";
            $bulk_print->version = "1.0";
            $bulk_print->update_url = "https://grpro.in/contacts.php";
            $bulk_print->is_default = 1;
            $bulk_print->addon_url = "https://codecanyon.net/item/infixedu-zoom-live-class/27623128?s_rank=12";
            $bulk_print->installed_domain = url('/');
            $bulk_print->activated_date = date('Y-m-d');
            $bulk_print->save();

            // HimalayaSms
            $HimalayaSms = 'HimalayaSms';
            $HimalayaSms = new InfixModuleManager();
            $HimalayaSms->name = "HimalayaSms";
            $HimalayaSms->email = 'info@grpro.in';
            $HimalayaSms->notes = "This is sms gateway module for sending sms via api. Thanks for using.";
            $HimalayaSms->version = "1.0";
            $HimalayaSms->update_url = "https://grpro.in/contacts.php";
            $HimalayaSms->is_default = 1;
            $HimalayaSms->addon_url = "mailto:info@grpro.in";
            $HimalayaSms->installed_domain = url('/');
            $HimalayaSms->activated_date = date('Y-m-d');
            $HimalayaSms->save();

            // XenditPayment
            $XenditPayment = 'XenditPayment';
            $XenditPayment = new InfixModuleManager();
            $XenditPayment->name = 'XenditPayment';
            $XenditPayment->email = 'info@grpro.in';
            $XenditPayment->notes = "This is online payment gateway module for specially indonesian currency. Thanks for using.";
            $XenditPayment->version = "1.0";
            $XenditPayment->update_url = "https://grpro.in/contacts.php";
            $XenditPayment->is_default = 1;
            $XenditPayment->addon_url = "mailto:info@grpro.in";
            $XenditPayment->installed_domain = url('/');
            $XenditPayment->activated_date = date('Y-m-d');
            $XenditPayment->save();

             // AppSlider
             $XenditPayment = 'AppSlider';
             $XenditPayment = new InfixModuleManager();
             $XenditPayment->name = 'AppSlider';
             $XenditPayment->email = 'info@grpro.in';
             $XenditPayment->notes = "This is for school affiliate banner for mobile app. Thanks for using.";
             $XenditPayment->version = "1.0";
             $XenditPayment->update_url = "https://grpro.in/contacts.php";
             $XenditPayment->is_default = 0;
             $XenditPayment->addon_url = "mailto:info@grpro.in";
             $XenditPayment->installed_domain = url('/');
             $XenditPayment->activated_date = date('Y-m-d');
             $XenditPayment->save();

             //KhaltiPayment
            $s = new InfixModuleManager();
            $s->name = "KhaltiPayment";
            $s->email = 'info@grpro.in';
            $s->notes = "Khalti Is A Online Payment Gatway Module For Collect Fees Online";
            $s->version = 1.0;
            $s->update_url = "info@grpro.in";
            $s->is_default = 0;
            $s->purchase_code = null;
            $s->installed_domain = null;
            $s->activated_date = null;
            $s->save();

            //Raudhahpay
            $s = new InfixModuleManager();
            $s->name = 'Raudhahpay';
            $s->email = 'info@grpro.in';
            $s->notes = "This is Saas module for Online Payment. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "mailto:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

             // Wallet
            $dataPath = 'Modules/Wallet/Wallet.json';
            $name = 'Wallet';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

             // Fees
            $dataPath = 'Modules/Fees/Fees.json';
            $name = 'Fees';
            $strJsonFileContents = file_get_contents($dataPath);
            $array = json_decode($strJsonFileContents, true);

            $version = $array[$name]['versions'][0];
            $url = $array[$name]['url'][0];
            $notes = $array[$name]['notes'][0];

            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = $notes;
            $s->version = $version;
            $s->update_url = $url;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            $s = new InfixModuleManager();
            $s->name = 'ExamPlan';
            $s->email = 'info@grpro.in';
            $s->notes = "Exam Plan and Seat Plan Module";
            $s->version = 1.0;
            $s->update_url = url('/');;
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //InfixBiometrics 
            $s = new InfixModuleManager();
            $s->name = "InfixBiometrics";
            $s->email = 'info@grpro.in';
            $s->notes = "This is InfixBiometrics module for live virtual class and meeting in this system at a time. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

             //Gmeet 
             $s = new InfixModuleManager();
             $s->name = "Gmeet";
             $s->email = 'info@grpro.in';
             $s->notes = "This is Gmeet module for live virtual class and meeting in this system at a time. Thanks for using.";
             $s->version = "1.0";
             $s->update_url = "https://grpro.in/contacts.php";
             $s->is_default = 0;
             $s->addon_url = "https://grpro.in/contacts.php";
             $s->installed_domain = url('/');
             $s->activated_date = date('Y-m-d');
             $s->save();


             //Phonepay 
             $s = new InfixModuleManager();
             $s->name = "PhonePay";
             $s->email = 'info@grpro.in';
             $s->notes = "This is PhonePay module for manage Phonepe  online payment gateway . Thanks for using.";
             $s->version = "1.0";
             $s->update_url = "https://grpro.in/contacts.php";
             $s->is_default = 0;
             $s->addon_url = "https://grpro.in/contacts.php";
             $s->installed_domain = url('/');
             $s->activated_date = date('Y-m-d');
             $s->save();

            //BehaviourRecords 
            $s = new InfixModuleManager();
            $s->name = "BehaviourRecords";
            $s->email = 'info@grpro.in';
            $s->notes = "This is Behaviour Records Module for manage student behaviour records & Activity. Thanks for using .";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //DownloadCenter 
            $s = new InfixModuleManager();
            $s->name = "DownloadCenter";
            $s->email = 'info@grpro.in';
            $s->notes = "This Module is named Download Center for managing study materials more efficiently. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //  //DownloadCenter 
            //  $s = new InfixModuleManager();
            //  $s->name = "DownloadCenter";
            //  $s->email = 'info@grpro.in';
            //  $s->notes = "This Module is named Download Center for managing study materials more efficiently. Thanks for using.";
            //  $s->version = "1.0";
            //  $s->update_url = "https://grpro.in/contacts.php";
            //  $s->is_default = 0;
            //  $s->purchase_code = time();
            //  $s->addon_url = "https://grpro.in/contacts.php";
            //  $s->installed_domain = url('/');
            //  $s->activated_date = date('Y-m-d');
            //  $s->save();
        

            //TwoFactorAuth 
            $s = new InfixModuleManager();
            $s->name = "TwoFactorAuth";
            $s->email = 'info@grpro.in';
            $s->notes = "This is TwoFactorAuth module for verfication two factor authentication code using email or text sms. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 1;
            $s->purchase_code = time();
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


            //Lms
            $name = 'Lms';
            $s = new InfixModuleManager();
            $s->name = 'Lms';
            $s->email = 'info@grpro.in';
            $s->notes = "This is Lms module for learning management. Teacher & Admin Can create course and student & parent can enroll using online & offline payment gateway . Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "mailto:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //CcAveune 
            $s = new InfixModuleManager();
            $s->name = "CcAveune";
            $s->email = 'info@grpro.in';
            $s->notes = "This CcAveune Module For InfixEdu . Manage online payment for fees & wallet.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "maito:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //AiContent 
            $s = new InfixModuleManager();
            $s->name = "AiContent";
            $s->email = 'info@grpro.in';
            $s->notes = "This is AI Content Generator module. Generate content via AI.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "maito:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();

            //WhatsappSupport 
            $s = new InfixModuleManager();
            $s->name = "WhatsappSupport";
            $s->email = 'info@grpro.in';
            $s->notes = "This is WhatsApp Support module. Send message via WhatsApp.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "maito:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();


        // Certificate
            $s = new InfixModuleManager();
            $s->name = 'Certificate';
            $s->email = 'info@grpro.in';
            $s->notes = "This is the module to generate Certificate's for students and employees.";
            $s->is_default = 0;
            $s->version = '1.0' ;
            $s->update_url = "maito:info@grpro.in";
            $s->purchase_code = null;
            $s->installed_domain = null;
            $s->activated_date = null;
            $s->save();

            //InAppLiveClass 
            $s = new InfixModuleManager();
            $s->name = "InAppLiveClass";
            $s->email = 'info@grpro.in';
            $s->notes = "This InAppLiveClass Module For GRpro . Manage Online Class and Meeting Reports.";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "maito:info@grpro.in";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();
            
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infix_module_managers');
    }
}