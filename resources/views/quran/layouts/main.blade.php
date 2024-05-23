@include('quran.partials.start')

{{-- @include('admin.partials.navbar') --}}
{{-- <div class="md:flex overflow-hidden dark:bg-gray-900"> --}}
    
    @include('quran.partials.sidebar')
    
    <div id="main-content"
    class="relative overflow-y-auto md:ml-64 min-h-screen">
        <main class="relative max-w-full">
            @yield('container')
        <main>


    </div>

{{-- </div> --}}
@include('quran.partials.end')
