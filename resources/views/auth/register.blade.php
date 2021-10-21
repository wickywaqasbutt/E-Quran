<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <center><h2 style="background: lightblue;">STUDENT REGISTRATION FORM</h2></center><br>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <center>
                    <label for="course">Select Course:</label>

                    <select name="course" id="course">
                      <option value="Hifz">Hifz</option>
                      <option value="Qirat">Qirat</option>
                      <option value="Tajweed">Tajweed</option>
                      <option value="Arabic">Arabic</option>
                    </select>

                </center>
            </div>

            <input type="hidden" name="role" value="0">
            <input type="hidden" name="audio" value="">

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                
            </div>
<div class="mt-4">
                <x-jet-label for="skype" value="{{ __('Skype Username') }}" />
                <x-jet-input id="skype" class="block mt-1 w-full" type="text" name="skype" required autocomplete="skype" />
            </div>
            <div class="mt-4">
                <x-jet-label for="skype_pass" value="{{ __('Skype Password') }}" />
                <x-jet-input id="skype_pass" class="block mt-1 w-full" type="password" name="skype_pass" required autocomplete="skype_pass" />
            </div>

            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Purpose of this account (Description)') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" required autocomplete="description" />
            </div>

            

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
