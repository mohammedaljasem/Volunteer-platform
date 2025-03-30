<x-guest-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col justify-center py-12 sm:px-6 lg:px-8 rtl">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <img class="mx-auto h-34 w-auto mb-6 rounded-lg shadow"  rounded-md shadow-md" src="{{ asset('storage/auth/@logo-login.jpeg') }}" alt="منصة التطوع">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">منصة التطوع السورية</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">مرحباً بك من جديد 👋</p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-800 py-10 px-8 shadow-xl rounded-2xl sm:px-10 space-y-6">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-300">
                                ✉️
                            </span>
                            <x-text-input id="email" class="pl-10 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                          type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('كلمة المرور')" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-300">
                                🔒
                            </span>
                            <x-text-input id="password" class="pl-10 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                          type="password" name="password" required autocomplete="current-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                   class="h-4 w-4 text-green-600 border-gray-300 rounded dark:border-gray-600 dark:bg-gray-700">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">تذكرني</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-green-600 hover:underline dark:text-green-400"
                               href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                                class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 ease-in-out">
                            تسجيل الدخول
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="bg-white dark:bg-gray-800 px-2 text-gray-500 dark:text-gray-400">
                            أو سجل باستخدام
                        </span>
                    </div>
                </div>

                <!-- Social Login -->
                <div>
                    <a href="{{ url('auth/google') }}"
                       class="w-full flex items-center justify-center py-2 px-4 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-all duration-200 ease-in-out">
                        تسجيل الدخول عبر Google
                    </a>
                </div>

                <!-- Register -->
                <div class="text-center mt-4 text-sm text-gray-600 dark:text-gray-300">
                    ليس لديك حساب؟
                    <a href="{{ route('register') }}" class="text-green-600 hover:underline dark:text-green-400">
                        سجل الآن
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
