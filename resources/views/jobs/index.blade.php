<x-layout>
<x-slot:heading>
        Jobs listing
    </x-slot>

    <div>
        @foreach ($jobs as $job)
        <a href="jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-700 text-sm">       </div> 
            <div><strong>{{$job['title']}}</strong> get {{$job['salary']}} per year.</div>
        </a>
        @endforeach
        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>