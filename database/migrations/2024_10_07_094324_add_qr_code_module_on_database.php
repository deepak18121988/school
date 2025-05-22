<?php

use App\InfixModuleManager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exist = InfixModuleManager::where('name', 'QRCodeAttendance')->first();
        if (!$exist) {
            $name = 'QRCodeAttendance';
            $s = new InfixModuleManager();
            $s->name = $name;
            $s->email = 'info@grpro.in';
            $s->notes = "Welcome to the QRCodeAttendance, Module: Thanks for using";
            $s->version = "1.0";
            $s->update_url = "https://grpro.in/contacts.php";
            $s->is_default = 0;
            $s->addon_url = "https://grpro.in/contacts.php";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
