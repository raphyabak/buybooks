@section('body')
    <main class="my-8">
        <div class="container px-6 mx-auto text-center">
            @include('success')

            <a href="{{ route('home') }}"
                class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none">
                Go Home
            </a>

        </div>
    </main>

@endsection
