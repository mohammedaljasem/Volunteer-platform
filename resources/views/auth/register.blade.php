<x-guest-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col justify-center py-12 sm:px-6 lg:px-8 rtl">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <img class="mx-auto h-30 w-auto mb-3 rounded-lg shadow" rounded-md shadow-md" src="{{ asset('storage/auth/@logo-login.jpeg') }}" alt="منصة التطوع">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">إنشاء حساب جديد</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">انضم إلينا وابدأ رحلة التطوع 💚</p>
        </div>
        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-800 py-10 px-8 shadow-xl rounded-2xl sm:px-10 space-y-6">

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('الاسم الكامل')" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-300">👤</span>
                            <x-text-input id="name" class="pl-10 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                          type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-300">✉️</span>
                            <x-text-input id="email" class="pl-10 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                          type="email" name="email" :value="old('email')" required />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('كلمة المرور')" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-300">🔒</span>
                            <x-text-input id="password" class="pl-10 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                          type="password" name="password" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-300">✅</span>
                            <x-text-input id="password_confirmation" class="pl-10 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                          type="password" name="password_confirmation" required />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                                class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 ease-in-out">
                            إنشاء حساب
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
                        تسجيل عبر Google
                    </a>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-4 text-sm text-gray-600 dark:text-gray-300">
                    لديك حساب مسبقاً؟
                    <a href="{{ route('login') }}" class="text-green-600 hover:underline dark:text-green-400">
                        تسجيل الدخول
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
