<!DOCTYPE html>
<html>

<head>
    <title>Edit | Page</title>
    <!-- Bootstrap 5.3 Here -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="shortcut icon" href="{{ asset('s-logo-png.jpg') }}" type="image/x-icon">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h2 class="text-center mt-5">
                    Edit This Person
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-recycle" viewBox="0 0 16 16">
                        <path
                            d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z" />
                    </svg>
                </h2>
                @foreach ($peoples as $people)
                    <form action="{{ route('update.people', $people->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <img src="{{ asset($people->image) }}" width="150px" height="150px"
                            class="rounded mx-auto d-block mt-3" alt="{{ asset($people->image) }}">
                        <div class="mb-3 mt-3">
                            <input type="text" name="fullname" value="{{ $people->fullname }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="email" name="email" value="{{ $people->email }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" name="phone" value="{{ $people->phone }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" name="address" value="{{ $people->address }}" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" name="about" value="{{ $people->about }}" maxlength="255"
                                class="form-control">
                        </div>
                        <button type="submit" name="ok" class="btn btn-warning mt-5">Change Informations
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-recycle" viewBox="0 0 16 16">
                                <path
                                    d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z" />
                            </svg>
                        </button>
                    </form>
                    <div class="col-10 offset-10 mt-3">
                        <a href="{{ route('main.page') }}" class="btn btn-primary mt-5">Back to Main Page
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="footer mt-5">
        <div class="row mt-5">

        </div>
    </div>
    <div class="footer mt-5">
        <div class="row mt-5">

        </div>
    </div>



    {{-- Toastr --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>

</html>
