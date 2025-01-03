{{-- @extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Our Engineers</h2>
    <div class="row">
        <!-- التحقق إذا كان هناك مهندسين -->
        @if($engineer->count() > 0)
            @foreach($engineer as $engineer)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm">
                        <!-- صورة المهندس -->
                        <img src="{{ asset($engineer->personal_photo) }}" class="card-img-top" alt="{{ $engineer->name }}">
                        
                        <div class="card-body">
                            <!-- اسم المهندس -->
                            <h5 class="card-title">{{ $engineer->name }}</h5>
                            
                            <!-- تخصص المهندس -->
                            <p class="card-text text-muted">{{ $engineer->field }}</p>
                            
                            <!-- وصف المهندس -->
                            <p class="card-text">{{ Str::limit($engineer->about, 50, '...') }}</p>
                            
                            <!-- رابط التفاصيل -->
                            <a href="{{ route('engineers.show', $engineer->id) }}" class="text-primary">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No engineers available at the moment.</p>
        @endif
    </div>
</div>

<!-- إضافة ستايل داخل الصفحة -->
<style>
    .card-img-top {
        width: 100%; /* جعل الصورة تملأ العرض بالكامل */
        height: 200px; /* تحديد ارتفاع ثابت للصور */
        object-fit: cover; /* لضمان قص الصور بدلاً من تشويهها */
    }

    .card {
        margin-bottom: 20px; /* مسافة بين البطاقات */
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
    }

    a.text-primary {
        text-decoration: none; /* إزالة الخط السفلي */
        font-weight: bold;
    }

    a.text-primary:hover {
        text-decoration: underline; /* خط تحت النص عند التمرير */
        color: #097943; /* لون أغمق عند التمرير */
    }
</style>
@endsection --}}