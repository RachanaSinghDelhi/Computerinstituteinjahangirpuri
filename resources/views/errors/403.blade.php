
@section('title', 'Errors')

@section('content')
    <div class="container">
        <h1>403 - Forbidden</h1>
        <p>You are not authorized to access this page.</p>
        <a href="{{ url('/') }}">Return to Home</a>
    </div>
@endsection