
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear proyecto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700">
                            Título
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                        >

                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm text-gray-700">
                            Descripción
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            required
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="due_date" class="block font-medium text-sm text-gray-700">
                            Fecha límite
                        </label>

                        <input
                            id="due_date"
                            type="date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                            required
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                        >

                        @error('due_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block font-medium text-sm text-gray-700">
                            Estado
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                        >
                            <option value="pendiente">Pendiente</option>
                            <option value="en progreso">En progreso</option>
                            <option value="completado">Completado</option>
                        </select>

                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
                    >
                        Guardar proyecto
                    </button>

                    <a href="{{ route('projects.index') }}"
                       class="ml-3 text-gray-600 hover:underline">
                        Cancelar
                    </a>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
