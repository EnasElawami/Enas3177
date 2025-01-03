<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->id(); // الرقم التعريفي للمهندس
            $table->string('name'); // اسم المهندس
            $table->string('email')->unique(); // البريد الإلكتروني
            $table->string('password'); // كلمة المرور
            $table->string('city'); // المدينة
            $table->string('field'); // التخصص
            $table->text('about')->nullable(); // وصف المهندس
            $table->string('personal_photo')->nullable(); // الصورة الشخصية
            $table->json('uploaded_pictures')->nullable(); // الصور المرفوعة (كمصفوفة JSON)
            $table->timestamps(); // أعمدة الوقت (created_at و updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ____________________________________________________________

          // التأكد من وجود الجدول قبل محاولة حذف العمود
          if (Schema::hasTable('engineer')) {
            Schema::table('engineer', function (Blueprint $table) {
                // حذف العمود image إذا كان موجودًا
                if (Schema::hasColumn('engineer', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
        // ____________________________________________________________
        // Schema::dropIfExists('engineer');
    }
};
