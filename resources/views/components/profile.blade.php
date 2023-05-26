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
        @isset($patient->last_sensor)
            @php
                $lastSensorTimestamp = strtotime($patient->last_sensor);
                $currentTimestamp = time();
                $oneMonthAgoTimestamp = strtotime('-1 month', $currentTimestamp);
            @endphp
            @if ($lastSensorTimestamp >= $oneMonthAgoTimestamp)
                <p class="error">@include('partials/icons/warning') last flipped upside down at
                    {{ date('l jS  H:i', $lastSensorTimestamp) }}</p>
            @endif
        @endisset
    </x-card>

    <section class="profileButtons">

        @if ($route !== 'device')
            <a class="button" data-variant="secondary" href="{{ route('patient.show', $patient) }}">Device</a>
        @else
            <p class="button" data-variant="primary">Device</p>
        @endif

        @if ($route !== 'medication')
            <a class="button" data-variant="secondary"
                href="{{ route('patient.medication.index', $patient) }}">Medication</a>
        @else
            <p class="button" data-variant="primary">Medication</p>
        @endif

        @if ($route !== 'timeslot')
            <a class="button" data-variant="secondary"
                href="{{ route('patient.timeslot.index', $patient) }}">Timeslots</a>
        @else
            <p class="button" data-variant="primary">Timeslots</p>
        @endif

    </section>
</section>
