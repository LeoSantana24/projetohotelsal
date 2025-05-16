<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Perfil do Usuário') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-12">

        {{-- Informações do Perfil --}}
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <div class="bg-white p-6 rounded-lg shadow border">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações Pessoais</h3>
                @livewire('profile.update-profile-information-form')
            </div>
        @endif

        {{-- Atualização de Senha --}}
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="bg-white p-6 rounded-lg shadow border">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Atualizar Senha</h3>
                @livewire('profile.update-password-form')
            </div>
        @endif

        {{-- Acesso às Reservas --}}
        <div class="bg-white p-6 rounded-lg shadow border">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Minhas Reservas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('reservas.quarto') }}" class="block bg-blue-100 hover:bg-blue-200 p-5 rounded-lg shadow transition text-center">
                    <h4 class="text-xl font-bold text-blue-800">Reservas de Quarto</h4>
                    <p class="text-sm text-blue-700 mt-2">Gerencie suas reservas de hospedagem.</p>
                </a>

                <a href="{{ route('reservas.massagem') }}" class="block bg-green-100 hover:bg-green-200 p-5 rounded-lg shadow transition text-center">
                    <h4 class="text-xl font-bold text-green-800">Reservas de Massagem</h4>
                    <p class="text-sm text-green-700 mt-2">Gerencie suas sessões de massagem.</p>
                </a>
            </div>
        </div>

        {{-- Exclusão de Conta --}}
        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <div class="bg-white p-6 rounded-lg shadow border">
                <h3 class="text-lg font-semibold text-red-700 mb-4">Excluir Conta</h3>
                @livewire('profile.delete-user-form')
            </div>
        @endif
    </div>
</x-app-layout>
