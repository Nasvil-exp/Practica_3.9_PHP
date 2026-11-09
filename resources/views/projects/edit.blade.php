<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar proyecto
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6"
                 style="border: 1px solid #e5e7eb;">

                <div class="mb-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        Modificar proyecto
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Actualiza la información del proyecto y guarda los cambios.
                    </p>
                </div>

                <form method="POST" action="{{ route('projects.update', $project) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="title"
                               class="block font-medium text-sm text-gray-700 mb-2">
                            Título del proyecto
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $project->title) }}"
                            required
                            placeholder="Introduce el título del proyecto"
                            class="block w-full border-gray-300 rounded-md shadow-sm"
                        >

                        @error('title')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="description"
                               class="block font-medium text-sm text-gray-700 mb-2">
                            Descripción
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            required
                            placeholder="Describe brevemente el proyecto"
                            class="block w-full border-gray-300 rounded-md shadow-sm"
                        >{{ old('description', $project->description) }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="due_date"
                               class="block font-medium text-sm text-gray-700 mb-2">
                            Fecha límite
                        </label>

                        <input
                            id="due_date"
                            type="date"
                            name="due_date"
                            value="{{ old('due_date', $project->due_date) }}"
                            required
                            class="block w-full border-gray-300 rounded-md shadow-sm"
                        >

                        @error('due_date')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="status"
                               class="block font-medium text-sm text-gray-700 mb-2">
                            Estado del proyecto
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="block w-full border-gray-300 rounded-md shadow-sm"
                        >
                            <option value="pendiente"
                                {{ old('status', $project->status) == 'pendiente' ? 'selected' : '' }}>
                                Pendiente
                            </option>

                            <option value="en progreso"
                                {{ old('status', $project->status) == 'en progreso' ? 'selected' : '' }}>
                                En progreso
                            </option>

                            <option value="completado"
                                {{ old('status', $project->status) == 'completado' ? 'selected' : '' }}>
                                Completado
                            </option>
                        </select>

                        @error('status')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap items-center gap-3"
                         style="border-top: 1px solid #e5e7eb; padding-top: 20px;">

                        <button
                            type="submit"
                            style="padding: 10px 20px; background-color: #2563eb; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; font-weight: 600;">
                            Actualizar proyecto
                        </button>

                        <a href="{{ route('projects.show', $project) }}"
                           style="display: inline-block; padding: 10px 20px; background-color: #64748b; color: white; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600;">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
