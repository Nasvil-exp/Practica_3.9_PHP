
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proyectos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold mb-4">
                    Lista de proyectos
                </h3>

                @if ($projects->isEmpty())
                    <p class="text-gray-600">
                        Todavía no hay proyectos creados.
                    </p>
                @else
                    <div class="space-y-4">
                        @foreach ($projects as $project)
                            <div class="border rounded-lg p-4">
                                <h4 class="font-bold text-lg">
                                    {{ $project->title }}
                                </h4>

                                <p class="text-gray-600 mt-2">
                                    {{ $project->description }}
                                </p>

                                <p class="text-sm text-gray-500 mt-2">
                                    Propietario: {{ $project->user->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Fecha límite: {{ $project->due_date }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Estado: {{ $project->status }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
