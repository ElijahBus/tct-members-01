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
        <span class="navbar-brand mb-0 h1">TCT</span>
    </div>
</nav>

<div class="tct-wrapper row mt-4">
    <div class="tct-schools-list col-4">

        <!-- List all schools -->
        <h3 class="tct-title-secondary">
            All Schools
            <a href="#" class="mx-2 badge text-dark bg-info bg-opacity-25 border-dark rounded-3">Clear selection</a>
        </h3>

        <ul class="list-group list-group-flush mt-4 ">
            <li class="list-group-item row" aria-current="true">
                <span>TCT University</span>
                <span class="badge bg-info bg-opacity-25 text-dark">{{"   "}}</span>
            </li>
            <li class="list-group-item">Cambridge School</li>
            <li class="list-group-item">Inter College</li>
            <li class="list-group-item">Young Foundation School</li>
        </ul>
        <!-- End List all schools -->
    </div>

    <div class="tct-members-list col-8">

        <div class="row justify-content-between">
            <h3 class="col-8 tct-title-secondary">All Members</h3>

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
                <th scope="col">School</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Elie</td>
                <td>elie@tct.com</td>
                <td>TCT University</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Marie</td>
                <td>marie@tct.com</td>
                <td>Girls College Inter</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Luc</td>
                <td>luc@tct.com</td>
                <td>Cambridge School</td>
            </tr>
            </tbody>
        </table>
        <!-- End List all members -->
    </div>
</div>

</body>
</html>
