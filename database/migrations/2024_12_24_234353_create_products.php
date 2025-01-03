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
       Schema::create('products', function (Blueprint $table) {
        $table->id(); // الرقم التعريفي
        $table->string('name'); // اسم المنتج
        $table->decimal('price', 10, 2); // سعر المنتج
        $table->text('description')->nullable(); // وصف المنتج (اختياري)
        $table->string('image')->nullable(); // رابط لصورة المنتج
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // الفئة المرتبطة
        $table->timestamps(); // أعمدة الوقت
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // التأكد من وجود الجدول قبل محاولة حذف العمود
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                // حذف العمود image إذا كان موجودًا
                if (Schema::hasColumn('products', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }
};

