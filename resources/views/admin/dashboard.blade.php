<x-app-layout>

    <x-slot name="header">
        <header class="breadcrumbs text-sm w-full sm:w-3/4 sm:mx-auto py-6">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-300">
                        Dashboard
                    </a>
                </li>
            </ul>
        </header>
    </x-slot>

    <main class="container w-3/4 mx-auto my-6">
        <div class="stats stats-vertical lg:stats-horizontal shadow-lg border border-gray-700 w-full">
            <div class="stat space-y-3">
                <div class="stat-figure">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-10 w-10 stroke-current text-success">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <div class="stat-title text-success">
                    Verified Teachers
                </div>
                <div class="stat-value">
                    {{ $data['verifiedTeacherCount']}}
                </div>
                <div class="stat-desc">
                    Total Numbers of Verified Teachers
                    <a href="{{ route('verified.teachers') }}" class="w-fit block mt-2 hover:underline hover:text-blue-500 hover:font-medium">
                        <svg class="inline-block h-4 w-4 stroke-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>                          
                        View
                    </a>
                </div>
            </div>

            <div class="stat space-y-3">
                <div class="stat-figure">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-10 w-10 stroke-current text-error">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <div class="stat-title text-error">
                    Unverified Teachers
                </div>
                <div class="stat-value">
                    {{ $data['unverifiedTeacherCount'] }}
                </div>
                <div class="stat-desc">
                    Total Numbers of Unverified Teachers
                    <a href="{{ route('unverified.teachers') }}" class="w-fit block mt-2 hover:underline hover:text-blue-500 hover:font-medium">
                        <svg class="inline-block h-4 w-4 stroke-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>                          
                        View
                    </a>
                </div>
            </div>

            <div class="stat space-y-3">
                <div class="stat-figure">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-10 w-10 stroke-current text-primary">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <div class="stat-title text-primary">
                    Registered Teachers
                    <span class="float-end">View</span>
                </div>
                <div class="stat-value">
                    {{ $data['totalTeacherCount'] }}
                </div>
                <div class="stat-desc">
                    Total Numbers of Registered Teachers
                    <a href="#" class="w-fit block mt-2 hover:underline hover:text-blue-500 hover:font-medium">
                        <svg class="inline-block h-4 w-4 stroke-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>                          
                        View
                    </a>
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
