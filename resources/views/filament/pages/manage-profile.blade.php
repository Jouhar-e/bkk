<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}
        
        <div class="fi-form-actions">
            <div class="flex flex-row-reverse items-center gap-3">
                <x-filament::button type="submit">
                    Simpan Profil
                </x-filament::button>
            </div>
        </div>
    </form>
</x-filament-panels::page>