<x-app-layout>
        <x-slot name="header">
        <h1 class="display-1">Logga in
        <img src="/Images/Logo.jpg" width="500" height="200" alt="Logotyp: Sveriges flagga (gult kors på blå botten) med texten Parasport/Västergötland i stora gula bokstäver.">
       </h1>
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="alert alert-success mb-3 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <x-jet-label value="E-post:" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 autocomplete="off" name="email" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="Lösenord:" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 autocomplete="off" name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <x-jet-checkbox id="remember_me" name="remember" />

                        <label class="form-check-label" for="remember">
                            Kom ihåg mig
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">

                        <x-jet-button>
                            Logga in
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>