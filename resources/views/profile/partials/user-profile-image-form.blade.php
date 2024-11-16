<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profile Image
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your profile image
        </p>
    </header>

    <form method="post" action="{{ route('profile.profile_image') }}">

        @method('patch')
        @csrf

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div>
            <x-input-label for="profile_image" :value="__('Profile Image')" enctype="multipart/form-data"/>
            <x-text-input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full" :value="old('name', $user->profile_image)" required autofocus autocomplete="profile_image" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>