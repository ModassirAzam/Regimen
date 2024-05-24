<x-layout>
<x-slot:heading>
        Job
</x-slot:heading>

<h2>{{$job['type']}}</h2>
<p>
    This job pays {{ $job['salary']}}
</p>

</x-layout>