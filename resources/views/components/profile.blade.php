<section class="profileMain">
    <x-card title="{{ $patient->first_name . ' ' . $patient->last_name }}" big={{ true }}
        editRoute="{{ route('patient.edit', $patient) }}" deleteRoute="{{ route('patient.destroy', $patient) }}">

        <p>@include('partials/icons/location') {{ $patient->address }}</p>
        <p>@include('partials/icons/cake') {{ date('d-m-Y', strtotime($patient->birthday)) }}</p>
        <p>@include('partials/icons/date')
            @if ($patient->last_fill)
                {{ date('d-m-Y', strtotime($patient->last_fill)) }}
            @else
                Device has not been filled yet.
            @endif
        </p>
        <p>@include('partials/icons/device') {{ $patient->device_id }}</p>
    </x-card>

    <section class="profileButtons">

        @if ($route !== 'device')
            <a class="button" data-variant="secondary" href="{{ route('patient.show', $patient) }}">device</a>
        @else
            <p class="button" data-variant="primary">device</p>
        @endif

        @if ($route !== 'medication')
            <a class="button" data-variant="secondary"
                href="{{ route('patient.medication.index', $patient) }}">medication</a>
        @else
            <p class="button" data-variant="primary">medication</p>
        @endif

        @if ($route !== 'timeslot')
            <a class="button" data-variant="secondary"
                href="{{ route('patient.timeslot.index', $patient) }}">timeslots</a>
        @else
            <p class="button" data-variant="primary">timeslots</p>
        @endif

    </section>
</section>
