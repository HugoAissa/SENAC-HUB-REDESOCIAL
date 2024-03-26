<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.editImagemUser') }}" enctype="multipart/form-data">
        @csrf
        FOTO DE PERFIL
        <label for="upload-photo" class="upload-photo-user">
            @if (Auth::user()->image_link_user)
                <img class="perfil_img" src="{{ Auth::user()->image_link_user }}" alt="Imagem de Perfil">
            @else
                <img class="perfil_img" src="/imagens/avatar.svg" alt="Imagem avatar SVG">
            @endif
        </label>
        <input id="image_link_user" type="file" class="form-control-file @error('image_link_user') is-invalid @enderror" name="image_link_user" accept="image/*">

        <button type="submit" class="btn btn-primary">
            {{ __('Salvar') }}
        </button>
    </form>

    <form method="POST" action="{{ route('profile.editImagemUser_banner') }}" enctype="multipart/form-data">
        @csrf
        FOTO DE BANNER
        <label for="upload-photo" class="upload-photo-user">
            @if (Auth::user()->image_link_user_banner)
                <img class="perfil_img" src="{{ Auth::user()->image_link_user_banner }}" alt="Imagem de Perfil">
            @else
                <img class="perfil_img" src="/imagens/bg.svg" alt="Imagem avatar SVG">
            @endif
        </label>
        <input id="image_link_user_banner" type="file" class="form-control-file @error('editImagemUser_banner') is-invalid @enderror" name="image_link_user_banner" accept="image/*">

        <button type="submit" class="btn btn-primary">
            {{ __('Salvar') }}
        </button>
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="usuario" :value="__('Usuario')" />
            <x-text-input id="usuario" name="usuario" type="text" class="mt-1 block w-full" :value="old('usuario', $user->usuario)"
                required autofocus autocomplete="usuario" />
            <x-input-error class="mt-2" :messages="$errors->get('usuario')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>



        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="unidade" :value="__('Unidade')" />
            <select id="unidade" name="unidade" class="mt-1 block w-full" required autofocus autocomplete="unidade">
                <option value="São Bernardo do Campo" {{ old('unidade') == '>São Bernado' ? 'selected' : '' }}>São Bernardo do Campo
                </option>
                <option value="Santo Andre" {{ old('unidade') == 'Santo Andre' ? 'selected' : '' }}>Santo Andre
                </option>
                <!-- Adicione mais opções conforme necessário -->
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('unidade')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" type="text" class="mt-1 block w-full" required autofocus autocomplete="bio">{{$user->bio}}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
