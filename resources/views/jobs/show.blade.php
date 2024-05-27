<x-layout>
<x-slot:heading>
        Job
</x-slot:heading>

<h2>{{$job->title}}</h2>
<p>
    This job pays {{ $job->salary}}
</p>

@can('edit',$job) 
<p  class="mt-2">
    <x-button  href="/jobs/{{$job->id}}/edit">
        Edit Jobs
    </x-button>
</p >
@endcan

</x-layout>