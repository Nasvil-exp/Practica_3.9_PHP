<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del proyecto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-4">
                    {{ $project->title }}
                </h3>

                <p class="text-gray-600 mb-4">
                    {{ $project->description }}
                </p>

                <div class="space-y-2">
                    <p>
                        <strong>Propietario:</strong>
                        {{ $project->user->name }}
                    </p>

                    <p>
                        <strong>Fecha límite:</strong>
                        {{ $project->due_date }}
                    </p>

                    <p>
                        <strong>Estado:</strong>
                        {{ $project->status }}
                    </p>
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold mb-3">
                        Participantes
                    </h4>

                    @forelse ($project->participants as $participant)
                        <div class="border rounded-lg p-3 mb-2">
                            <p>
                                <strong>Nombre:</strong>
                                {{ $participant->name }}
                            </p>

                            <p>
                                <strong>Rol:</strong>
                                {{ $participant->pivot->role }}
                            </p>

                            <p>
                                <strong>Horas de contribución:</strong>
                                {{ $participant->pivot->contribution_hours }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-600">
                            Este proyecto todavía no tiene participantes.
                        </p>
                    @endforelse
                </div>

                @if ($project->user_id === auth()->id())

                    <div class="mt-8 border-t pt-6">

                        <h4 class="text-lg font-semibold mb-4">
                            Añadir participante
                        </h4>

                        @if ($users->isEmpty())
                            <p class="text-gray-600">
                                No hay usuarios disponibles para añadir.
                            </p>
                        @else

                            <form method="POST"
                                  action="{{ route('projects.participants.store', $project) }}">

                                @csrf

                                <div class="mb-4">
                                    <label for="user_id" class="block font-medium text-sm text-gray-700">
                                        Usuario
                                    </label>

                                    <select id="user_id" name="user_id" required
                                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">

                                        <option value="">Selecciona un usuario</option>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="role" class="block font-medium text-sm text-gray-700">
                                        Rol
                                    </label>

                                    <input type="text" id="role" name="role"
                                           value="{{ old('role') }}"
                                           required
                                           class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                                           placeholder="Ejemplo: Desarrollador">

                                    @error('role')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="contribution_hours" class="block font-medium text-sm text-gray-700">
                                        Horas de contribución
                                    </label>

                                    <input type="number" id="contribution_hours"
                                           name="contribution_hours"
                                           min="0" step="1"
                                           value="{{ old('contribution_hours', 0) }}"
                                           required
                                           class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">

                                    @error('contribution_hours')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                        style="padding: 10px 18px; background-color: #16a34a; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                                    Añadir participante
                                </button>

                            </form>

                        @endif
                    </div>

                    <a href="{{ route('projects.edit', $project) }}"
                       style="display: inline-block; margin-top: 24px; margin-right: 10px; padding: 10px 18px; background-color: #334155; color: white; border-radius: 6px; text-decoration: none;">
                        Editar proyecto
                    </a>

                @endif

                <div class="mt-6">
                    <a href="{{ route('projects.index') }}"
                       style="display: inline-block; padding: 10px 18px; background-color: #64748b; color: white; border-radius: 6px; text-decoration: none;">
                        Volver a proyectos
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
