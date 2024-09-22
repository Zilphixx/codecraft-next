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
                        Login with your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                            <x-input type="text" id="email" name="email" :invalid="$errors->has('email') ? 'input-error' : ''"
                                placeholder="your@email.com" required autofocus />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                            <x-input type="password" id="password" name="password" :invalid="''" 
                                placeholder="••••••••" required/>
                        </div>
                        <div class="flex items-start form-control">
                            <label class="label cursor-pointer">
                                <x-checkbox name="remember" class="checkbox-sm" :invalid="''" />
                                <span class="ms-3 label-text">Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="w-full btn btn-neutral">Login</button>
                        <p class="text-sm">
                            Don't have an account? <br>
                            <a href="{{ route('register') }}" class="me-2 font-medium text-primary-600 hover:underline dark:text-blue-300">
                                Register as Student
                            </a>
                            Or
                            <a href="{{ route('be.a.teacher') }}" class="ms-2 font-medium text-primary-600 hover:underline dark:text-blue-300">
                                Register as Teacher
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>