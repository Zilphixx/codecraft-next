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
                        Verify Email
                    </h1>
                    <p class="mb-4 text-md">
                        Thanks for signing up! Before getting started, 
                        could you verify your email address by clicking on the 
                        link we just emailed to you? If you didn't receive the email, 
                        we will gladly send you another.
                    </p>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-success" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                            A new verification link has been sent to the email address you provided during registration.
                        </div>
                    @endif
                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                
                            <button class="btn btn-primary w-full">
                                Resend Verification
                            </button>
                        </form>
                
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <button class="btn btn-primary w-full">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
