<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TCT Members</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Vite -->
    @vite(['resources/scss/styles.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        .tct-title-primary {
            font-size: 24px;
        }

        .tct-title-secondary {
            font-size: 20px;
        }
    </style>
</head>
<body class="container py-4 px-3 mx-auto">

<nav class="navbar bg-light">
    <div class="container-fluid">
        <h1 class="navbar-brand mb-0 tct-title-primary">TCT</h1>
    </div>
</nav>

<div class="tct-wrapper row mt-4">
    <div class="tct-schools-list col-4">

        <!-- List all schools -->
        <h3 class="tct-title-secondary">
            All Schools

            @if(isset($hasSelection))
                <a href="{{ route('home') }}" class="mx-2 badge text-dark bg-info bg-opacity-25 border-dark rounded-3">Clear
                    selection</a>
            @endif
        </h3>

        <ul class="list-group list-group-flush mt-4 ">
            @forelse($schools as $school)

                @if(isset($selectedSchoolId) && $selectedSchoolId == $school->id)
                    <a href="{{ route('members.by-school', $school->id) }}" class="list-group-item  row"
                       aria-current="true">
                        <span>{{ $school->name }}</span>
                        <span class="badge bg-info bg-opacity-25 text-dark">{{"   "}}</span>
                    </a>
                @else
                    <a href="{{ route('members.by-school', $school->id) }}" class="list-group-item" aria-current="true">
                        <span>{{ $school->name }}</span>
                    </a>
                @endif

            @empty
                <li>No Schools</li>
            @endforelse
        </ul>
        <!-- End List all schools -->
    </div>

    <div class="tct-members-list col-8">

        <div class="row justify-content-between">
            @if(isset($hasSelection) && isset($selectedSchool))
                <h3 class="col-8 tct-title-secondary">Members Associated with: <span
                        class="fw-normal fst-italic">{{ $selectedSchool }}</span></h3>
            @else
                <h3 class="col-8 tct-title-secondary">All Members</h3>
            @endif

            <button type="button" class="col-2 mx-2 btn btn-sm btn-outline-secondary " data-bs-toggle="modal"
                    data-bs-target="#memberModal">Add Member
            </button>
            <!-- Include the modal with the form to add a new member -->
            @include('partials.add-member-modal')
        </div>

        <!-- List all members -->
        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">School (s)</th>
            </tr>
            </thead>
            <tbody>
            @forelse($members as $index => $member)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <ol class="list-group list-group-flush list-group-numbered">
                            @foreach($member->schools as $school)
                                <li class="list-group-item border-0 fw-bold">{{ $school->name }}</li>
                            @endforeach
                        </ol>
                    </td>
                </tr>
            @empty
                <p>No Members</p>
            @endforelse
            </tbody>
        </table>

        {{ $members->links() }}
        <!-- End List all members -->
    </div>
</div>

</body>
</html>
