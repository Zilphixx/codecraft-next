<x-guest-layout>
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-4xl font-semibold">
                <x-application-logo class="w-14 h-14" />
                <div class="leading-tight tracking-tight font-bold">
                    <span class="text-gray-800 dark:text-gray-300">CODE</span>
                    <span class="text-pink-300">CRAFT</span>
                </div>
            </a>
            <div class="w-full rounded-lg dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl">
                        Wait for Admin Approval
                    </h1>
                    <p class="mb-4 text-md">
                        Thanks for signing up! Before you get started, please wait for your account approval. An admin needs to verify your registration details first. We will notify you of your status once it's done.
                    </p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
            
                        <button class="btn btn-primary w-full">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
