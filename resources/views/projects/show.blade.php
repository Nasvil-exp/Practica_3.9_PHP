<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detalles del proyecto
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                @if (session('success'))
                    <p class="mb-6 p-4 rounded-md"
                       style="background-color: #dcfce7; color: #166534;">
                        {{ session('success') }}
                    </p>
                @endif

                <h3 class="text-2xl font-bold mb-3">
                    {{ $project->title }}
                </h3>

                <p class="text-gray-600 mb-6">
                    {{ $project->description }}
                </p>

                <div class="bg-gray-50 border rounded-lg p-5">
                    <h4 class="text-lg font-semibold mb-3">
                        Información del proyecto
                    </h4>

                    <p class="mb-2">
                        <strong>Propietario:</strong>
                        {{ $project->user->name }}
                    </p>

                    <p class="mb-2">
                        <strong>Fecha límite:</strong>
                        {{ $project->due_date }}
                    </p>

                    <p>
                        <strong>Estado:</strong>
                        {{ ucfirst($project->status) }}
                    </p>
                </div>

                <div class="mt-8">
                    <h4 class="text-lg font-semibold mb-4">
                        Participantes
                    </h4>

                    @forelse ($project->participants as $participant)
                        <div class="border rounded-lg p-4 mb-3">
                            <p><strong>Nombre:</strong> {{ $participant->name }}</p>
                            <p><strong>Rol:</strong> {{ $participant->pivot->role }}</p>
                            <p><strong>Horas:</strong> {{ $participant->pivot->contribution_hours }}</p>
                        </div>
                    @empty
                        <p class="text-gray-600">
                            Este proyecto todavía no tiene participantes.
                        </p>
                    @endforelse
                </div>

                @if ($project->user_id === auth()->id())

                    <div class="mt-8 border-t pt-6">
                        <h4 class="text-lg font-semibold mb-2">
                            Añadir participante
                        </h4>

                        <p class="text-sm text-gray-500 mb-5">
                            Selecciona un usuario, su rol y sus horas de contribución.
                        </p>

                        @if ($users->isEmpty())
                            <p class="text-gray-600">
                                No hay usuarios disponibles para añadir.
                            </p>
                        @else
                            <form method="POST"
                                  action="{{ route('projects.participants.store', $project) }}">
                                @csrf

                                <div class="mb-4">
                                    <label for="user_id" class="block text-sm font-medium mb-2">
                                        Usuario
                                    </label>

                                    <select id="user_id" name="user_id" required
                                            class="block w-full border-gray-300 rounded-md">
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
                                    <label for="role" class="block text-sm font-medium mb-2">
                                        Rol
                                    </label>

                                    <input type="text" id="role" name="role"
                                           value="{{ old('role') }}"
                                           placeholder="Ejemplo: Desarrollador"
                                           required
                                           class="block w-full border-gray-300 rounded-md">

                                    @error('role')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="contribution_hours" class="block text-sm font-medium mb-2">
                                        Horas de contribución
                                    </label>

                                    <input type="number" id="contribution_hours"
                                           name="contribution_hours"
                                           value="{{ old('contribution_hours', 0) }}"
                                           min="0" step="1" required
                                           class="block w-full border-gray-300 rounded-md">

                                    @error('contribution_hours')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                        style="padding: 10px 18px; background-color: #16a34a; color: white; border-radius: 6px; font-weight: 600;">
                                    Añadir participante
                                </button>
                            </form>
                        @endif
                    </div>

                @endif

                <div class="flex flex-wrap gap-3 mt-8 border-t pt-6">
                    @if ($project->user_id === auth()->id())
                        <a href="{{ route('projects.edit', $project) }}"
                           style="padding: 10px 18px; background-color: #2563eb; color: white; border-radius: 6px; text-decoration: none;">
                            Editar proyecto
                        </a>
                    @endif

                    <a href="{{ route('projects.index') }}"
                       style="padding: 10px 18px; background-color: #64748b; color: white; border-radius: 6px; text-decoration: none;">
                        Volver a proyectos
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
