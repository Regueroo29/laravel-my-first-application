<x-layout>
    <x-slot:heading>{{ $job->title }}</x-slot:heading>

    <!-- Navigation Buttons -->
    <div class="mb-6 flex space-x-4">
        <a href="/jobs" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Jobs</a>
        <a href="/jobs/{{ $job->id }}/edit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Edit Job</a>
    </div>

    <!-- Job Details -->
    <div class="space-y-4">
        <!-- Employer -->
        <div class="flex items-center space-x-3">
            <p class="text-sm text-gray-500">Posted by:</p>
            <p class="text-sm font-medium text-gray-900">{{ $job->employer->name }}</p>
        </div>

        <!-- Title (already in heading, but can add description if needed) -->
        <h2 class="font-bold text-xl text-gray-900">{{ $job->title }}</h2>

        <!-- Salary -->
        <p class="text-lg text-gray-700">
            This job pays <span class="font-semibold">{{ $job->salary }}</span> per year.
        </p>

        <!-- Tags (if any) -->
        @if($job->tags->count() > 0)
            <div class="flex flex-wrap gap-2">
                <p class="text-sm text-gray-500">Tags:</p>
                @foreach($job->tags as $tag)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        @else
            <p class="text-sm text-gray-500 italic">No tags assigned.</p>
        @endif
    </div>
</x-layout>