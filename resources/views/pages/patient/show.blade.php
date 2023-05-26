<x-layout>

    <x-profile :patient="$patient" route="device" />

    <x-cardlist title="Device Controls">
        <section class="profileButtons">
            <form method="POST" action="{{ route('device.rotate', [$patient->device_id, -1]) }}">
                @csrf
                <button class="button" data-variant="secondary" type="submit">
                    Back
                </button>
            </form>

            <form method="POST" action="{{ route('device.rotate', [$patient->device_id, 1]) }}">
                @csrf
                <button class="button" data-variant="secondary" type="submit">
                    Next
                </button>
            </form>
        </section>
    </x-cardlist>

</x-layout>
