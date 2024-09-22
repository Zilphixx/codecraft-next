<x-guest-layout>
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <a href="/" class="flex items-center mb-6 text-4xl font-semibold">
                <x-application-logo class="w-14 h-14" />
                <div class="leading-tight tracking-tight font-bold">
                    <span class="text-gray-800 dark:text-gray-300">CODE</span>
                    <span class="text-pink-300">CRAFT</span>
                </div>
            </a>
            <div class="w-full rounded-lg dark:border md:mt-0 sm:max-w-3xl xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl">
                        Register as a Teacher
                    </h1>
                    <form class="space-y-4" action="{{ route('be.a.teacher') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_type" value="Teacher">
                        <div class="sm:flex sm:space-x-2">
                            <div class="sm:w-1/2">
                                <label for="first_name" class="block mb-2 text-sm font-medium">First Name</label>
                                <x-input type="text" id="first_name" name="first_name" :invalid="$errors->has('first_name') ? 'input-error' : ''"
                                    placeholder="First Name" :value="old('first_name')" required />
                                <x-input-error :messages="$errors->get('first_name')" />
                            </div>
                            <div class="sm:w-1/2">
                                <label for="last_name" class="block mb-2 text-sm font-medium">Last Name</label>
                                <x-input type="text" id="last_name" name="last_name" :invalid="$errors->has('last_name') ? 'input-error' : ''"
                                    placeholder="Last Name" :value="old('last_name')" required />
                                <x-input-error :messages="$errors->get('last_name')" />
                            </div>
                        </div>
                        <div class="sm:flex sm:space-x-2">
                            <div class="sm:w-3/4">
                                <label for="address" class="block mb-2 text-sm font-medium">Address</label>
                                <x-input type="text" id="address" name="address" :invalid="$errors->has('address') ? 'input-error' : ''"
                                    placeholder="Address" :value="old('address')" />
                                <x-input-error :messages="$errors->get('address')" />
                            </div>
                            <div class="sm:w-5/12">
                                <label for="contact_number" class="block mb-2 text-sm font-medium">Contact Number</label>
                                <x-input type="text" id="contact_number" name="contact_number" 
                                    :invalid="$errors->has('contact_number') ? 'input-error' : ''"
                                    placeholder="Contact Number" :value="old('contact_number')" 
                                    maxlength="11" oninput="numericOnly(this)" />
                                <x-input-error :messages="$errors->get('contact_number')" />
                            </div>
                        </div>
                        <div class="sm:flex sm:space-x-2">
                            <div class="sm:w-1/2">
                                <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                                <x-input type="email" id="email" name="email" :invalid="$errors->has('email') ? 'input-error' : ''"
                                    placeholder="Email" :value="old('email')" />
                                <x-input-error :messages="$errors->get('email')" />
                            </div>
                            <div class="sm:w-1/2">
                                <label for="file" class="block mb-2 text-sm font-medium">ID/License</label>
                                <x-file-input id="file" name="file" :invalid="$errors->has('file') ? 'input-error' : ''"
                                    placeholder="Email" :value="old('file')" />
                                <x-input-error :messages="$errors->get('file')" />
                            </div>
                        </div>
                        <div class="sm:flex sm:space-x-2">
                            <div class="sm:w-1/2">
                                <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                                <x-input type="password" id="password" name="password" :invalid="$errors->has('password') ? 'input-error' : ''" 
                                    placeholder="Password" required/>
                                <x-input-error :messages="$errors->get('password')" />
                            </div>
                            <div class="sm:w-1/2">
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium">Confirm Password</label>
                                <x-input type="password" id="password_confirmation" name="password_confirmation" :invalid="$errors->has('password') ? 'input-error' : ''" 
                                    placeholder="Confirm Password" required/>
                                <x-input-error :messages="$errors->get('password')" />
                            </div>
                        </div>
                        <div class="sm:flex sm:items-center">
                            <div class="flex items-start form-control">
                                <label class="label cursor-pointer">
                                    <x-checkbox class="checkbox-sm" :invalid="''" required />
                                    <span class="ms-3 label-text">I agree to the <a href="#">Terms</a></span>
                                </label>
                            </div>
                            <div class="sm:w-1/4 ms-auto">
                                <button type="submit" class="w-full btn btn-neutral">Register</button>
                            </div>
                        </div>
                        <p class="text-sm">
                            Already have an account?
                            <a href="{{ route('login') }}" class="me-2 font-medium text-primary-600 hover:underline dark:text-blue-300">
                                Login now
                            </a>
                            Or
                            <a href="{{ route('register') }}" class="ms-2 font-medium text-primary-600 hover:underline dark:text-blue-300">
                                Register as Student
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
