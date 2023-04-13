<nav>
    <ul>
        <li><a href="{{ url()->previous() }}">Back</a></li>
        <li><a href="{{ route('patient.index') }}">Patients</a></li>
        <li><a href="{{ route('user.show', auth()->user()) }}">Profile</a></li>
    </ul>
</nav>
